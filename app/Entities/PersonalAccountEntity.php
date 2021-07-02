<?php

namespace App\Entities;

use App\Models\User;

class PersonalAccountEntity
{
    private int $id;

    private int $agency;

    private int $number;

    private int $digit;

    private string $cpf;

    private float $depositedAmount;

    private User $user;

    public function getId(): int
    {
        return $this->id;
    }

    public function getAgency(): int
    {
        return $this->agency;
    }

    public function setAgency($agency): PersonalAccountEntity
    {
        $this->agency = $agency;
        return $this;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setNumber($number): PersonalAccountEntity
    {
        $this->number = $number;
        return $this;
    }

    public function getDigit(): int
    {
        return $this->digit;
    }

    public function setDigit($digit): PersonalAccountEntity
    {
        $this->digit = $digit;
        return $this;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }


    public function setCpf($cpf): PersonalAccountEntity
    {
        $this->cpf = $cpf;
        return $this;
    }

    public function setId($id): PersonalAccountEntity
    {
        $this->id = $id;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->user->id;
    }

    public function setUser(User $user): PersonalAccountEntity
    {
        $this->user = $user;
        return $this;
    }

    public function getDepositedAmount()
    {
        return $this->depositedAmount;
    }

    public function setDepositedAmount($depositedAmount): PersonalAccountEntity
    {
        $this->depositedAmount = $depositedAmount;
        return $this;
    }
}