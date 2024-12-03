<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Company;
use App\Models\Salarie;
use App\Models\Services;
use App\Models\Assignement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$orders = Order::with(['company', 'service'])->get();
        $orders = Order::with(['company', 'service'])->get();
        $salaries=Salarie::all();
        //dd($orders);
        return view('orders.index',[
            'orders'=>$orders,
            'salaries'=>$salaries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies=Company::all();
        $services=Services::all();
        //$sal = Salarie::with('orders')->get();
        //$salaries=Salarie::where('dispo',0)->with('service')->get();
        //dd($sal);
        return view('orders.create',[
            'companies'=>$companies,
            'services'=>$services,
            //'salaries'=>$salaries,
            //'sals'=>$sals
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $orderRequest)
    {
        //dd($orderRequest);
        $formFields=$orderRequest->validated();
        $num=$formFields['num'];
        $companies_id=$formFields['companies_id'];
        $services_id=$formFields['services_id'];
        $start_date=$formFields['start_date'];
        $finish_date=$formFields['finish_date'];
        
        // get selected Salaries from the checkbox
        $selectedSalaries=$orderRequest->input('checkboxes',[]);

        // Create the order
        $order=Order::create([
            'num'=>$num,
            'companies_id'=>$companies_id,
            'services_id'=>$services_id,
            'qte'=>count($selectedSalaries),
            'start_date'=>$start_date,
            'finish_date'=>$finish_date
        ]);
        if($order){//if order created
        // Update the order_id of the selected salaries
            foreach ($selectedSalaries as $salariId) {
                $salarie=Salarie::find($salariId);
                $order_salaries=Assignement::create([
                    'order_id'=>$order->id,
                    'salarie_id'=>$salariId,
                    'start_date'=>$start_date,
                    'finish_date'=>$finish_date
                ]);
                //if($salarie->orders_id=$order->id){
                    //$salarie->orders_id=$order->id;
                    $salarie->dispo=1;// Update the status as needed
                    //$salarie->date_debut=$start_date;
                    //$salarie->date_fin=$finish_date;
                    //if($salarie->date_fin=="")$salarie->date_fin=null;
                    $salarie->save();
                //}
            }
        }
        //dd($order);
        return redirect('/orders')->with('message','Order created successfully!');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //dd($order);
        $companies=Company::all();
        $services=Services::all();
        $salaries=Salarie::all();
        //$salaries=Salarie::where('orders_id',$order->id)->get();
        $salariesDispo=Salarie::where('dispo',0)
        ->where('services_id',$order->services_id)    
        ->get();
        //dd($salaries);
        return view('orders.edit',[
            'order'=>$order,
            'companies'=>$companies,
            'services'=>$services,
            'salaries'=>$salaries,
            'salariesDispo'=>$salariesDispo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $orderRequest, Order $order)
    {
        
        $formFields=$orderRequest->validated();
        $companies_id=$formFields['companies_id'];
        $services_id=$formFields['services_id'];

        // Create the order
        /*$order=Order::create([
            'companies_id'=>$companies_id,
            'services_id'=>$services_id
        ]);*/
        // get salaries ordered after update
        $salaries=Salarie::where('orders_id',$order->id)->get();
        foreach($salaries as $salarie)
            $salarie->dispo=0;
        
        // get selected Salaries from the checkbox
        $selectedSalaries=$orderRequest->input('checkboxes',[]);

        // Update the order_id of the selected salaries
        foreach ($selectedSalaries as $salariId) {
            $salarie=Salarie::find($salariId);
            if($salarie->orders_id=$order->id){
                $salarie->orders_id=$order->id;
                $salarie->dispo=1;// Update the status as needed
                $salarie->date_debut=$order->created_at;
                if($salarie->date_fin=="")$salarie->date_fin=null;
                $salarie->save();
            }
        }
        //dd($order);
        return redirect('/orders')->with('message','Order created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        /*$salaries=Salarie::where('orders_id',$order->id)->get();
        $salaries=Salarie::all();
        foreach ($salaries as $salarie) {
            //$salarie->dispo=0;
            //$salarie->date_fin=now();
            //$salarie->save();
        }*/
        $salaries=Salarie::whereNotIn('id',function($query){
            $query->select('salarie_id')
            ->from('order_employees');
        })->get();
        //dd($salaries);
        foreach($salaries as $salarie){
            $salarie->dispo=0;
            $salarie->save();
        }
        DB::table('order_employees')->where('order_id', $order->id)->delete();
        $order->delete();
        $salaries=Salarie::whereNotIn('id',function($query){
            $query->select('salarie_id')
            ->from('order_employees');
        })->get();
        //dd($salaries);
        foreach($salaries as $salarie){
            $salarie->dispo=0;
            $salarie->save();
        }
        return redirect('/orders')->with('message','Order deleted successfully!');
    }
}
