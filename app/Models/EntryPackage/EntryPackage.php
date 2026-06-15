<?php

namespace App\Models\EntryPackage;

use App\Models\User;
use App\Traits\HasCode;
use App\Traits\HasLocalizedDates;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperEntryPackage
 */
class EntryPackage extends Model
{
    use HasUuid, HasCode, HasLocalizedDates;

    public const CODE_PREFIX = 'EPK';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

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
            'start_date' => 'date',
            'end_date' => 'date',
            'is_active' => 'boolean',
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

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function hasEntries(): bool
    {
        return $this->remaining_entries > 0;
    }

    public function isExpired(): bool
    {
        if (!$this->end_date) {
            return false;
        }

        return now()->greaterThan($this->end_date);
    }

    public function isUsable(): bool
    {
        return $this->is_active
            && $this->hasEntries()
            && !$this->isExpired();
    }

    public function isActive(): bool
    {
        return $this->is_active
            && !$this->isExpired()
            && !$this->isConsumed();
    }

    public function isConsumed(): bool
    {
        return $this->remaining_entries <= 0;
    }

    public function isCancelled(): bool
    {
        return !$this->is_active;
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

    public function useEntry(): bool
    {
        if (!$this->isUsable()) {
            return false;
        }

        $this->decrement('remaining_entries');

        return true;
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeAvailable($query)
    {
        return $query
            ->where('is_active', true)
            ->where('remaining_entries', '>', 0)
            ->where(function ($q) {
                $q->whereNull('end_date')
                ->orWhere('end_date', '>=', today());
            });
    }
}
