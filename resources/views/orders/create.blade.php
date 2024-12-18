<x-layout>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item"><a href="/orders">Ordres</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Add Order</h4>
                </div>
            </div>
            <div class="card-body">
            <form action="{{route('orders.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3"><label for="num" class=" form-control-label">Order Number</label></div>
                    <div class="col-12 col-md-6">
                        <input type="text" value="{{old('num')}}" id="text-input" name="num" placeholder="Order Number" class="form-control">

                        @error('num')
                        <small class="form-text text-muted">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="companies_id" class=" form-control-label">Companie</label></div>
                    <div class="col-12 col-md-6">
                        <select id="companies_id" name="companies_id" class="form-select">
                            <option value="">choose one</option>
                            @foreach ($companies as $company)
                            <option @selected(old('companies_id')==$company->id) value="{{$company->id}}">{{$company->name}}</option>
                                
                            @endforeach
                        </select>
                        @error('companies_id')
                        <small class="form-text text-muted">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="start_date" class=" form-control-label">Period</label></div>
                    <div class="col-12 col-md-3">
                        <label for="start_date" class=" form-control-label">Start Date</label>
                        <input type="date" value="{{old('start_date')}}" id="start_date" name="start_date" class="form-control">

                        @error('start_date')
                        <small class="form-text text-muted">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="start_date" class=" form-control-label">Finish Date</label>
                        <input type="date" value="{{old('finish_date')}}" id="finish_date" name="finish_date" class="form-control">

                        @error('finish_date')
                        <small class="form-text text-muted">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="services_id" class=" form-control-label">Services</label></div>
                    <div class="col-12 col-md-6">
                        <select id="serviceSelect" name="services_id" class="form-select">
                            <option value="">choose one</option>
                            @foreach ($services as $service)
                            <option @selected(old('services_id')==$service->id) value="{{$service->id}}">{{$service->name}}</option>
                                
                            @endforeach
                        </select>
                        @error('services_id')
                        <small class="form-text text-muted">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="unit_price" class=" form-control-label">Unit Price</label></div>
                    <div class="col-12 col-md-6">
                        <input type="text" value="{{old('unit_price')}}" id="text-input" name="unit_price" placeholder="Unit Price" class="form-control">

                        @error('unit_price')
                        <small class="form-text text-muted">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    @error('checkboxes')
                    <small class="form-text text-muted">{{$message}}</small>
                    @enderror
                    <div id="salariesTable" class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Service</th>
                                    <th>Status</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--unless (count($salaries)==0)
        
                                foreach ($salaries as $salarie)
                                <tr>
                                    <td><img width="100px" src="{asset('storage/'.$salarie->img)}}" alt=""></td>
                                    <td>{$salarie->nom}}</td>
                                    <td>{$salarie->prenom}}</td>
                                    <td>
                                        {$salarie->service ? $salarie->service->name : 'No Service'}}
                                    </td>
                                    <td>{$salarie->dispo==0?"Disponible":"Not Disponible"}}</td>
                                    <td>
                                        <div class="checkbox">
                                            <label for="checkbox{$salarie->id}}" class="form-check-label ">
                                                <input type="checkbox" id="checkbox{$salarie->id}}" name="checkboxes[]" value="{$salarie->id}}" class="form-check-input">
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                endforeach
                                else
                                <tr>
                                    <td>No companies found</td>
                                </tr>
                                endunless-->
                            </tbody>
                        </table>
                    </div>
                    <script> 
                        /*function onDateChange(event) { 
                            var selectedDate = document.getElementById('finish_date'); 
                            //alert(selectedDate.value);
                        }
                        document.getElementById('finish_date').addEventListener('change', onDateChange);*/
                        $(document).ready(function() {
                             $('#serviceSelect').change(function() {
                                var serviceId = $(this).val(); 
                                let start_dt=document.getElementById('start_date').value;
                                if (serviceId) { 
                                    $.ajax({ url: '/salaries/' + serviceId+'/'+start_dt+'/byService', type: 'GET', success: function(data) { 
                                        var tbody = $('#salariesTable tbody'); 
                                        tbody.empty(); 
                                        $.each(data, function(index, salarie) {
                                            let finish_dt=document.getElementById('finish_date').value;
                                            let dt_fin=new Date(salarie.date_fin);
                                            //let dt_finOnly=new Date(dt_fin.getFullYear(), dt_fin.getMonth(), dt_fin.getDate());
                                            let dt_finOnly=dt_fin.toISOString().split('T')[0];
                                            //alert(dt_finOnly);
                                            if(start_dt>dt_finOnly){
                                                var row = '<tr>' + '<td><img width="100px" src="/storage/' + salarie.img + '" alt=""></td>' + '<td>' + salarie.nom + '</td>' + '<td>' + salarie.prenom + '</td>' + '<td>' + (salarie.name ? salarie.name : 'No Service') + '</td>' + '<td>' + (salarie.dispo == 0 ? "Disponible" : "Disponible in "+start_dt) + '</td>' + '<td><div class="checkbox"><label for="checkbox' + salarie.id + '" class="form-check-label"><input type="checkbox" id="checkbox' + salarie.id + '" name="checkboxes[]" value="' + salarie.id + '" class="form-check-input"></label></div></td>' + '</tr>'; tbody.append(row); 
                                            }
                                        }); 
                                    } 
                                    }); 
                                } else { 
                                    $('#salariesTable tbody').empty(); 
                                } 
                            }); 
                        }); 
                    </script>
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