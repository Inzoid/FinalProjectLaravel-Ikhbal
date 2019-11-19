@extends('layout.admin')
@section('container')
@section('title', 'Create Job')

<div class="container mt-3">
<div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                <form action="{{ route('company.store') }}" method="POST">
                    {{ csrf_field() }}
                  <h3 class="mb-0">Lengkapi Profil Perusahaan</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="{{route('company') }}" class="btn btn-sm btn-primary">Back</a>
                </div>
              </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Company Profile</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan" class="form-control form-control-alternative" placeholder="Geeksfarm">
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Judul Pekerjaan</label>
                        <input type="text" name="judul_pekerjaan" class="form-control form-control-alternative" placeholder="Web Developer">
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Waktu Bekerja</label>
                        <input type="text" name="waktu_bekerja" class="form-control form-control-alternative" placeholder="Senin - Jum'at">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Gaji</label>
                        <input type="text" name="gaji" class="form-control form-control-alternative" placeholder="400000">
                      </div>
                    </div>
                  </div>
                </div>
                
                <hr class="my-2" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Alamat</label>
                        <input name="alamat" class="form-control form-control-alternative" placeholder="Jl Surya Sumantri" type="text">
                      </div>
                    </div>
                  </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <textarea name="deskripsi" id="" class="form-control" placeholder="Deskrpisi pekerjaan." cols="30" rows="10"></textarea>
                </div>
              </div>
                  
                      
                  
                
                <input type="submit" value="Create Job" class="btn btn-primary btn-md text-white">
              
            </div>
          </div>
        </div>
      </div>

@endsection