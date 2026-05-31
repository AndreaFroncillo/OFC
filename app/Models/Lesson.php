<?php

namespace App\Models;

use App\Traits\HasCode;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasUuid, HasCode;

    protected $guarded = [
        'id'
    ];

    protected $casts = [
        'date' => 'date',
        'requires_insurance' => 'boolean',
        'is_bookable' => 'boolean',
    ];

    public const STATUS_SCHEDULED = 'scheduled';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_CANCELLED = 'cancelled';

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function scopeUpcoming($query)
    {
        return $query->where(function ($query) {
            $query->whereDate('date', '>', today())
                ->orWhere(function ($query) {
                        $query->whereDate('date', today())
                            ->whereTime('start_time', '>', now()->format('H:i:s'));
                });
        });
    }

    public function availableSpots()
    {
        return $this->max_participants - $this->bookings()->count();
    }

    public function isFull()
    {
        return $this->bookings()->count() >= $this->max_participants;
    }

        public function isScheduled()
    {
        return $this->status === self::STATUS_SCHEDULED;
    }

    public function isCancelled()
    {
        return $this->status === self::STATUS_CANCELLED;
    }

    public function isCompleted()
    {
        return $this->status === self::STATUS_COMPLETED;
    }

    public function isBookable(): bool
    {
        return $this->isScheduled()
            && !$this->isFull();
    }
    
    public function hasAvailableSpots()
    {
        return !$this->isFull();
    }
}
