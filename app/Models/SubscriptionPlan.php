<?php

namespace App\Models;

use App\Traits\HasCode;
use App\Traits\HasLocalizedDates;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperSubscriptionPlan
 */
class SubscriptionPlan extends Model
{
    use HasUuid, HasCode, HasLocalizedDates;

    public const CODE_PREFIX = 'PLN';
    
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
        'is_visible' => 'boolean',
        'sort_order' => 'integer',
        'weekly_access_limit' => 'integer',
        'duration_in_months' => 'integer',
        'unlimited_access' => 'boolean',
        'requires_insurance' => 'boolean',
        'includes_gym_access' => 'boolean',
        'includes_group_lessons' => 'boolean',
        'includes_personal_training' => 'boolean',
    ];

    // Tipi di piano
    public const CATEGORY_BASIC = 'BASIC';
    public const CATEGORY_OPEN = 'OPEN';
    public const CATEGORY_EXTRA = 'EXTRA';

    // Relazioni
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    // Helpers per stato
    public function isActive(): bool
    {
        return $this->is_active;
    }

    public function isVisible(): bool
    {
        return $this->is_visible;
    }

    // Helpers per categorie
    public function isBasic()
    {
        return $this->category === self::CATEGORY_BASIC;
    }

    public function isOpen()
    {
        return $this->category === self::CATEGORY_OPEN;
    }

    public function isExtra()
    {
        return $this->category === self::CATEGORY_EXTRA;
    }

    // Helpers per accesso e servizi
    public function hasLimitedAccess(): bool
    {
        return !$this->unlimited_access;
    }

    public function hasUnlimitedAccess(): bool
    {
        return $this->unlimited_access;
    }

    public function requiresInsurance(): bool
    {
        return $this->requires_insurance;
    }

    public function allowsGroupLessons(): bool
    {
        return $this->includes_group_lessons;
    }

    // Scope per visibilità
    public function scopeAvailable($query)
    {
        return $query
        ->where('is_visible', true)
        ->where('is_active', true)
        ->orderBy('sort_order');
    }

    public function getLabelAttribute(): string
    {
        return __('subscription-plans.' . $this->slug);
    }
}