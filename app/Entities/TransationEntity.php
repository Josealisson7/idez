<?php

namespace App\Entities;

use App\Models\User;

class TransationEntity
{
    private int $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): TransationEntity
    {
        $this->id = $id;
        return $this;
    }


}