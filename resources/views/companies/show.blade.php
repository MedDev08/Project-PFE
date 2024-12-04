<x-layout>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Show</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item"><a href="/salaries">Employees</a></li>
            <li class="breadcrumb-item active">{{$company->name}}</li>
        </ol>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{$company->name}} Sarl</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                src="{{asset('storage/'.$company->img)}}" alt="...">
    
                        </div>
                        <div class="row text-center">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                <div class="address-hr">
                                    <p><b>Number</b><br /> {{$company->num}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                    <p><b>phone</b><br /> {{$company->phone}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                <div class="address-hr">
                                    <p><b>Location</b><br /> {{$company->location}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                    <p><b>Email</b><br /> {{$company->email}}</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <b>Description</b><br />
                            <p>{{$company->description}}</p>
                        </div>
                        <div class="row">
                            <b>Orders</b><br />
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>Service</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Total</th>
                                        <th>Period</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{$order->num}}</td>
                                        <td>{{$order->service->name}}</td>
                                        <td>{{$order->qte}}</td>
                                        <td>{{$order->qte}}</td>
                                        <td>{{$order->qte}}</td>
                                        <td>{{ \Carbon\Carbon::parse($order->start_date)->diff(\Carbon\Carbon::parse($order->finish_date))->format(' %m months, %d days') }}</td>
                                        </td>
                                    </tr>
                                    @foreach ($orderEmployees as $oEmp)
                                        @if ($oEmp->order_id==$order->id)
                                            @foreach ($salaries as $salarie)
                                                @if ($salarie->id==$oEmp->salarie_id)
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>{{$salarie->nom}} {{$salarie->prenom}}</td>
                                                        <td>{{date('Y-m-d', strtotime($oEmp->start_date))}}</td>
                                                        <td>{{date('Y-m-d', strtotime($oEmp->finish_date))}}</td>
                                                        <td></td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        
                                        @endif
                                    @endforeach
                                        
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>