<?php

namespace App\Models\Insurance;

use App\Models\User;
use App\Traits\HasCode;
use App\Traits\HasLocalizedDates;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperInsurancePolicy
 */
class InsurancePolicy extends Model
{
    use HasUuid, HasCode, HasLocalizedDates;

    public const CODE_PREFIX = 'INP';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public const STATUS_PENDING = 'pending';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_EXPIRED = 'expired';
    public const STATUS_CANCELLED = 'cancelled';

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'paid_at' => 'datetime',
        'price' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
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

    public function isCancelled()
    {
        return $this->status === self::STATUS_CANCELLED;
    }

    public function isPending()
    {
        return $this->status === self::STATUS_PENDING;
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

    public function scopePending($query)
    {
        return $query->where(
            'status',
            self::STATUS_PENDING
        );
    }

    public function scopeCancelled($query)
    {
        return $query->where(
            'status',
            self::STATUS_CANCELLED
        );
    }

    public function scopeExpired($query)
    {
        return $query
            ->where(function ($query) {
                $query->where('status', self::STATUS_EXPIRED)
                    ->orWhereDate('end_date', '<', now());
            });
    }

    public function activate()
    {
        $this->update([
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public function expire()
    {
        $this->update([
            'status' => self::STATUS_EXPIRED,
        ]);
    }
}
