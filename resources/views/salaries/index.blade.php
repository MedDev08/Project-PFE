<x-layout>
    
    <div class="container-fluid px-4">
        <h1 class="mt-4">Employees</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item active">Employees</li>
        </ol>
        <x-flash-message/>
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Add Employee</h4>
                    <a href="salaries/create" class="btn btn-primary btn-round ms-auto" >
                        <i class="fa fa-plus"></i>
                        Add
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>CIN</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Sexe</th>
                            <th>Service</th>
                            <th>Salary</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Image</th>
                            <th>CIN</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Sexe</th>
                            <th>Service</th>
                            <th>Salary</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($salaries as $salarie)
                        <tr>
                            <td><img width="100px" src="{{asset('storage/'.$salarie->img)}}" alt=""></td>
                            <td>{{$salarie->cin}}</td>
                            <td>{{$salarie->nom}}</td>
                            <td>{{$salarie->prenom}}</td>
                            <td>{{$salarie->sexe}}</td>
                            <td>
                                @foreach ($services as $service)
                                @if ($salarie->services_id===$service->id)
                                    
                                    {{$service->name}}
                                @endif
                                @endforeach
                            </td>
                            <td>{{$salarie->salaire}}</td>
                            <td>{{$salarie->tel}}</td>
                            <td>
                                <div class="form-button-action">
                                    <a href="" data-bs-toggle="tooltip" title="" class="btn btn-link btn-secondary btn-lg" data-original-title="Edit Task">
                                        <i class="fa fa-user"></i>
                                    </a>
                                    <a href="salaries/{{$salarie->id}}/edit" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form method="POST" action="/salaries/{{$salarie->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                <!--<a href="salaries/destroy/"class="btn btn-primary btn-sm"><i class="fas fa-user"></i></a>
                                <a href="salaries/{{$salarie->id}}/edit" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i></a>
                                <form method="POST" action="/salaries/{{$salarie->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>-->
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td>No employees found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>