<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Company;
use App\Models\Salarie;
use App\Models\Services;
use Illuminate\Http\Request;
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
        $salaries=Salarie::query()->with('order')->get();
        //dd($salaries);
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
        $salaries=Salarie::where('dispo',0)->with('service')->get();
        //dd($salaries);
        return view('orders.create',[
            'companies'=>$companies,
            'services'=>$services,
            'salaries'=>$salaries
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
        $formFields=$orderRequest->validated();
        $companies_id=$formFields['companies_id'];
        $services_id=$formFields['services_id'];

        // Create the order
        $order=Order::create([
            'companies_id'=>$companies_id,
            'services_id'=>$services_id
        ]);
        
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
        $salaries=Salarie::with('service')->get();
        //dd($salaries);
        return view('orders.edit',[
            'order'=>$order,
            'companies'=>$companies,
            'services'=>$services,
            'salaries'=>$salaries
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $salaries=Salarie::where('orders_id',$order->id)->get();
        foreach ($salaries as $salarie) {
            $salarie->dispo=0;
            $salarie->date_fin=now();
            $salarie->save();
        }
        $order->delete();
        

        return redirect('/orders')->with('message','Order deleted successfully!');
    }
}
