<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(['user' => Auth::user()]);
    }

    public function update(UserUpdateRequest $request)
    {
        $user = User::find(Auth::id());

        $user->name = $request->name;
        $user->user_name = $request->user_name;
        $user->email = $request->email;

        if ($request->hasFile('avatar')) {

            if (Storage::exists("images/$user->avatar")) {
                Storage::delete("images/$user->avatar");
            }

            $avatar = $request->file('avatar');

            $file_name = time() . '.' . $avatar->extension();
            $path = $avatar->storeAs('images', $file_name);

            $user->avatar = $path;
        }

        if ($user->save()) {
            return response()->json(['user' => $user]);
        }
    }
    
}
