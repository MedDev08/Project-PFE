
<x-layout>
    
    <div class="container-fluid px-4">
        <h1 class="mt-4">Show</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item"><a href="/salaries">Employees</a></li>
            <li class="breadcrumb-item active">{{$salarieServ->nom}} {{$salarieServ->prenom}}</li>
        </ol>
        
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{$salarieServ->nom}} {{$salarieServ->prenom}}</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 200px;"
                                src="{{asset('storage/'.$salarieServ->img)}}" alt="...">
    
                        </div>
                        <div class="row text-center">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                <div class="address-hr">
                                    <p><b>CIN</b><br /> {{$salarieServ->cin}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                    <p><b>Sexe</b><br /> {{$salarieServ->sexe}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                <div class="address-hr">
                                    <p><b>Salary</b><br />
                                        @php
                                            $formattedPrice = number_format($salarieServ->salaire, 2, ',', ' ') . ' DH';
                                            echo $formattedPrice;
                                        @endphp
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                    <p><b>Phone</b><br /> {{$salarieServ->tel}}</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <h1>History</h1><br /><hr>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Start Date</th>
                                        <th>Finish Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($salarieInOrder as $sInOrder)
                                @php
                                    $start_dtInOrder=date('Y-m-d', strtotime($sInOrder->start_date));
                                    $finish_dtInOrder=date('Y-m-d', strtotime($sInOrder->finish_date));
                                    $currentDate = \Carbon\Carbon::now();
                                    $todayDate=$currentDate->format('Y-m-d');
                                @endphp
                                    <tr>
                                        <td>{{$sInOrder->company_name}}</td>
                                        <!--<td>{{ \Carbon\Carbon::parse($sInOrder->start_date)->diff(\Carbon\Carbon::parse($sInOrder->finish_date))->format('%y years, %m months, %d days') }}</td>-->
                                        <td>
                                            @if ($start_dtInOrder==$todayDate)
                                            Today
                                            @else
                                            {{$start_dtInOrder}}
                                            @endif
                                        </td>
                                        <td>{{$finish_dtInOrder}}</td>
                                        <td style="text-align: center">
                                            @if ($finish_dtInOrder>=$todayDate&&$start_dtInOrder<=$todayDate)
                                            <span class="badge badge-primary">Active</span>
                                            @else
                                                @if ($start_dtInOrder>$todayDate)
                                                <span class="badge badge-secondary">Soon</span>
                                                @else
                                                    @if($finish_dtInOrder<$todayDate)
                                                        <span class="badge badge-success">Finished</span> 
                                                    @endif
                                                @endif
                                            @endif 
                                        </td>
                                    </tr>
                                    
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