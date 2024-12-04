<x-layout>
    
    <div class="container-fluid px-4">
        <h1 class="mt-4">Orders</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item active">Orders</li>
        </ol>
        <x-flash-message/>
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Orders List</h4>
                    <a href="orders/create" class="btn btn-primary btn-round ms-auto" >
                        <i class="fa fa-plus"></i>
                        Add
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Service</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                            <th style="width: 10%">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Number</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Service</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @unless (count($orders)==0)

                        @foreach ($orders as $order)
                        <tr>
                            <td>N°= {{$order->num}}</td>
                            <td><img width="100px" src="{{asset('storage/'.$order->company->img)}}" alt=""></td>
                            <td>{{$order->company->name}}</td>
                            <td>{{$order->service->name}}</td>
                            <td>{{$order->qte}}</td>
                            <td>
                                @php
                                    $formattedPrice = number_format($order->unit_price, 2, ',', ' ') . ' DH';
                                    echo $formattedPrice;
                                @endphp
                            </td>
                            <td><b>
                                @php
                                $total = $order->unit_price*$order->qte;
                                $formattedPrice = number_format($total, 2, ',', ' ') . ' DH';
                                echo $formattedPrice;
                                @endphp</b>
                            </td>
                            <td>
                                <div class="form-button-action">
                                    <!--<a href="" data-bs-toggle="tooltip" title="" class="btn btn-link btn-secondary btn-lg" data-original-title="Edit Task">
                                        <i class="fa fa-user"></i>
                                    </a>
                                    <a href="{{route('orders.edit',$order)}}" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                        <i class="fa fa-edit"></i>
                                    </a>-->
                                    <form method="POST" action="{{route('orders.destroy',$order)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                <!--<a href="companies/destroy/"class="btn btn-primary btn-sm"><i class="fas fa-user"></i></a>
                                <a href="" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i></a>
                                <form method="POST" action="">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>-->
                            </td>
                        </tr>
                        @endforeach

                        @else
                        <tr>
                            <td>No companies found</td>
                        </tr>
                        @endunless
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>