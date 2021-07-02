<?php

namespace App\Http\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class UserDTO extends DataTransferObject
{
    public string $name;

    public string $lastName;

    public string $cpf;

    public string $email;

    public string $phone;

    public string $password;

    public static function getInstance(array $parameters = [])
    {
        return new UserDTO($parameters);
    }
}
