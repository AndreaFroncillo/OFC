<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Booking\Booking;
use App\Models\Booking\ServiceBooking;
use App\Models\EntryPackage\EntryPackage;
use App\Models\Insurance\InsurancePolicy;
use App\Models\Subscription\Subscription;
use App\Models\Trainer\Trainer;
use App\Traits\HasCode;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @mixin IdeHelperUser
 */
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasUuid, HasCode;

    public const CODE_PREFIX = 'GYM';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public const STATUS_REGISTERED = 'registered';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_SUSPENDED = 'suspended';
    public const STATUS_EXPIRED = 'expired';
    public const STATUS_BANNED = 'banned';

    /*
    protected static function booted()
    {
        static::creating(function ($user) {
            if (!$user->uuid) {
                $user->uuid = (string) \Illuminate\Support\Str::uuid();
            }

            if (!$user->code) {
                $user->code = self::generateUniqueCode();
            }
        });
    }
    */

    public function registrationPayments()
    {
        return $this->hasMany(RegistrationPayment::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function trainer()
    {
        return $this->hasOne(Trainer::class);
    }

    public function serviceBookings()
    {
        return $this->hasMany(ServiceBooking::class);
    }

    public function insurancePolicies()
    {
        return $this->hasMany(InsurancePolicy::class);
    }

    public function entryPackages()
    {
        return $this->hasMany(EntryPackage::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function activeInsurancePolicy()
    {
        return $this->hasOne(InsurancePolicy::class)
            ->where('status', InsurancePolicy::STATUS_ACTIVE)
            ->where('end_date', '>=', now());
    }

    public function activeSubscription()
    {
        return $this->hasOne(Subscription::class)
            ->where('status', Subscription::STATUS_ACTIVE)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now());
    }

    public function activeEntryPackage()
    {
        return $this->hasOne(EntryPackage::class)
            ->where('is_active', true)
            ->where(function ($query) {
                $query->whereNull('end_date')
                    ->orWhere('end_date', '>=', now());
            });
    }

    public function isTrainer()
    {
        return $this->hasRole('trainer');
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function isCustomer()
    {
        return $this->hasRole('customer');
    }

    public function isActive()
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function activate()
    {
        return $this->update([
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public function hasActiveInsurance()
    {
        return $this->activeInsurancePolicy()->exists();
    }

    public function hasActiveSubscription()
    {
        return $this->activeSubscription()->exists();
    }

    public function hasActiveEntryPackage()
    {
        return $this->activeEntryPackage()->exists();
    }

    public function canBookLesson()
    {
        return $this->hasActiveInsurance()
            && ($this->hasActiveSubscription() || $this->hasActiveEntryPackage());
    }

    public function canBookPaidLesson()
    {
        return $this->hasActiveInsurance();
    }

    public function canAccessGym()
    {
        return $this->hasActiveInsurance()
            && ($this->hasActiveSubscription() || $this->hasActiveEntryPackage());
    }

    public function hasRole(string $slug): bool
    {
        return $this->role?->slug === $slug;
    }
}