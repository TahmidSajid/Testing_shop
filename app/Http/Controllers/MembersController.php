<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Members::all();
        return view('dashboard.members.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'priority' => 'required',
        ]);

        $member = Members::create($request->except('_token'));

        if($request->hasFile('image')){
            $new_name = Str::slug($request->name).time().".".$request->file('image')->getClientOriginalExtension();
            $img = Image::make($request->file('image'))->resize(300,200);
            $img->save(base_path('public/uploads/members_photos/'.$new_name),80);
            Members::find($member->id)->update([
                'image'=> $new_name,
            ]);
        }
        return back()->with('add_mamber','Member added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Members $members)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Members $members)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Members $members)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Members $members)
    {
        //
    }
}
