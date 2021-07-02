<?php

namespace App\Http\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class PersonalAccountDTO extends DataTransferObject
{
    public int $agency;

    public int $number;

    public int $digit;

    public string $cpf;

    public float $depositedAmount;

    public static function getInstance(array $parameters = [])
    {
        return new PersonalAccountDTO($parameters);
    }
}