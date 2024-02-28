<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\verifications;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserRegisterController extends Controller
{
    public function user_register(){
        return view('frontend.user-register');
    }
    public function user_account_register(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
            'email'=>'required',
            'number'=>'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        $user_password = Hash::make($request->password);
        User::insert([
            'name'=>$request->username,
            'email'=>$request->email,
            'password'=>$user_password,
            'number'=>$request->number,
            'role'=>'user',
            'created_at'=>Carbon::now(),
        ]);


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect(route('index'));
        }
    }
    public function user_login(Request $request){
        $request->validate([
            'email'=> 'required',
            'password'=>'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,])) {
            return redirect()->route('index');
        }
        else{
            return "login failed";
        }
        // return($request);
        // if(is_numeric($request->email)){
        //     if (Auth::attempt(['number' => $request->email, 'password' => $request->password,])) {
        //         return redirect()->route('index');
        //     }
        // }
        // else{
        //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password,])) {
        //         return redirect()->route('index');
        //     }
        // }
    }

}
