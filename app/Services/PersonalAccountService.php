<?php

namespace App\Services;

use App\Entities\PersonalAccountEntity;
use App\Http\DataTransferObjects\PersonalAccountDTO;
use App\Models\User;
use App\Repositories\PersonalAccountRepository;
use DomainException;

class PersonalAccountService
{
    private PersonalAccountRepository $personalAccountRepository;

    private PersonalAccountEntity $personalAccountEntity;

    public function __construct(PersonalAccountRepository $personalAccountRepository, PersonalAccountEntity $personalAccountEntity)
    {
        $this->personalAccountRepository = $personalAccountRepository;
        $this->personalAccountEntity = $personalAccountEntity;
    }

    public function registerPersonalAccount(PersonalAccountDTO $personalAccountDTO, User $user)
    {
        $personalAccounEntity = $this->makeUPersonalAccountEntity($personalAccountDTO, $user);
        $personalAccount = $this->personalAccountRepository->getThePersonalAccountByUserId($personalAccounEntity);
        if (isset($personalAccount) && $personalAccount->id) {
            throw new DomainException('This user already has an account with this type.');
        }
        return $this->personalAccountRepository->insertPersonalAccount($personalAccounEntity);
    }

    private function makeUPersonalAccountEntity(PersonalAccountDTO $personalAccountDTO, User $user): PersonalAccountEntity
    {
        return $this->personalAccountEntity
            ->setAgency($personalAccountDTO->agency)
            ->setNumber($personalAccountDTO->number)
            ->setCpf($personalAccountDTO->cpf)
            ->setDigit($personalAccountDTO->digit)
            ->setDepositedAmount($personalAccountDTO->depositedAmount)
            ->setUser($user);
    }
}
