<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['msg' => 'Invalid Email']);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['msg' => 'Wrong Password']);
        }

        return response()->json(['token' => $user->api_token]);
    }
}
