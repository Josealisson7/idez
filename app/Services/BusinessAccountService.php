<?php

namespace App\Services;

use App\Entities\BusinessAccountEntity;
use App\Http\DataTransferObjects\BusinessAccountDTO;
use App\Models\User;
use App\Repositories\BusinessAccountRepository;
use DomainException;;

class BusinessAccountService
{
    private BusinessAccountRepository $businessAccountRepository;

    private BusinessAccountEntity $businessAccountEntity;

    public function __construct(BusinessAccountRepository $businessAccountRepository, BusinessAccountEntity $businessAccountEntity)
    {
        $this->businessAccountRepository = $businessAccountRepository;
        $this->businessAccountEntity = $businessAccountEntity;
    }

    public function registerBusinessAccount(BusinessAccountDTO $businessAccountDTO, User $user)
    {
        $businessAccounEntity = $this->makeUBusinessAccountEntity($businessAccountDTO, $user);
        $businessAccount = $this->businessAccountRepository->getTheBusinessAccountByUserId($businessAccounEntity);
        if (isset($busSinessAccount) && $businessAccount->id) {
            throw new DomainException('This user already has an account with this type.');
        }
        return $this->businessAccountRepository->insertBusinessAccount($businessAccounEntity);
    }

    private function makeUBusinessAccountEntity(BusinessAccountDTO $businessAccountDTO, User $user): BusinessAccountEntity
    {
        return $this->businessAccountEntity
            ->setAgency($businessAccountDTO->agency)
            ->setNameFantasy($businessAccountDTO->nameFantasy)
            ->setNumber($businessAccountDTO->number)
            ->setCnpj($businessAccountDTO->cnpj)
            ->setDigit($businessAccountDTO->digit)
            ->setCorporateName($businessAccountDTO->corporateName)
            ->setDepositedAmount($businessAccountDTO->depositedAmount)
            ->setUser($user);
    }
}
