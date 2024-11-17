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
                    <h4 class="card-title">Add Row</h4>
                    <a href="salaries/create" class="btn btn-primary btn-round ms-auto" >
                        <i class="fa fa-plus"></i>
                        Add Row
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>CIN</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Phone</th>
                            <th>Start date</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Image</th>
                            <th>CIN</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Phone</th>
                            <th>Start date</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @unless (count($salaries)==0)

                        @foreach ($salaries as $salarie)
                        <tr>
                            <td><img width="100px" src="{{asset('storage/'.$salarie->img)}}" alt=""></td>
                            <td>{{$salarie->cin}}</td>
                            <td>{{$salarie->nom}}</td>
                            <td>{{$salarie->prenom}}</td>
                            <td>{{$salarie->tel}}</td>
                            <td>{{$salarie->date_debut}}</td>
                            <td>{{$salarie->salaire}}</td>
                            <td>
                                <div class="form-button-action">
                                    <a href="{{route('companies.show',$company)}}" data-bs-toggle="tooltip" title="" class="btn btn-link btn-secondary btn-lg" data-original-title="Edit Task">
                                        <i class="fa fa-user"></i>
                                    </a>
                                    <a href="salaries/{{$salarie->id}}/edit" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form method="POST" action="/salaries/{{$salarie->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
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
                        @endforeach

                        @else
                        <tr>
                            <td>No employees found</td>
                        </tr>
                        @endunless
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>