<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\PasswordResetService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    /**
     * Send a password reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Check if user exists and is not admin
        $user = \App\Models\User::where('email', $request->email)->first();
        if ($user && $user->isAdmin()) {
            return back()->withErrors(['email' => 'Password reset is not available for admin accounts.']);
        }

        // Use custom password reset service
        $success = PasswordResetService::sendPasswordReset($request->email);

        return $success
                    ? back()->with('status', 'Password reset instructions have been sent to your email.')
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => 'We cannot find a user with that email address.']);
    }
}
