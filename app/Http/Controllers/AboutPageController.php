<?php

namespace App\Http\Controllers;

use App\Models\CompanyHistory;
use App\Models\Services;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function about(){
        $services = Services::all();
        $history = CompanyHistory::first();
        return view('frontend.about',compact('services','history'));
    }


}
