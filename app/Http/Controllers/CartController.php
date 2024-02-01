<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart_view(){
        return view('frontend.cart.cart_page');
    }
}
