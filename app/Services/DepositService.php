<?php

namespace App\Services;

use App\Entities\BusinessAccountEntity;
use App\Entities\TransationEntity;
use App\Helpers\Helper;
use App\Http\DataTransferObjects\BusinessAccountDTO;
use App\Http\DataTransferObjects\DepositDTO;
use App\Models\BusinessAccount;
use App\Models\PersonalAccount;
use App\Models\Transation;
use App\Models\User;
use App\Repositories\BusinessAccountRepository;
use App\Repositories\BusinessTransationHistoryRepository;
use DomainException;;

class DepositService
{
    private BusinessAccountEntity $businessAccountEntity;

    private BusinessAccountRepository $businessAccountRepository;

    private BusinessTransationHistoryRepository $businessTransationHistoryRepository;

    private TransationEntity $transationEntity;

    public function __construct(
        BusinessAccountEntity $businessAccountEntity,
        TransationEntity $transationEntity,
        BusinessAccountRepository $businessAccountRepository,
        BusinessTransationHistoryRepository $businessTransationHistoryRepository
    ) {
        $this->transationEntity = $transationEntity;
        $this->businessAccountEntity = $businessAccountEntity;
        $this->businessAccountRepository = $businessAccountRepository;
        $this->businessTransationHistoryRepository = $businessTransationHistoryRepository;
    }

    public function registerDepositBussinessAccount(DepositDTO $depositDTO, BusinessAccount $businessAccount)
    {
        $businessAccountEntity = $this->businessAccountEntity->setId($businessAccount->id);
        $businessAccount = $this->businessAccountRepository->getTheBusinessAccountById($businessAccountEntity);
        $moneyAccount = Helper::convertStringMoneyToFloat($businessAccount->valor_depositado);
        $depositedAmount = Helper::convertStringMoneyToFloat($depositDTO->depositdAmount);
        $moneyAccount = $moneyAccount + $depositedAmount;
        $transationEntity = $this->transationEntity->setId(Transation::$deposit);
        $this->businessAccountRepository->updateDepositedMoney($businessAccountEntity, $moneyAccount);
        $businessAccount = $this->businessTransationHistoryRepository->insertBusinessTransationHistory($businessAccountEntity, $transationEntity, $depositedAmount);
        return $businessAccount;
    }

    public function registerDepositPersonalAccount(DepositDTO $depositDTO, PersonalAccount $personalAccount)
    {
        // I didn't implement it due to lack of time
    }
}
