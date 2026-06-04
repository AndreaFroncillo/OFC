<?php

namespace App\Traits;

use Carbon\Carbon;

trait HasLocalizedDates
{
    public function formatDate($field, $format = 'l d F Y')
    {
        return Carbon::parse($this->$field)
            ->translatedFormat($format);
    }
}
