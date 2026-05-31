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
            'is_visible' => 'boolean',
            'requires_insurance' => 'boolean',
            'duration_minutes' => 'integer',
            'sort_order' => 'integer',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Caonsts Categories
    |--------------------------------------------------------------------------
    */

    public const CATEGORY_PERSONAL_TRAINING = 'personal_training';
    public const CATEGORY_NUTRITION = 'nutrition';
    public const CATEGORY_MASSAGE = 'massage';
    public const CATEGORY_POSTURAL = 'postural';
    public const CATEGORY_THERAPY = 'therapy';
    public const CATEGORY_ASSESSMENT = 'assessment';

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function bookings()
    {
        return $this->hasMany(ServiceBooking::class);
    }

    public function isActive()
    {
        return $this->is_active;
    }

    public function isVisible()
    {
        return $this->is_visible;
    }

    public function requiresInsurance()
    {
        return $this->requires_insurance;
    }

    public function requiresTrainer()
    {
        return $this->requires_trainer;
    }

    public function scopeVisible($query)
    {
        return $query
            ->where('is_active', true)
            ->where('is_visible', true)
            ->orderBy('sort_order');
    }
}
