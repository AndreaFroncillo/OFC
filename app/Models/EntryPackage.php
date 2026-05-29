<?php

namespace App\Models;

use App\Traits\HasCode;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class EntryPackage extends Model
{
    use HasUuid, HasCode;

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

    public const STATUS_ACTIVE = 'active';

    public const STATUS_EXPIRED = 'expired';

    public const STATUS_CONSUMED = 'consumed';

    public const STATUS_CANCELLED = 'cancelled';

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
        return $this->is_active && !$this->isExpired(); 
    }

    public function isConsumed(): bool
    {
        return $this->remaining_entries <= 0;
    }

    public function isCancelled(): bool
    {
        return !$this->is_active && !$this->isExpired() && !$this->isConsumed();
    }
}
