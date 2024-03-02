<?php

namespace App\Http\Controllers;

use App\Models\Branches;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branches::all();
        return view('dashboard.contact_us.branch.index',compact('branches'));
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
            'branch_name' => 'required',
            'address' => 'required',
            'from' => 'required',
            'to' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
        ]);

        $time = $request->from."-".$request->to;

        Branches::create($request->except('_token','from','to')+[
            'time' => $time,
        ]);

        return back()->with('add','Branch added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Branches $branches)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branches $branch)
    {
        $branch = Branches::where('id',$branch->id)->first();
        $from = explode('-',$branch->time)[0];
        $to = explode('-',$branch->time)[1];
        return view('dashboard.contact_us.branch.edit',compact('branch','from','to'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branches $branch)
    {
        $request->validate([
            'branch_name' => 'required',
            'address' => 'required',
            'from' => 'required',
            'to' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
        ]);

        $time = $request->from."-".$request->to;

        Branches::where('id',$branch->id)->update([
            'branch_name' => $request->branch_name,
            'address' => $request->address,
            'time' => $time,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        return redirect(route('branch.index'))->with('updated','Branch Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branches $branch)
    {
        Branches::where('id',$branch->id)->delete();

        return back()->with('deleted','Branch Deleted');
    }
}
