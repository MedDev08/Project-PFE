<x-layout>
    
  <div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <h3 class="breadcrumb justify-content-center align-items-center mb-5">
    </h3>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-center">
                <h4 class="card-title">SFG Sarl</h4>
            </div>
        </div>
        <div class="card-body">
          <div class="row justify-content-center align-items-center mb-5">
            <div class="col-6 col-sm-4 col-lg-2">
              <div class="card">
                <a href="/salaries" class="btn btn-primary btn-lg">
                  <div class="card-body p-3 text-center">
                    <div class="h1 m-0">
                      <i class="fa fa-users"></i>
                    </div>
                  </div>
                  <div class="breadcrumb-item mb-3">Employees</div>
                </a>
              </div>
            </div><div class="col-6 col-sm-4 col-lg-2">
              <div class="card">
                <a href="/companies" class="btn btn-primary btn-lg">
                  <div class="card-body p-3 text-center">
                    <div class="h1 m-0">
                      <i class="fa fa-building"></i>
                    </div>
                  </div>
                  <div class="breadcrumb-item mb-3">Companies</div>
                </a>
              </div>
            </div><div class="col-6 col-sm-4 col-lg-2">
              <div class="card">
                <a href="/services" class="btn btn-primary btn-lg">
                  <div class="card-body p-3 text-center">
                    <div class="h1 m-0">
                      <i class="fa fa-gears"></i>
                    </div>
                  </div>
                  <div class="breadcrumb-item mb-3">Services</div>
                </a>
              </div>
            </div><div class="col-6 col-sm-4 col-lg-2">
              <div class="card">
                <a href="/orders" class="btn btn-primary btn-lg">
                  <div class="card-body p-3 text-center">
                    <div class="h1 m-0">
                      <i class="fa fa-list-alt"></i>
                    </div>
                  </div>
                  <div class="breadcrumb-item mb-3">Orders</div>
                </a>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</x-layout>