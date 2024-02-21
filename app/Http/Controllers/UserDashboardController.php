<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMail;
use App\Models\User;
use App\Models\verifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserDashboardController extends Controller
{
    public function update_details(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
        ]);
        $otp = rand(1000,4000);

        verifications::insert([
            'number' => $request->phone_number,
            'user_id' => auth()->user()->id,
            'OTP' => $otp,
        ]);

        $previous_info = User::where('id',auth()->user()->id)->first();
        $updated_info = $request;

        Mail::to(auth()->user()->email)->send(new VerificationMail($otp,$previous_info,$updated_info));

        User::where('id',auth()->user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->phone_number,
            'status' => 'unverified'
        ]);
        return back()->with('details_update','Account details Updated');
    }

    public function update_verify(Request $request){

        $user_otp = $request->otp;
        $data_base_otp = verifications::where('user_id',auth()->user()->id)->first();

        if($data_base_otp->OTP == $user_otp){
            User::where('id',auth()->user()->id)->update([
                'status' => 'verified',
            ]);
            verifications::where('user_id',auth()->user()->id)->delete();

            return back()->with('verification_successfull','Updated information verified');
        }
        else{

            return back()->with('invalid_otp','OTP invalide');
        }
    }

    public function user_dashboard(){
        return view ('frontend.user-dashboard')->with([
            'status' => User::where('id',auth()->user()->id)->first()->status,
        ]);
    }
}
