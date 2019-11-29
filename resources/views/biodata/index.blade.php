@extends('layout.admin')
@section('container')
@section('title', 'Biodata')

 <!-- Header -->
 <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 60px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello {{ Sentinel::getUser()->first_name }}</h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="../assets/img/theme/team-4-800x800.jpg" 
                    class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                {{ Sentinel::getUser()->first_name }}
                </h3>
                <div class="h5 font-weight-300">
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>
                  Web Developer
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>{{ Sentinel::getUser()->email }}
                </div>
                <hr class="my-4" />
                <a href="#">Show more</a>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="{{route('biodata.show')}}" class="btn btn-sm btn-primary">Lihat</a>
                </div>
              </div>
            </div>
      
      <form action="{{ route('biodata.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
      <div class="card-body">
        
        

        @if(session('notice'))
                        <div class="alert alert-default">
                                <strong>{!!session('notice') !!}</strong>
                        </div>
            	@endif

                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="form-group">
                      <input type="hidden" name="user_id" value="{{ Sentinel::getUser()->id }}">
                        <label class="form-control-label" for="input-username">Nama Lengkap</label>
                        <input type="hidden" name="user_id" value="{{ Sentinel::getUser()->id }}">
                        <input type="text" name="nama" class="form-control form-control-alternative" placeholder="Username" value="{{ Sentinel::getUser()->first_name }}  {{ Sentinel::getUser()->last_name }}">
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control form-control-alternative" placeholder="Bandung" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control form-control-alternative" >
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Foto</label>
                        <input type="file" name="profile_image" class="form-control form-control-alternative" placeholder="Last name">
                      </div>
                    </div>

                    
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Alamat</label>
                        <input name="alamat" class="form-control form-control-alternative" placeholder="Home Address" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Kota</label>
                        <input type="text" name="kota" class="form-control form-control-alternative" placeholder="Bandung">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Negara</label>
                        <input type="text" name="negara" class="form-control form-control-alternative" placeholder="Negara" value="Indonesia">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Kode Pos</label>
                        <input type="number" name="kode_pos" class="form-control form-control-alternative" placeholder="Kode Pos">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">CV</label>
                        <input type="file" name="cv" class="form-control form-control-alternative" 
                        placeholder="Last name">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Pendidikan</label>
                        <input name="pendidikan" class="form-control form-control-alternative" placeholder="SMA/SMK/D3/S1" type="text">
                      </div>
                    </div>
                  </div>  
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Keahlian</h6>
                <div class="pl-lg-4">
                
                  <div class="form-group">
                    <label>About Me</label>
                    <textarea name="keterangan" rows="4" class="form-control form-control-alternative" placeholder="A few words about you ..."></textarea>
                  </div>

                  <div class="text-left">
                    <input type="submit" value="Edit Biodata" class="btn btn-primary btn-md text-white">
                </div>
                  
                </div>
              
            </div>
          </div>
        </div>
      </div>

@endsection