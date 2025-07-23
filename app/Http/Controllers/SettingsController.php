<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SettingsController extends Controller
{
    // Update Username
    public function updateUsername(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->name = $request->username;
        $user->save();

        return back()->with('success', 'Username updated successfully.');
    }

    // Update Password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully.');
    }

    // Send OTP to Gmail
    public function sendOtp(Request $request)
    {
        $user = Auth::user();
        $otp = rand(100000, 999999);

        $user->otp_code = $otp;
        $user->otp_expires_at = Carbon::now()->addMinutes(10);
        $user->save();

        Mail::raw("Your OTP Code is: $otp", function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Your OTP Code');
        });

        return back()->with('success', 'OTP has been sent to your email.');
    }

    // Verify OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $user = Auth::user();

        if (
            $user->otp_code === $request->otp &&
            $user->otp_expires_at &&
            Carbon::now()->lt($user->otp_expires_at)
        ) {
            $user->otp_code = null;
            $user->otp_expires_at = null;
            $user->save();

            return back()->with('success', 'OTP verified successfully.');
        }

        return back()->withErrors(['otp' => 'Invalid or expired OTP code.']);
    }
}
