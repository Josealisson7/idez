<?php

namespace App\Services;

use App\Entities\UserEntity;
use App\Http\DataTransferObjects\UserDTO;
use App\Repositories\UserRepository;

class UserService
{
    private UserRepository $userRepository;

    private UserEntity $userEntity;

    public function __construct(UserRepository $userRepository, UserEntity $userEntity)
    {
        $this->userRepository = $userRepository;
        $this->userEntity = $userEntity;
    }

    public function registerUser(UserDTO $userDTO)
    {

        $userEntity = $this->makeUserEntity($userDTO);
        $user = $this->userRepository->insertUser($userEntity);
        return $user;
    }

    private function makeUserEntity(UserDTO $userDTO) : UserEntity
    {
        return $this->userEntity
            ->setName($userDTO->name)
            ->setLastName($userDTO->lastName)
            ->setPhone($userDTO->phone)
            ->setCpf($userDTO->cpf)
            ->setEmail($userDTO->email)
            ->setPassword($userDTO->password);
    }
}
