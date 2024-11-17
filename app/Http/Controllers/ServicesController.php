<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use App\Http\Requests\ServicesRequest;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('services.index',[
            'services'=>Services::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicesRequest $request)
    {
        $formFields=$request->validated();
        if($request->hasFile('img')){
            $formFields['img']=$request->file('img')->store('services','public');
        }
        Services::create($formFields);
        return redirect('/services')->with('message','Service created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(Services $service)
    {

        return view('services/edit',[
            'service'=>$service
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(ServicesRequest $request, Services $service)
    {
        $formFields=$request->validated();
        if($request->hasFile('img')){
            $formFields['img']=$request->file('img')->store('services','public');
        }
        $service->fill($formFields)->save();
        return redirect('/services')->with('message','Service updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Services $services)
    {
        $services->delete();
        return redirect('/services')->with('message','Service deleted successfully!');
    }
}
