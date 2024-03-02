<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\CompanyHistory;

class CompanyHistoryController extends Controller
{
    public function company_history_view()
    {
        $company_history = CompanyHistory::first();
        return view('dashboard.about.company_history',compact('company_history'));
    }
    public function add_history(Request $request)
    {

        $request->validate([
            'history_heading' => 'required',
            'history_paragraph' => 'required',
            'image' => 'required',
        ]);
        $insert_per = CompanyHistory::where('sl_no',1)->first();
        if($insert_per === null){
            $new_name = Str::slug($request->history_heading).time().".".$request->file('image')->getClientOriginalExtension();
            $image = Image::make($request->file('image'))->resize(1140,690);
            $image->save(base_path('public/uploads/company_photos/'.$new_name),90);
            CompanyHistory::insert([
                'history_heading'=> $request->history_heading,
                'sl_no'=> 1,
                'history_paragraph' => $request->history_paragraph,
                'image' => $new_name,
            ]);
        }
        else{
            if($insert_per->image){
                unlink(base_path('public/uploads/company_photos/'.$insert_per->image));
            }
            $new_name = Str::slug($request->history_heading).time().".".$request->file('image')->getClientOriginalExtension();
            $image = Image::make($request->file('image'))->resize(1140,690);
            $image->save(base_path('public/uploads/company_photos/'.$new_name),90);
            CompanyHistory::where('sl_no',1)->update([
                'history_heading'=> $request->history_heading,
                'history_paragraph' => $request->history_paragraph,
                'image' => $new_name,
            ]);
        }
        return back();
    }
}
