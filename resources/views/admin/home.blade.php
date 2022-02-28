@extends('partials.master')


@section('content')
<div class="container-fluid px-4">
    <div class="row mt-5">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body"><h5>Dokter dan Terapis</h5></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                     <h3>{{ ($dokter) }} orang</h4>  
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body"><h4>User</h4></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                <h4>{{ ($user) }} orang</h4> 
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body"><h4>Reservasi</h4></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                <h4>{{ ($reservasi) }} </h4> 
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body"><h4>Jenis Spesialis</h4></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                <h4>{{ ($spesialis) }} Macam</h4> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection