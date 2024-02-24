<?php

namespace App\Http\Controllers;

use App\Models\CompanyHistory;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function about_us_view()
    {
        $company_history = CompanyHistory::first();
        return view('dashboard.about.about_us',compact('company_history'));
    }

    public function add_history(Request $request)
    {
        // return $request;

        $request->validate([
            'history_heading' => 'required',
            'history_paragraph' => 'required',
        ]);
        $insert_per = CompanyHistory::where('id',1)->first();
        if($insert_per === null){
            CompanyHistory::insert([
                'history_heading'=> $request->history_heading,
                'history_paragraph' => $request->history_paragraph,
            ]);
        }
        else{
            CompanyHistory::where('id',1)->update([
                'history_heading'=> $request->history_heading,
                'history_paragraph' => $request->history_paragraph,
            ]);
        }

        return back();
    }
}
