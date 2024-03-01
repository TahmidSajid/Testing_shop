<?php

namespace App\Http\Controllers;

use App\Models\CompanyHistory;
use App\Models\Members;
use App\Models\Reviews;
use App\Models\Services;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function about(){
        $services = Services::all();
        $history = CompanyHistory::first();
        $members = Members::all();


        $four_rating_customers = [];
        $five_rating_customers = [];
        $four_customer = Reviews::select('user_id')->where('rating',4)->distinct()->get();
        foreach ($four_customer as $key => $customer) {
            $four_rating_customers[$key] = $customer->user_id;
        }
        $five_customer = Reviews::select('user_id')->where('rating',5)->distinct()->get();
        foreach ($five_customer as $key => $customer) {
            $five_rating_customers[$key] = $customer->user_id;
        }
        $total_happy_customers = array_merge($four_rating_customers,$five_rating_customers);
        $total_happy_customers = array_unique($total_happy_customers);
        $total_happy_customers = count($total_happy_customers);


        $reviews = Reviews::all();
        $total_rating = 0;
        $total_review = 0;
        foreach ($reviews as $key => $review) {
            $total_rating = $total_rating + $review->rating;
            $total_review = $key +1;
        }

        $total_review;
        $total_satisfaction = $total_rating / $total_review;
        $satisfaction_percentage = round(($total_satisfaction/5)*100);

        return view('frontend.about',compact('services','history','total_happy_customers','satisfaction_percentage','members'));
    }


}
