<?php

namespace App\Http\Controllers;

use App\Http\DataTransferObjects\BusinessAccountDTO;
use App\Http\DataTransferObjects\DepositDTO;
use App\Models\BusinessAccount;
use App\Models\Transation;
use App\Models\User;
use App\Services\BusinessAccountService;
use App\Services\DepositService;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    private DepositService $depositService;

    public function __construct(DepositService $depositService)
    {
        $this->depositService = $depositService;
    }

    public function registerForBusinessAccount(Request $request, BusinessAccount $id)
    {
        $businessAccount = $id;
        $depositDTO = DepositDTO::getInstance($request->all());
        $response = $this->depositService->registerDepositBussinessAccount($depositDTO, $businessAccount);
        return response()->success('successfully Deposited in Account', $response->toArray(), 202);
    }
}