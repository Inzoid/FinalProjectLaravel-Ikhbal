@extends('layout.admin')
@section('container')
@section('title', 'Dashboard')

<!-- Header -->
<div class="header bg-gradient-primary pb-4 pt-3 pt-md-4">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Akun</h5>
                      <span class="h2 font-weight-bold mb-0">17</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  
                   
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">E-Mail</h5>
                      <span class="h2 font-weight-bold mb-0">2,356</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                        <i class="ni ni-email-83"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Artikel</h5>
                      <span class="h2 font-weight-bold mb-0">924</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                        <i class="ni ni-laptop"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    
                  </p>
                
       
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
<div class="container mt-2">
    
  <div class="main-content">
                  @if(session('notice'))
                        <div class="alert alert-default">
                                <strong>{!!session('notice') !!}</strong>
                        </div>
                  @endif
<!-- Table -->
<div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header"><h3>Job</h3></div>
          <div class="card-body">
            <div class="row">
            @foreach($company as $job)
              <div class="col-sm-4">
                <div class="card">
                  <img class="card-img-top" src="../../assets/img/theme/team-1-800x800.jpg" alt="Card image cap" width="200" height="270">
                  <div class="card-body">
                    <h5 class="card-title">{{$job->nama_perusahaan}}</h5>
                    <p class="card-text">{{str_limit($job->deskripsi, 60)}}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
              </div>
              @endforeach
                  

@endsection