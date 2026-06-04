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
        $prefix = defined('static::CODE_PREFIX')
            ? static::CODE_PREFIX
            : 'GEN';

            $lastId = static::max('id') ?? 0;

            return $prefix . '-' . str_pad($lastId + 1, 6, '0', STR_PAD_LEFT);
    }

}
