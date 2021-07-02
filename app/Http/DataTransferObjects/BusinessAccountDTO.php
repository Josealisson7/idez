<?php

namespace App\Http\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class BusinessAccountDTO extends DataTransferObject
{
    public int $agency;

    public int $number;

    public int $digit;

    public string $cnpj;

    public string $nameFantasy;

    public string $corporateName;

    public float $depositedAmount;

    public static function getInstance(array $parameters = [])
    {
        return new BusinessAccountDTO($parameters);
    }
}
