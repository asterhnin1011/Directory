<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Routing\Controller;

class VerificationController extends Controller
{
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        // Instead of redirecting to dashboard (which would happen on phone),
        // we redirect to a thank you page, or just a simple "verified" message
        return response()->view('auth.verified-success');
    }
}
