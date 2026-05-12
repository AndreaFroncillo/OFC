<?php

namespace App\Models;

use App\Traits\HasCode;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasUuid, HasCode;
    
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function plan()
    {
        return $this->hasOne(SubscriptionPlan::class);
    }

    public function isActive()
    {
        return $this->start_date <= now() && $this->end_date >= now();
    }

    public function isExpired()
    {
        return $this->end_date < now();
    }
}
