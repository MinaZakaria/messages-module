<?php

namespace App\Infrastructure\Utils;

use \Carbon\Carbon;

class DateTimeUtility
{
    public static function format(string $datetime = null, string $format = 'd-m-Y')
    {
        if (!$datetime) {
            return null;
        }

        return Carbon::parse($datetime)->format($format);
    }
}
