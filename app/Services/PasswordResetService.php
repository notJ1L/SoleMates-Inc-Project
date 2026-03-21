<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\PasswordReset;
use Illuminate\Support\Facades\Password;

class PasswordResetService
{
    /**
     * Send password reset email with token
     */
    public static function sendPasswordReset($email)
    {
        $user = User::where('email', $email)->first();
        
        if (!$user) {
            return false;
        }

        // Create password reset token using Laravel's password broker
        $token = Password::broker()->createToken($user);

        // Send custom notification
        $user->notify(new PasswordReset($token));
        
        return true;
    }
}
