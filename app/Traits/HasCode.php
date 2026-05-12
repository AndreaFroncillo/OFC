<?php

namespace App\Traits;

trait HasCode
{
    protected static function bootHasCode()
    {
        static::creating(function ($model) {
            if (!$model->code) {
                $model->code = self::generateUniqueCode();
            }
        });
    }

    protected static function generateUniqueCode()
    {
        $last = self::latest('id')->first();
        $number = $last ? $last->id + 1 : 1;

        return 'GYM-' . str_pad($number, 6, '0', STR_PAD_LEFT);
    }

}
