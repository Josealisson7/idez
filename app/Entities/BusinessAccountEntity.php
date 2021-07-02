<?php

namespace App\Entities;

use App\Models\User;

class BusinessAccountEntity
{
    private int $id;

    private int $agency;

    private int $number;

    private int $digit;

    private string $cnpj;

    private string $nameFantasy;

    private string $corporateName;

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

    public function setAgency($agency): BusinessAccountEntity
    {
        $this->agency = $agency;
        return $this;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setNumber($number): BusinessAccountEntity
    {
        $this->number = $number;
        return $this;
    }

    public function getDigit(): int
    {
        return $this->digit;
    }

    public function setDigit($digit): BusinessAccountEntity
    {
        $this->digit = $digit;
        return $this;
    }

    public function getCnpj(): string
    {
        return $this->cnpj;
    }


    public function setCnpj($cnpj): BusinessAccountEntity
    {
        $this->cnpj = $cnpj;
        return $this;
    }

    public function getNameFantasy(): string
    {
        return $this->nameFantasy;
    }

    public function setNameFantasy($nameFantasy): BusinessAccountEntity
    {
        $this->nameFantasy = $nameFantasy;
        return $this;
    }

    public function getCorporateName(): string
    {
        return $this->corporateName;
    }

    public function setCorporateName($corporateName): BusinessAccountEntity
    {
        $this->corporateName = $corporateName;
        return $this;
    }

    public function setId($id): BusinessAccountEntity
    {
        $this->id = $id;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->user->id;
    }

    public function setUser(User $user): BusinessAccountEntity
    {
        $this->user = $user;
        return $this;
    }

    public function getDepositedAmount()
    {
        return $this->depositedAmount;
    }

    public function setDepositedAmount($depositedAmount): BusinessAccountEntity
    {
        $this->depositedAmount = $depositedAmount;
        return $this;
    }
}

