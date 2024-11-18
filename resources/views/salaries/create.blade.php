<x-layout>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Form</h4>
                </div>
            </div>
            <div class="card-body">
            <form action="/salaries" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3"><label class="form-control-label">ID</label></div>
                    <div class="col-12 col-md-9">
                        <p class="form-control-static">Username</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="cin" class=" form-control-label">CIN</label></div>
                    <div class="col-12 col-md-6">
                        <input type="text" value="{{old('cin')}}" id="text-input" name="cin" placeholder="CIN" class="form-control">

                        @error('cin')
                        <small class="form-text text-muted">{{$message}}</small>
                        @enderror
                        
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="nom" class=" form-control-label">Last Name</label></div>
                    <div class="col-12 col-md-6">
                        <input type="text" value="{{old('nom')}}" id="text-input" name="nom" placeholder="Last Name" class="form-control">

                        @error('nom')
                        <small class="form-text text-muted">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="prenom" class=" form-control-label">First Name</label></div>
                    <div class="col-12 col-md-6">
                        <input type="text" value="{{old('prenom')}}" id="text-input" name="prenom" placeholder="First Name" class="form-control">

                        @error('prenom')
                        <small class="form-text text-muted">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="tel" class=" form-control-label">Phone</label></div>
                    <div class="col-12 col-md-6">
                        <input type="text" value="{{old('tel')}}" id="text-input" name="tel" placeholder="Phone" class="form-control">

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
                            <option @selected(old('services_id')===$service->id) value="{{$service->id}}">{{$service->name}}</option>
                                
                            @endforeach
                        </select>
                        @error('services_id')
                        <small class="form-text text-muted">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="salaire" class=" form-control-label">Salary</label></div>
                    <div class="col-12 col-md-6">
                        <input type="text" value="{{old('salaire')}}" id="text-input" name="salaire" placeholder="Salary" class="form-control">

                        @error('salaire')
                        <small class="form-text text-muted">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="img" class=" form-control-label">Image</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="img" class="form-control-file"></div>
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