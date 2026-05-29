<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\HasCode;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasUuid, HasCode;

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
            'is_active' => 'boolean',
        ];
    }

    /* protected static function booted()
    {
        static::creating(function ($user) {
            if (!$user->uuid) {
                $user->uuid = (string) \Illuminate\Support\Str::uuid();
            }

            if (!$user->code) {
                $user->code = self::generateUniqueCode();
            }
        });
    } */

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

    public function trainerProfile()
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
            ->where('status', EntryPackage::STATUS_ACTIVE)
            ->where('end_date', '>=', now());
    }

    public function hasActiveInsurance()
    {
        return $this->activeInsurancePolicy()->exists();
    }

    public function hasActiveSubscription()
    {
        return $this->activeSubscription()->exists();
    }

    public function isTrainer()
    {
        return $this->trainerProfile()->exists();
    }

    public function hasActiveEntryPackage()
    {
        return $this->activeEntryPackage()->exists();
    }

    public function canBookLesson()
    {
        return $this->hasActiveInsurance() && ($this->hasActiveSubscription() || $this->hasActiveEntryPackage());
    }

    public function canBookPaidLesson()
    {
        return $this->hasActiveInsurance();
    }

    public function canAccessGym()
    {
        return $this->hasActiveInsurance() && ($this->hasActiveSubscription() || $this->hasActiveEntryPackage());
    }  
}
