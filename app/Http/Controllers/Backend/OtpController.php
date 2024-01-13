<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Distribution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Twilio\Rest\Client;
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
         // Send SMS using Twilio
        $twilioSid = env('TWILIO_SID');
        $twilioAuthToken = env('TWILIO_AUTH_TOKEN');
        $twilioPhoneNumber = env('TWILIO_PHONE_NUMBER');

        // $twilio = new Client($twilioSid, $twilioAuthToken);

        // $message = $twilio->messages
        //     ->create(
        //         '+1234567890', // Replace with the beneficiary's phone number
        //         [
        //             'from' => $twilioPhoneNumber,
        //             'body' => "Your OTP is: $otpCode",
        //         ]
        //     );
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
            DB::table('distributions')->where('id', $distributionId)->update(['status' => 1]);
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
