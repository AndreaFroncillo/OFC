<?php

namespace App\Models;

use App\Traits\HasCode;
use App\Traits\HasLocalizedDates;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperSubscription
 */
class Subscription extends Model
{
    use HasUuid, HasCode, HasLocalizedDates;

    public const CODE_PREFIX = 'SUB';
    
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
        'auto_renew' => 'boolean',
    ];

    public const STATUS_PENDING = 'pending';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_CANCELLED = 'cancelled';
    public const STATUS_EXPIRED = 'expired';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function subscriptionPlan()
    {
        return $this->belongsTo(SubscriptionPlan::class);
    }

    public function isActive()
    {
        return $this->status === self::STATUS_ACTIVE
            && $this->start_date <= now()
            && $this->end_date >= now();
    }

    public function isExpired()
    {
        return $this->status === self::STATUS_EXPIRED
            || $this->end_date < now();
    }

    public function isPending()
    {
        return $this->status === self::STATUS_PENDING;
    }

    public function isCancelled()
    {
        return $this->status === self::STATUS_CANCELLED;
    }

    public function daysRemaining()
    {
        if ($this->isExpired()) {
            return 0;
        }

        return now()->diffInDays($this->end_date, false);
    }

    public function scopeActive($query)
    {
        return $query
            ->where('status', self::STATUS_ACTIVE)
            ->whereDate('end_date', '>=', now());
    }

    public function scopeExpired($query)
    {
        return $query
            ->where(function ($query) {
                $query->where('status', self::STATUS_EXPIRED)
                    ->orWhereDate('end_date', '<', now());
            });
    }

    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', self::STATUS_CANCELLED);
    }
}
