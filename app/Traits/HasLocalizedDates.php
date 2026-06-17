<?php

namespace App\Traits;

use Carbon\Carbon;

trait HasLocalizedDates
{
    public function formatDate(string $field, string $format = 'l d F Y'): string
    {
        return $this->{$field}
            ? Carbon::parse($this->{$field})->translatedFormat($format)
            : '';
    }
}
