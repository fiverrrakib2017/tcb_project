<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OtpController extends Controller
{
    public function generateOtp($distributionId){
        $otpCode = mt_rand(100000, 999999);
        DB::table('otps')->insert([
            'purpose' => 'distribution', 
            'distribution_id' => $distributionId,
            'code' => $otpCode,
            'sent' => now(), 
            'expiration' => now()->addMinutes(5), 
            'status' => 0, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return response()->json(['success' => true]);
    }
    public function verifyOtp($distributionId, $enteredOtp)
    {
        $otpRecord = DB::table('otps')
            ->where('distribution_id', $distributionId)
            ->where('status', 0) // Check if OTP is not yet verified
            ->orderByDesc('created_at')
            ->first();

        /* Check if an OTP record is found and it's still valid*/
        if ($otpRecord && now()->lt($otpRecord->expiration) && $enteredOtp == $otpRecord->code) {
           /* Update the status to indicate successful verification*/
            DB::table('otps')->where('id', $otpRecord->id)->update(['status' => 1]);

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
