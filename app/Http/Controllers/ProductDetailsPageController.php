<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\GalleryImages;
use App\Models\Reviews;
use Illuminate\Support\Carbon;

class ProductDetailsPageController extends Controller
{
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
