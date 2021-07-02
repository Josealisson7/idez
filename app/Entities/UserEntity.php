<?php

namespace App\Entities;

class UserEntity
{
    private int $id;

    private string $name;

    private string $lastName;

    private string $cpf;

    private string $email;

    private string $phone;

    private string $password;

    public function setName(string $name): UserEntity
    {
        $this->name = $name;
        return $this;
    }

    public function setLastName(string $lastName): UserEntity
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function setCpf(string $cpf): UserEntity
    {
        $this->cpf = $cpf;
        return $this;
    }

    public function setEmail(string $email): UserEntity
    {
        $this->email = $email;
        return $this;
    }

    public function setPhone(string $phone): UserEntity
    {
        $this->phone = $phone;
        return $this;
    }

    public function setPassword(string $password): UserEntity
    {
        $this->password = $password;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): UserEntity
    {
        $this->id = $id;
        return $this;
    }
}
