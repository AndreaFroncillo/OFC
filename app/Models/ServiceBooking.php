<?php

namespace App\Models;

use App\Traits\HasCode;
use App\Traits\HasLocalizedDates;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperServiceBooking
 */
class ServiceBooking extends Model
{
    use HasUuid, HasCode, HasLocalizedDates;

    public const CODE_PREFIX = 'SBK';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    /*
    |--------------------------------------------------------------------------
    | Booking Status
    |--------------------------------------------------------------------------
    */

    public const STATUS_PENDING = 'pending';
    public const STATUS_CONFIRMED = 'confirmed';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_CANCELLED = 'cancelled';

    /*
    |--------------------------------------------------------------------------
    | Payment Status
    |--------------------------------------------------------------------------
    */

    public const PAYMENT_UNPAID = 'unpaid';
    public const PAYMENT_PAID = 'paid';
    public const PAYMENT_REFUNDED = 'refunded';

    /*
    |--------------------------------------------------------------------------
    | Casts
    |--------------------------------------------------------------------------
    */

    protected function casts(): array
    {
        return [
            'booking_date' => 'date',
            'price' => 'decimal:2',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function isConfirmed(): bool
    {
        return $this->status === self::STATUS_CONFIRMED;
    }

    public function isCancelled(): bool
    {
        return $this->status === self::STATUS_CANCELLED;
    }

    public function isPending(): bool
    {
        return $this->status === self::STATUS_PENDING;
    }

    public function isCompleted(): bool
    {
        return $this->status === self::STATUS_COMPLETED;
    }

    public function isPaid(): bool
    {
        return $this->payment_status === self::PAYMENT_PAID;
    }

    public function isUnpaid(): bool
    {
        return $this->payment_status === self::PAYMENT_UNPAID;
    }

    public function isRefunded(): bool
    {
        return $this->payment_status === self::PAYMENT_REFUNDED;
    }

    public function hasTrainer(): bool
    {
        return !is_null($this->trainer_id);
    }

    public function requiresInsurance(): bool
    {
        return $this->service?->requires_insurance ?? false;
    }

    public function requiresTrainer(): bool
    {
        return $this->service?->requires_trainer ?? false;
    }

    public function scopeConfirmed(Builder $query)
    {   
        return $query->where('status', self::STATUS_CONFIRMED);
    }

    public function scopePending(Builder $query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    public function scopePaid(Builder $query)
    {
        return $query->where('payment_status', self::PAYMENT_PAID);
    }

    public function scopeCancelled(Builder $query)
    {
        return $query->where('status', self::STATUS_CANCELLED);
    }

    public function scopeCompleted(Builder $query)
    {
        return $query->where(
            'status',
            self::STATUS_COMPLETED
        );
    }
}
