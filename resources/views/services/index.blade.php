<x-layout>
    
    <div class="container-fluid px-4">
        <h1 class="mt-4">Services</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item active">Services</li>
        </ol>
        <x-flash-message/>
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Services List</h4>
                    <a href="services/create" class="btn btn-primary btn-round ms-auto" >
                        <i class="fa fa-plus"></i>
                        Add
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($services as $service)
                    <div class="col-lg-6">
                        <div class="card card-post card-round" style="align-items: center">
                        <img width="200px" src="{{asset('storage/'.$service->img)}}" alt="Card image cap" />
                        <div class="card-body">
                            <div class="d-flex">
                            <div class="info-post ms-2">
                                <p class="username"></p>
                            </div>
                            </div>
                            <div class="separator-solid"></div>
                            <h3 class="card-title">{{$service->name}}</h3>
                            <p class="card-text">
                            {{$service->description}}
                            </p>
                            <a href="{{route('services.edit',$service)}}" class="btn btn-primary btn-rounded btn-sm" style="float: inline-start;margin:5px"><i class="fa fa-user"></i> Edit</a>
                            <form method="POST" action="{{route('services.destroy',$service)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" data-bs-toggle="tooltip" title="" class="btn btn-danger btn-rounded btn-sm" data-original-title="Remove" style="float: inline-start;margin:5px">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                        </div>
                    </div>
                        
                    @endforeach
                </div>
                <!--<table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Service</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Image</th>
                            <th>Service</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @unless (count($services)==0)

                        @foreach ($services as $service)
                        <tr>
                            <td><img width="100px" src="{{asset('storage/'.$service->img)}}" alt=""></td>
                            <td>{{$service->name}}</td>
                            <td>{{$service->description}}</td>
                            <td>
                                <div class="form-button-action">
                                    <a href="" data-bs-toggle="tooltip" title="" class="btn btn-link btn-secondary btn-lg" data-original-title="Edit Task">
                                        <i class="fa fa-user"></i>
                                    </a>
                                    <a href="{{route('services.edit',$service)}}" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{route('services.destroy',$service)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                <!--<a href="services/destroy/"class="btn btn-primary btn-sm"><i class="fas fa-user"></i></a>
                                <a href="{{route('services.edit',$service)}}" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i></a>
                                <form method="POST" action="{{route('services.destroy',$service)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                        @else
                        <tr>
                            <td>No services found</td>
                        </tr>
                        @endunless
                    </tbody>
                </table>-->-->
            </div>
        </div>
    </div>
</x-layout>