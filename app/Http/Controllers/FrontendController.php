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
            if(auth()->user()->status == "unverified"){
                return redirect()->route('user_otp_verify');
            }
            else{
                return view('frontend.index')->with([
                    'categories' => categories::all(),
                    'products' => Products::latest()->get(),
                    'banners' => Products::latest()->take(3)->get(),
                    'leatest' => Products::latest()->take(4)->get(),
                ]);;
            }
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
    public function about(){
        return view('frontend.about');
    }
    public function user_otp_verify(){
        return view('frontend.user_otp_verify');
    }
    public function contact_page(){
        return view ('frontend.contact_us');
    }
    public function contact_page_form(Request $request){

        // return $request->except('_token');
        Mail::to($request->contact_email)->send(new ContactMail($request->except('_token')));
        return back()->with('email_sent',"email sent successfully");

    }
    public function product_view($id){

        $product = Products::where('id',$id)->first();
        $related_category = Products::select('category_id')->where('id',$id)->first();
        $related_products = Products::where('category_id',$related_category->category_id)->limit(4)->get();
        $gallery_images = GalleryImages::where('product_id',$id)->get();
        $product_reviews = Reviews::where('product_id',$id)->get();
        $product_reviews_count = Reviews::where('product_id',$id)->count();
        return view('frontend.product_page',compact('product','related_products','gallery_images','product_reviews','product_reviews_count'));
    }

    public function add_review($product_id ,Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'stars' => 'required',
            'comment' => 'required',
        ]);

        Reviews::insert([
            'name' => $request->name,
            'email' => $request->email,
            'review' => $request->comment,
            'rating' => $request->stars,
            'user_id' => auth()->user()->id,
            'product_id' => $product_id,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('review_successfull', 'Thanks for your review');
    }
}
