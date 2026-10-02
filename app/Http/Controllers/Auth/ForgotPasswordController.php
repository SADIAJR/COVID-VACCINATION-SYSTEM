<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PinMail;
use App\Models\PasswordResetPin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    // Step 1: Show "enter your email" form
    public function showForgotForm()
    {
        return view('auth.forgot-password');
    }

    // Step 2: Send 5-digit PIN to email
    public function sendPin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.exists' => 'No account found with this email address.',
        ]);

        // Delete old PINs for this email
        PasswordResetPin::where('email', $request->email)->delete();

        // Generate 5-digit PIN
        $pin = str_pad(random_int(10000, 99999), 5, '0', STR_PAD_LEFT);

        // Save PIN (expires in 10 minutes)
        PasswordResetPin::create([
            'email'      => $request->email,
            'pin'        => $pin,
            'expires_at' => now()->addMinutes(10),
        ]);

        // Send PIN via email
        Mail::to($request->email)->send(new PinMail($pin));

        // Store email in session for next steps
        session(['reset_email' => $request->email]);

        return redirect()->route('password.verify-pin.form')
            ->with('success', 'A 5-digit PIN has been sent to your email. Valid for 10 minutes.');
    }

    // Step 3: Show PIN verification form
    public function showVerifyPinForm()
    {
        if (!session('reset_email')) {
            return redirect()->route('password.forgot.form');
        }
        return view('auth.verify-pin');
    }

    // Step 4: Verify PIN
    public function verifyPin(Request $request)
    {
        $request->validate([
            'pin' => 'required|digits:5',
        ]);

        $email = session('reset_email');

        if (!$email) {
            return redirect()->route('password.forgot.form')
                ->withErrors(['pin' => 'Session expired. Please try again.']);
        }

        $record = PasswordResetPin::where('email', $email)
            ->where('pin', $request->pin)
            ->first();

        if (!$record) {
            return back()->withErrors(['pin' => 'Invalid PIN. Please check your email.']);
        }

        if ($record->expires_at->isPast()) {
            $record->delete();
            return back()->withErrors(['pin' => 'PIN has expired. Please request a new one.']);
        }

        // PIN is valid — allow password reset
        session(['reset_verified' => true]);

        return redirect()->route('password.reset.form');
    }

    // Step 5: Show new password form
    public function showResetForm()
    {
        if (!session('reset_email') || !session('reset_verified')) {
            return redirect()->route('password.forgot.form');
        }
        return view('auth.reset-password');
    }

    // Step 6: Save new password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $email = session('reset_email');

        if (!$email || !session('reset_verified')) {
            return redirect()->route('password.forgot.form');
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('password.forgot.form')
                ->withErrors(['email' => 'User not found.']);
        }

        $user->update(['password' => Hash::make($request->password)]);

        // Cleanup
        PasswordResetPin::where('email', $email)->delete();
        session()->forget(['reset_email', 'reset_verified']);

        return redirect()->route('login')
            ->with('success', 'Password reset successfully! Please login with your new password.');
    }
}
