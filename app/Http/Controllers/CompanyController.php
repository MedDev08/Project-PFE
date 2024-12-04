<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Company;
use App\Models\Salarie;
use App\Models\Assignement;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('companies.index',[
            'companies'=>Company::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $company)
    {
        $formFields=$company->validated();
        if($company->hasFile('img')){
            $formFields['img']=$company->file('img')->store('companies','public');
        }
        Company::create($formFields);
        return redirect('/companies')->with('message','Company created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $orders=Order::where('companies_id',$company->id)->with('service')->get();
        $orderEmployees=Assignement::all();
        $salaries=Salarie::all();
        //dd($orderEmployees);
        return view('companies.show',[
            'company'=>$company,
            'orders'=>$orders,
            'orderEmployees'=>$orderEmployees,
            'salaries'=>$salaries
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit',[
            'company'=>$company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $companyRequest, Company $company)
    {
        $formFields=$companyRequest->validated();
        if($companyRequest->hasFile('img')){
            $formFields['img']=$companyRequest->file('img')->store('companies','public');
        }
        $company->fill($formFields)->save();
        return redirect('/companies')->with('message','Company updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect('/companies')->with('message','Company deleted successfully!');

    }
}
