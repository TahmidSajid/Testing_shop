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
            $img = Image::make($request->file('image'))->resize(540,540);
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
    public function edit(Members $member)
    {
        return view('dashboard.members.edit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Members $member)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'priority' => 'required',
        ]);

        Members::where('id',$member->id)->update([
            'name' => $request->name,
            'position' => $request->position,
            'priority' => $request->priority,
        ]);

        if($request->hasFile('image')){
            if($member->image){
                unlink(base_path('public/uploads/members_photos/'.$member->image));
            }
            $new_name = Str::slug($request->name).time().".".$request->file('image')->getClientOriginalExtension();
            $img = Image::make($request->file('image'))->resize(540,540);
            $img->save(base_path('public/uploads/members_photos/'.$new_name),80);
            Members::find($member->id)->update([
                'image'=> $new_name,
            ]);
        }
        return redirect(route('members.index'))->with('update_mamber','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Members $member)
    {
        if($member->image){
            unlink(base_path('public/uploads/members_photos/'.$member->image));
        }
        Members::where('id',$member->id)->delete();
        return back()->with('delete_mamber','delete successfully');
    }
}
