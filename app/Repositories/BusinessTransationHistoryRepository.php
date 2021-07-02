<?php

namespace App\Repositories;

use App\Entities\BusinessAccountEntity;
use App\Entities\TransationEntity;
use App\Models\BusinessAccount;
use App\Models\BusinessTransationHistory as ModelsBusinessTransationHistory;
use Exception;

class BusinessTransationHistoryRepository extends AbstractRepository
{
    public function __construct(ModelsBusinessTransationHistory $businessTransationHistory)
    {
        parent::__construct($businessTransationHistory);
    }
    public function insertBusinessTransationHistory(BusinessAccountEntity $businessAccountEntity, TransationEntity $transationEntity, float $money)
    {
        try {
            return $this->create([
                "id_transacao" => $transationEntity->getId(),
                "valor_transacao" => $money,
                "id_conta_empresarial" => $businessAccountEntity->getId()
            ]);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
