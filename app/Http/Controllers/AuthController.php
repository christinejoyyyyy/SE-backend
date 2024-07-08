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

        if (!Auth::attempt($credentials)) {
            $request->session()->flush();
            return response([
                'message' => "Invalid Credentials",
            ]);
        }

        $user = User::firstWhere('username', $credentials['username']);
        $request->session()->put('user', $user);
        $token = $request->session()->token();
        return response([
            'message' => 'Successfully Logged in',
            'user' => $user,
            'csrf' => $token
        ]);
    }


}
