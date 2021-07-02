<?php

namespace App\Repositories;

use App\Entities\BusinessAccountEntity;
use App\Models\BusinessAccount;
use Exception;

class BusinessAccountRepository extends AbstractRepository
{
    public function __construct(BusinessAccount $businessAccount)
    {
        parent::__construct($businessAccount);
    }
    public function insertBusinessAccount(BusinessAccountEntity $businessAccountEntity)
    {
        try {
            return $this->create([
                "agencia" => $businessAccountEntity->getAgency(),
                "numero" => $businessAccountEntity->getNumber(),
                "digito" => $businessAccountEntity->getDigit(),
                "cnpj" => $businessAccountEntity->getCnpj(),
                "nome_fantasia" => $businessAccountEntity->getNameFantasy(),
                "razao_social" => $businessAccountEntity->getCorporateName(),
                "valor_depositado" => $businessAccountEntity->getDepositedAmount(),
                "id_usuario" => $businessAccountEntity->getUserId()
            ]);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getTheBusinessAccountByUserId(BusinessAccountEntity $businessAccountEntity)
    {
        try {
            return $this->where("id_usuario", $businessAccountEntity->getUserId());
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getTheBusinessAccountById(BusinessAccountEntity $businessAccountEntity)
    {
        try {
            return $this->where("id", $businessAccountEntity->getId());
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateDepositedMoney(BusinessAccountEntity $businessAccountEntity, float $money)
    {
        try {
            return $this->update($businessAccountEntity->getId(), ['valor_depositado' => $money]);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
