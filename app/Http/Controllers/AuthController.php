<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(RegisterUserRequest $request)
    {
        $validUser = $request->validated();

        $user = User::create($validUser);

        return $user;

    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        $user = Auth::attempt($credentials);

        if (!$user) {
            return response([
                'message' => "Invalid Credentials",
            ]);
        }
        return response([
            'message' => 'Successfully Logged in'
        ]);
    }


}
