<x-layout>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item"><a href="/salaries">Employees</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Edit Employee</h4>
                </div>
            </div>
            <div class="card-body">
            <form action="/salaries/{{$salarie->id}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col col-md-3"><label for="cin" class=" form-control-label">CIN</label></div>
                    <div class="col-12 col-md-6">
                        <input type="text" value="{{$salarie->cin}}" id="text-input" name="cin" placeholder="CIN" class="form-control">

                        @error('cin')
                        <small class="form-text text-muted">{{$message}}</small>
                        @enderror
                        
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="nom" class=" form-control-label">Last Name</label></div>
                    <div class="col-12 col-md-6">
                        <input type="text" value="{{$salarie->nom}}" id="text-input" name="nom" placeholder="Last Name" class="form-control">

                        @error('nom')
                        <small class="form-text text-muted">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="prenom" class=" form-control-label">First Name</label></div>
                    <div class="col-12 col-md-6">
                        <input type="text" value="{{$salarie->prenom}}" id="text-input" name="prenom" placeholder="First Name" class="form-control">

                        @error('prenom')
                        <small class="form-text text-muted">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="sexe" class=" form-control-label">Sexe</label></div>
                    <div class="col-12 col-md-6">
                        <select id="sexe" name="sexe" class="form-select">
                            <option value="">choose one</option>
                            <option @selected($salarie->sexe=='Man') value="Man">Man</option>
                            <option @selected($salarie->sexe=='Woman') value="Woman">Woman</option>
                        </select>
                        @error('sexe')
                        <small class="form-text text-muted">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="tel" class=" form-control-label">Phone</label></div>
                    <div class="col-12 col-md-6">
                        <input type="text" value="{{$salarie->tel}}" id="text-input" name="tel" placeholder="Phone" class="form-control">

                        @error('tel')
                        <small class="form-text text-muted">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="services_id" class=" form-control-label">Services</label></div>
                    <div class="col-12 col-md-6">
                        <select id="services_id" name="services_id" class="form-select">
                            <option value="">choose one</option>
                            @foreach ($services as $service)
                            <option @selected($salarie->services_id==$service->id) value="{{$service->id}}">{{$service->name}}</option>
                                
                            @endforeach
                        </select>
                        @error('services')
                        <small class="form-text text-muted">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="salaire" class=" form-control-label">Salary</label></div>
                    <div class="col-12 col-md-6">
                        <input type="text" value="{{$salarie->salaire}}" id="text-input" name="salaire" placeholder="Salary" class="form-control">

                        @error('salaire')
                        <small class="form-text text-muted">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="img" class=" form-control-label">Image</label></div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="file-input" name="img" class="form-control-file">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"></div>
                    <div class="col-12 col-md-9">
                        <img width="100px" src="{{asset('storage/'.$salarie->img)}}" alt="">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle"></i> Submit
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</x-layout>