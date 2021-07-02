<?php

namespace App\Http\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class DepositDTO extends DataTransferObject
{
    public float $depositdAmount;

    public static function getInstance(array $parameters = [])
    {
        return new DepositDTO($parameters);
    }
}
