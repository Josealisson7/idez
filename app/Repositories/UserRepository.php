<?php

namespace App\Repositories;

use App\Entities\UserEntity;
use App\Models\User;
use Exception;

class UserRepository extends AbstractRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
    public function insertUser(UserEntity $userEntity)
    {
        try {
            return $this->create([
                "nome" => $userEntity->getName(),
                "sobrenome" => $userEntity->getLastName(),
                "cpf" => $userEntity->getCpf(),
                "email" => $userEntity->getEmail(),
                "telefone" => $userEntity->getPhone(),
                "senha" => $userEntity->getPassword()
            ]);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
