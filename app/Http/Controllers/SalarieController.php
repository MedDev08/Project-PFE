<?php

namespace App\Http\Controllers;

use App\Models\Salarie;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SalarieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salaries=Salarie::query()->with('service')->get();
        return view('salaries.index',[
            'salaries'=>$salaries,
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
        $salarie =new Salarie();
        return view('salaries.create',[
            'salarie'=>$salarie,
            'services'=>Services::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $formFields=$request->validate([
            'cin'=>['required',Rule::unique('salaries','cin')],
            'nom'=>'required',
            'prenom'=>'required',
            'tel'=>'required',
            'services_id'=>['required','numeric'],
            'salaire'=>['required','numeric']
        ]);
        
        if($request->hasFile('img')){
            $formFields['img']=$request->file('img')->store('images','public');
        }
        Salarie::create($formFields);
        return redirect('/salaries')->with('message','Employee created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salarie  $salarie
     * @return \Illuminate\Http\Response
     */
    public function show(Salarie $salarie)
    {
        //
        return view('salaries.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salarie  $salarie
     * @return \Illuminate\Http\Response
     */
    public function edit(Salarie $salarie)
    {
        //dd($salarie->service()->get());
        
        return view('salaries.edit',[
            'salarie'=>$salarie,
            'services'=>Services::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salarie  $salarie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salarie $salarie)
    {
        $formFields=$request->validate([
            'cin'=>['required'],
            'nom'=>'required',
            'prenom'=>'required',
            'tel'=>'required',
            'salaire'=>['required','numeric'],
            'services_id'=>['required','numeric']
        ]);
        if($request->hasFile('img')){
            $formFields['img']=$request->file('img')->store('images','public');
        }
        $salarie->update($formFields);
        return redirect('/salaries')->with('message','Employee updated successfully!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salarie  $salarie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salarie $salarie)
    {
        $salarie->delete();
        return redirect('/salaries')->with('message','Employee delete successfully!');
    }
}
