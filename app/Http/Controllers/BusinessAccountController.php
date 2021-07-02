<?php

namespace App\Http\Controllers;

use App\Http\DataTransferObjects\BusinessAccountDTO;
use App\Models\BusinessAccount;
use App\Models\User;
use App\Services\BusinessAccountService;
use Illuminate\Http\Request;

class BusinessAccountController extends Controller
{
    private BusinessAccountService $businessAccountService;

    public function __construct(BusinessAccountService $businessAccountService)
    {
        $this->businessAccountService = $businessAccountService;
    }

    public function register(Request $request, User $id)
    {
        $user = $id;
        $businessAccountDTO = BusinessAccountDTO::getInstance($request->all());
        $response = $this->businessAccountService->registerBusinessAccount($businessAccountDTO, $user);
        return response()->success('successfully registered Personal Account', $response->toArray(), 202);
    }

    public function find(BusinessAccount $id)
    {
        $businessAccount = $id;
        return response()->success(
            'response Business Account',
            [
                'businessAcount' => $businessAccount->getAttributes(),
                'user' => $businessAccount->user->getAttributes()
            ]
        );
    }
}
