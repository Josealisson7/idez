<?php

namespace App\Http\Controllers;

use App\Http\DataTransferObjects\PersonalAccountDTO;
use App\Models\PersonalAccount;
use App\Models\User;
use App\Services\PersonalAccountService;
use Illuminate\Http\Request;

class PersonalAccountController extends Controller
{
    private PersonalAccountService $personalAccountService;

    public function __construct(PersonalAccountService $personalAccountService)
    {
        $this->personalAccountService = $personalAccountService;
    }

    public function register(Request $request, User $id)
    {
        $user = $id;
        $personalAccountDTO = PersonalAccountDTO::getInstance($request->all());
        $response = $this->personalAccountService->registerPersonalAccount($personalAccountDTO, $user);
        return response()->success('successfully registered Personal Account', $response->toArray(), 202);
    }

    public function find(PersonalAccount $id)
    {
        $personalAccount = $id;
        return response()->success(
            'response Personal Account',
            [
                'personalAccount' => $personalAccount->getAttributes(),
                'user' => $personalAccount->user->getAttributes()
            ]
        );
    }
}
