<?php

namespace App\Models\Lesson;

use App\Models\Trainer\Trainer;
use App\Traits\HasCode;
use App\Traits\HasLocalizedDates;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LessonTemplate extends Model
{
    use HasUuid, HasCode, HasLocalizedDates;

    public const CODE_PREFIX = 'LTP';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'weekday' => 'integer',
        'max_participants' => 'integer',
        'requires_insurance' => 'boolean',
        'is_bookable' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'lesson_template_id' => 'integer',
    ];

    /*
    |--------------------------------------------------------------------------
    | Weekdays
    |--------------------------------------------------------------------------
    */

    public const WEEKDAY_MONDAY = 1;
    public const WEEKDAY_TUESDAY = 2;
    public const WEEKDAY_WEDNESDAY = 3;
    public const WEEKDAY_THURSDAY = 4;
    public const WEEKDAY_FRIDAY = 5;
    public const WEEKDAY_SATURDAY = 6;
    public const WEEKDAY_SUNDAY = 7;

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function trainer(): BelongsTo
    {
        return $this->belongsTo(Trainer::class);
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function isActive(): bool
    {
        return $this->is_active;
    }

    public function isBookable(): bool
    {
        return $this->is_bookable;
    }

    public function requiresInsurance(): bool
    {
        return $this->requires_insurance;
    }

    public function weekdayLabel(): string
    {
        return match ($this->weekday) {
            self::WEEKDAY_MONDAY => 'Lunedì',
            self::WEEKDAY_TUESDAY => 'Martedì',
            self::WEEKDAY_WEDNESDAY => 'Mercoledì',
            self::WEEKDAY_THURSDAY => 'Giovedì',
            self::WEEKDAY_FRIDAY => 'Venerdì',
            self::WEEKDAY_SATURDAY => 'Sabato',
            self::WEEKDAY_SUNDAY => 'Domenica',
            default => '-',
        };
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

    public function scopeBookable($query)
    {
        return $query->where('is_bookable', true);
    }

    public function scopeOrdered($query)
    {
        return $query
            ->orderBy('weekday')
            ->orderBy('start_time')
            ->orderBy('sort_order');
    }
}
