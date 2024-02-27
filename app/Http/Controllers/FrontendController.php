<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\categories;
use Illuminate\Support\Facades\Mail;
Use App\Mail\ContactMail;
use App\Models\GalleryImages;
use App\Models\Products;
use App\Models\Reviews;
use Illuminate\Support\Carbon;

class FrontendController extends Controller
{
    public function index(){

        if(Auth::check()){
            // if(auth()->user()->status == "unverified"){
            //     return redirect()->route('user_otp_verify');
            // }
            // else{
                return view('frontend.index')->with([
                    'categories' => categories::all(),
                    'products' => Products::latest()->get(),
                    'banners' => Products::latest()->take(3)->get(),
                    'leatest' => Products::latest()->take(4)->get(),
                ]);;
            // }
        }
        else{
            return view('frontend.index')->with([
                'categories'=>categories::all(),
                'products' => Products::latest()->get(),
                'banners' => Products::latest()->take(3)->get(),
                'leatest' => Products::latest()->take(4)->get(),
            ]);
        }
        // if(User::where('user_id',auth()->user()->id)->exists()){
        //     $customer_id = true;
        //     return view('frontend.index')->with(compact('customer_id'));
        // }
        // else{
        //     $customer_id = false;
        //     return view('frontend.index')->with(compact('customer_id'));
        // }
        // $customer_id = false;
        // return view('frontend.index')->with(compact('customer_id'));
    }
    public function user_otp_verify(){
        return view('frontend.user_otp_verify');
    }
}
