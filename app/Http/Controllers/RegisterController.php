<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Mail\SendVerificationCodeMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        $email = $request->get('email');
        $code = $request->get('code');
        return view('register', compact('email', 'code'));
    }

    public function store(RegisterRequest $request)
    {
        
        $code = $request->code;
        $email = $request->email;
        $user = User::create([
            'name' => $request->name,
            'user_name' => $request->user_name,
            'email' => $email,
            'password' => Hash::make($request->password),
            'verification_code' => $code,
            'user_role' => 2,
            'api_token' => Str::random(60)
        ]);

        $url = route('verify.form', [
            'email' => $email
        ]);

        Mail::to('niharranjandasmu@gmail.com')->send(new SendVerificationCodeMail($url, $code));

        return response()->json([
            'user' => $user
        ]);
    }

    public function verifyForm(Request $request)
    {
        $email = $request->get('email');
        return view('verify', compact('email'));
    }

    public function verify(Request $request)
    {
        $email = $request->email;
        $code = $request->code;

        $user = User::where([
            'email' => $email,
            'verification_code' => $code,
        ])->first();
        if (!$user) {
            return response()->json(['msg' => 'User Not found']);
        }

        $user->registered_at = date('Y-m-d H:i:s');
        if ($user->save()) {
            return response()->json(['msg' => 'User registration completed']);
        }
    }
}
