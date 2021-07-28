<?php

namespace App\Http\Controllers;

use App\Mail\SendInvitationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    public function send()
    {
        /**
         * user registation link
         */
        $code = random_int(100000, 999999);
        $_SESSION['code'] = $code;
        $url = route('register.form', [
            'code' => $code,
            'email' => 'akashdasmu@gmail.com'
        ]);

        /**
         * send gamil to user
         */
        Mail::to('niharranjandasmu@gmail.com')->send(new SendInvitationMail($url));

        /**
         * Send response to client
         */
        return response()->json([
            'msg' => 'Email send successfully',
        ]);
    }
}
