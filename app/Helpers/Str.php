<?php

namespace App\Helpers;

class Str
{
    /**
     * Clean string
     *
     * @param string $str
     * @return string
     */
    public static function cleanString(string $str) : string
    {
        $str = str_replace(' ', '-', $str);
        return preg_replace('/[^A-Za-z0-9\-]/', '', $str);
    }
}
