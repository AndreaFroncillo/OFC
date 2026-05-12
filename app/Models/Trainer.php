<?php

namespace App\Models;

use App\Traits\HasCode;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasUuid, HasCode;

    protected $guarder = [
        'id'
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
