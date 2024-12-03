<x-layout>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item"><a href="/companies">Companies</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Create Company</h4>
                </div>
            </div>
            <div class="card-body">
            <form action="{{route('companies.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3"><label for="num" class=" form-control-label">Company Number</label></div>
                    <div class="col-12 col-md-6">
                        <input type="text" value="{{old('num')}}" id="text-input" name="num" placeholder="Company Number" class="form-control">

                        @error('num')
                        <small class="form-text text-muted">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="name" class=" form-control-label">Company Name</label></div>
                    <div class="col-12 col-md-6">
                        <input type="text" value="{{old('name')}}" id="text-input" name="name" placeholder="Company Name" class="form-control">

                        @error('name')
                        <small class="form-text text-muted">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="phone" class=" form-control-label">Phone number</label></div>
                    <div class="col-12 col-md-6">
                        <input type="text" value="{{old('phone')}}" id="text-input" name="phone" placeholder="Phne Number" class="form-control">

                        @error('phone')
                        <small class="form-text text-muted">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="email" class=" form-control-label">Email</label></div>
                    <div class="col-12 col-md-6">
                        <input type="email" value="{{old('email')}}" id="text-input" name="email" placeholder="example@example.com" class="form-control">

                        @error('email')
                        <small class="form-text text-muted">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="location" class=" form-control-label">Location</label></div>
                    <div class="col-12 col-md-6">
                        <input type="text" value="{{old('location')}}" id="text-input" name="location" placeholder="Location" class="form-control">

                        @error('location')
                        <small class="form-text text-muted">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="description" class=" form-control-label">Description</label></div>
                    <div class="col-12 col-md-9">
                        <textarea name="description" id="textarea-input" rows="9" placeholder="Content..." class="form-control">{{old('description')}}</textarea>

                        @error('description')
                            <small class="form-text text-muted">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="img" class=" form-control-label">Image</label></div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="file-input" name="img" class="form-control-file">

                        @error('img')
                            <small class="form-text text-muted">{{$message}}</small>
                        @enderror
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