<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Mail\OtpEmail;
use App\Models\User;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController as FortifyAuthenticatedSessionController;


class LoginControler extends FortifyAuthenticatedSessionController
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (Auth::attempt($validated)) {

            $otp = new Otp;
            $otp_token = $otp->generate($user->email, 6, 15);

            Mail::to($user->email)->send(new OtpEmail($otp_token->token));
            session(['isOTPValidated' => false]);

            return response()->json(['success' => true, 'message' => 'OTP Successfully Send to your email', 'email' => $user->email]);
        }

        return response()->json(['success' => false, 'message' => 'Incorrect Email/Password']);
    }

    public function otpView()
    {
        if (session('isOTPValidated') === true) {
            return back();
        }
        $email = auth()->user()->email;
        return view('auth.otp', compact(['email']));
    }

    public function checkOTP(Request $request)
    {
        $validated = $request->validate([
            'otp' => 'required'
        ]);

        $otp = new Otp;
        $otp_result = $otp->validate($request->email, $request->otp);

        if ($otp_result->status == true) {
            $request->session()->regenerate();
            session(['isOTPValidated' => true]);

            return response()->json(['success' => true, 'message' => $otp_result->message]);
        } else {
            return response()->json(['success' => false, 'message' => $otp_result->message]);
        }
    }
}
