<?php

namespace App\Repositories;

use App\Entities\PersonalAccountEntity;
use App\Models\PersonalAccount;
use Exception;

class PersonalAccountRepository extends AbstractRepository
{
    public function __construct(PersonalAccount $personalAccount)
    {
        parent::__construct($personalAccount);
    }
    public function insertPersonalAccount(PersonalAccountEntity $personalAccountEntity)
    {
        try {
            return $this->create([
                "agencia" => $personalAccountEntity->getAgency(),
                "numero" => $personalAccountEntity->getNumber(),
                "digito" => $personalAccountEntity->getDigit(),
                "cpf" => $personalAccountEntity->getCpf(),
                "valor_depositado" => $personalAccountEntity->getDepositedAmount(),
                "id_usuario" => $personalAccountEntity->getUserId()
            ]);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getThePersonalAccountByUserId(PersonalAccountEntity $personalAccountEntity)
    {
        try {
            return $this->where("id_usuario", $personalAccountEntity->getUserId());
        } catch (Exception $e) {
            throw $e;
        }
    }
}
