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

    public function availableSpots()
    {
        return $this->max_participants - $this->bookings()->count();
    }

    public function isFull()
    {
        return $this->bookings()->count() >= $this->max_participants;
    }
}
