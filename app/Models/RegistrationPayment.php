<?php

namespace App\Models;

use App\Traits\HasCode;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class RegistrationPayment extends Model
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
}
