<?php

namespace App\Models;

use App\Traits\HasCode;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasUuid, HasCode;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    /*
    |--------------------------------------------------------------------------
    | Casts
    |--------------------------------------------------------------------------
    */

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'requires_trainer' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function bookings()
    {
        return $this->hasMany(ServiceBooking::class);
    }
}
