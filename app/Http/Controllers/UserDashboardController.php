<?php

namespace App\Http\Controllers;

use App\Mail\OtpMail;
use App\Mail\VerificationMail;
use App\Models\User;
use App\Models\verifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserDashboardController extends Controller
{
    public function verify_page()
    {
        $otp = rand(1000,4000);

        verifications::insert([
            'number' => "01799863305",
            'user_id' => auth()->user()->id,
            'OTP' => $otp,
        ]);

        Mail::to(auth()->user()->email)->send(new OtpMail($otp));

        return view('frontend.user_otp_verify');
    }
    public function verify_user(Request $request){

        $user_otp = $request->OTP;
        $data_base_otp = verifications::where('user_id',auth()->user()->id)->first();

        if($data_base_otp->OTP == $user_otp){
            User::where('id',auth()->user()->id)->update([
                'status' => 'verified',
            ]);
            verifications::where('user_id',auth()->user()->id)->delete();

            return redirect(route('user_dashboard'))->with('verification_successfull','Updated information verified');
        }
        else{

            return redirect(route('user_dashboard'))->with('invalid_otp','OTP invalide');
        }
    }


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

    public function password_change(Request $request){
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        $old_password =  $request->old_password;
        $new_password =  $request->password;

        if(Hash::check($old_password,auth()->user()->password)){
            User::where('id',auth()->user()->id)->update([
                'password' => Hash::make($new_password),
            ]);
            return back()->with('password_changed','Password updated');
        }
        else{
            return back()->with('updating_failed','Wrong password given');
        }

    }

    public function address_update(Request $request){
        $request->validate([
            'address' => 'required',
        ]);

        User::where('id',auth()->user()->id)->update([
            'address' => $request->address,
        ]);

        return back()->with('address_update','Address has been updated');
    }

    public function user_dashboard(){
        return view ('frontend.user-dashboard')->with([
            'status' => User::where('id',auth()->user()->id)->first()->status,
        ]);
    }
}
