<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Pcode;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class PcodeController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $otp = rand(100000, 999999);

        Pcode::create([
            'email' => $request->email,
            'otp' => $otp,
            'used' => false,
        ]);

        Mail::raw("Your OTP is: $otp", function($message) use ($request) {
            $message->to($request->email)
                ->subject('Password Reset OTP');
        });

        return response()->json(['message' => 'OTP sent to your email.']);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|numeric|digits:6',
        ]);

        $otpRecord = Pcode::where('email', $request->email)
            ->where('otp', $request->otp)
            ->where('used', false)
            ->where('created_at', '>=', Carbon::now()->subMinutes(10))
            ->first();

        if (!$otpRecord) {
            return response()->json(['error' => 'Invalid or expired OTP'], 400);
        }

        $otpRecord->used = true;
        $otpRecord->save();

        return response()->json(['message' => 'OTP verified.']);
    }
}
