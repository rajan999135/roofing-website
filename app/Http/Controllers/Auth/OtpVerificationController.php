<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtpVerificationController extends Controller
{
    public function show()
    {
        // If no pending user, send back to register
        if (! session()->has('otp_user_id')) {
            return redirect()->route('register');
        }

        return view('auth.verify-otp');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'code' => ['required', 'digits:6'],
        ]);

        $userId = session('otp_user_id');

        if (! $userId) {
            return redirect()->route('register')
                ->withErrors(['code' => 'Session expired. Please register again.']);
        }

        $user = User::find($userId);

        if (! $user) {
            return redirect()->route('register')
                ->withErrors(['code' => 'User not found. Please register again.']);
        }

        // Check code + expiry
        if (
            $user->otp_code !== $request->code ||
            ! $user->otp_expires_at ||
            now()->greaterThan($user->otp_expires_at)
        ) {
            return back()->withErrors(['code' => 'Invalid or expired code. Please try again.']);
        }

        // Mark verified & clear OTP
        $user->email_verified_at = now();
        $user->otp_code = null;
        $user->otp_expires_at = null;
        $user->save();

        // Clear session and log in
        session()->forget('otp_user_id');
        Auth::login($user);

        return redirect()->intended('/')
            ->with('status', 'Your email has been verified. Welcome, '.$user->name.'!');
    }
}
