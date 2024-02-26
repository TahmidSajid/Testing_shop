<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Services::all();
        return view('dashboard.about.service.index',compact("services"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required',
            'service_detail' => 'required',
            'service_icon' => 'required',
        ]);

        Services::create($request->except('_token'));

        return back()->with('added','service has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Services $service)
    {
        return view('dashboard.about.service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Services $service)
    {
        $request->validate([
            'service_name' => 'required',
            'service_detail' => 'required',
            'service_icon' => 'required',
        ]);

        Services::where('id',$service->id)->update([
            'service_name' => $request->service_name,
            'service_detail' => $request->service_detail,
            'service_icon' => $request->service_icon,
        ]);

        return redirect(route('services.index'))->with('update','service has beed updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Services $service)
    {
        Services::where('id',$service->id)->delete();

        return back()->with('delete','service has been deleted');
    }
}
