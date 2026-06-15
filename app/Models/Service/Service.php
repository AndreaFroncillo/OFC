<?php

namespace App\Models\Service;

use App\Models\Booking\ServiceBooking;
use App\Traits\HasCode;
use App\Traits\HasLocalizedDates;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperService
 */
class Service extends Model
{
    use HasUuid, HasCode, HasLocalizedDates;

    public const CODE_PREFIX = 'SRV';

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
    | Constants Categories
    |--------------------------------------------------------------------------
    */

    public const CATEGORY_EXTRA = 'EXTRA';

    public const CATEGORY_PERSONAL_TRAINING = 'personal-training';
    public const CATEGORY_NUTRITION = 'nutrition';
    public const CATEGORY_REHABILITATION = 'instrumental-rehabilitative-therapies';
    public const CATEGORY_MASSAGE = 'massages';
    public const CATEGORY_PREPARATION_COMPETITION = 'physical-preparation-for-competitions';
    public const CATEGORY_BODY_COMPOSITION_ANALYSIS = 'body-composition-analysis';
    public const CATEGORY_POSTURAL = 'postural-and-corrective-gymnastics';
    public const CATEGORY_THERAPY = 'massotherapy';

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

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
    */

    public function getLabelAttribute(): string
    {
        return __('services.' . $this->slug);
    }
}
