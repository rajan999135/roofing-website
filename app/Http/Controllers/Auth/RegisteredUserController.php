<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // 1) Validate input with strong password rules
        $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:' . User::class,
            ],
            'password' => [
                'required',
                'confirmed',
                'string',
                'min:8',
                'regex:/[A-Z]/',   // at least one uppercase
                'regex:/[a-z]/',   // at least one lowercase
                'regex:/[0-9]/',   // at least one number
            ],
        ], [
            'password.regex' => 'Password must contain upper & lower case letters and at least one number.',
        ]);

        // 2) Create user (not logged in yet)
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 3) Generate 6-digit OTP, valid for 1 minute
        $otp = random_int(100000, 999999);

        $user->otp_code       = $otp;
        $user->otp_expires_at = now()->addMinute();   // 1 minute validity
        $user->save();

        // 4) Email the OTP to the user
        Mail::raw(
            "Your Five Rivers verification code is: {$otp}\n\nThis code is valid for 1 minute.",
            function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Your Five Rivers verification code');
            }
        );

        // 5) Remember which user is verifying
        session(['otp_user_id' => $user->id]);

        // 6) Redirect to OTP page
        return redirect()
            ->route('otp.show')
            ->with('status', 'We sent a 6-digit code to your email. Please enter it below within 1 minute.');
    }
}
