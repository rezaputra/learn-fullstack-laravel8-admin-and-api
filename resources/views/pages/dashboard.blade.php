@extends('layouts.default')

@section('content')
    <div class="container container-fluid">
        <h1>Income reports</h1>
        <div class="row my-3">
            <div class="col-xl-3 col-md-6">
                <form action="">
                    <div class="input-group">
                        <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                          <option selected value="0">Monthly report</option>
                          <option value="1">Three month report</option>
                          <option value="2">Six month report</option>
                          <option value="3">Annual report</option>
                        </select>
                        <button class="btn btn-outline-secondary" type="submit">Select</button>
                      </div>
                </form>
            </div>
        </div>
        <hr>

        {{-- report --}}
        <div class="row mt-5">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <i class="fas fa-money-check-alt"></i> Total income                        
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <h5 class="mt-2">Rp.10.000.000,00</h5>
                        <a href="#"><div class="small text-white"><i class="fas fa-angle-right"></i></div></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <i class="fas fa-shopping-cart"></i> Total seles                        
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <h5 class="mt-2">100 Products</h5>
                        <a href="#"><div class="small text-white"><i class="fas fa-angle-right"></i></div></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <i class="fas fa-truck"></i> On the way                       
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <h5 class="mt-2">10 Products</h5>
                        <a href="#"><div class="small text-white"><i class="fas fa-angle-right"></i></div></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <i class="fas fa-window-close"></i> Failed                       
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <h5 class="mt-2">2 Products</h5>
                        <a href="#"><div class="small text-white"><i class="fas fa-angle-right"></i></div></a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        
        {{-- chart --}}
        <div class="row mt-4 d-flex align-items-center justify-content-around">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Total seles
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-pie me-1"></i>
                        Success ratio
                    </div>
                    <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@push('before-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('assets/demo/chart-pie-demo.js') }}"></script>
@endpush
