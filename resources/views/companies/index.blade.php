<x-layout>
    
    <div class="container-fluid px-4">
        <h1 class="mt-4">Companies</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item active">Companies</li>
        </ol>
        <x-flash-message/>
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Add Row</h4>
                    <a href="companies/create" class="btn btn-primary btn-round ms-auto" >
                        <i class="fa fa-plus"></i>
                        Add Row
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>phone</th>
                            <th>Location</th>
                            <th>Description</th>
                            <th style="width: 10%">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Location</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @unless (count($companies)==0)

                        @foreach ($companies as $company)
                        <tr>
                            <td><img width="100px" src="{{asset('storage/'.$company->img)}}" alt=""></td>
                            <td>{{$company->name}}</td>
                            <td>{{$company->phone}}</td>
                            <td>{{$company->location}}</td>
                            <td>{{$company->description}}</td>
                            <td>
                                <div class="form-button-action">
                                    <a href="{{route('companies.show',$company)}}" data-bs-toggle="tooltip" title="" class="btn btn-link btn-secondary btn-lg" data-original-title="Edit Task">
                                        <i class="fa fa-user"></i>
                                    </a>
                                    <a href="{{route('companies.edit',$company)}}" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{route('companies.destroy',$company)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                <!--<a href="companies/destroy/"class="btn btn-primary btn-sm"><i class="fas fa-user"></i></a>
                                <a href="{{route('companies.edit',$company)}}" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i></a>
                                <form method="POST" action="{{route('companies.destroy',$company)}}">
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