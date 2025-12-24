<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialLoginController extends Controller
{
    /**
     * Redirect user to Google login
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google callback
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
        } catch (\Exception $e) {
            return redirect()->route('login')
                ->with('error', 'Google authentication failed.');
        }

        // Find user by email
        $user = User::where('email', $googleUser->email)->first();

        // Create user if not exists
        if (! $user) {
            $user = User::create([
                'name'              => $googleUser->name,
                'email'             => $googleUser->email,
                'password'          => bcrypt(Str::random(24)), // random password
                'email_verified_at' => now(), // ✅ auto-verified
            ]);
        }

        Auth::login($user, true);

        return redirect()->intended('/');
    }
}
