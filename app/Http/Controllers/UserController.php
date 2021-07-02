<?php

namespace App\Http\Controllers;

use App\Http\DataTransferObjects\UserDTO;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(Request $request)
    {
        $userDTO = UserDTO::getInstance($request->all());
        $response = $this->userService->registerUser($userDTO);
        return response()->success('successfully registered User', $response->toArray(), 202);
    }
}
