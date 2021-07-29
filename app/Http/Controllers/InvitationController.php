<?php

namespace App\Http\Controllers;

use App\Mail\SendInvitationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    public function send(Request $request)
    {
        /**
         * user registation link
         */
        $code = random_int(100000, 999999);
        $_SESSION['code'] = $code;
        $url = route('register.form', [
            'code' => $code,
            'email' => $request->email
        ]);

        /**
         * send gamil to user
         */
        Mail::to($request->email)->send(new SendInvitationMail($url));

        /**
         * Send response to client
         */
        return response()->json([
            'msg' => 'Email send successfully',
        ]);
    }
}
