<?php

namespace App\Helpers;

class Helper
{
    public static function convertStringMoneyToFloat(string $money)
    {
        return floatval(strtr($money, ['$' => '']));
    }
}
