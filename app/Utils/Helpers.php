<?php

namespace App\Utils;

use Illuminate\Support\Str;

class Helpers
{
    public static function generateGuid()
    {
        return Str::uuid()->toString();
    }
}
