@extends('layout.admin')
@section('container')
@section('title', 'Edit Company')

<div class="container mt-3">
<div class="col-xl-8 order-xl-1">
<form action="{{ route('company.store') }}" method="POST" 
        enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
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
                        <input type="text" name="nama_perusahaan" class="form-control form-control-alternative" placeholder="Geeksfarm" value="{{$company->nama_perusahaan}}">
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Judul Pekerjaan</label>
                        <input type="text" name="judul_pekerjaan" class="form-control form-control-alternative" placeholder="Web Developer"
                        value="{{$company->judul_pekerjaan}}">
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Waktu Bekerja</label>
                        <input type="text" name="waktu_bekerja" class="form-control form-control-alternative"  value="{{$company->waktu_bekerja}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Gaji</label>
                        <input type="text" name="gaji" class="form-control form-control-alternative" value="{{$company->gaji}}">
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Image</label>
                        <input type="file" name="image" class="form-control form-control-alternative" placeholder="400000" value="{{$company->image}}">
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
                        <input name="alamat" class="form-control form-control-alternative" placeholder="Jl Surya Sumantri" type="text" value="{{$company->alamat}}">
                      </div>
                    </div>
                  </div>

                  <h6 class="heading-small text-muted mb-4">Deskripsi Pekerjaan</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <textarea name="deskrpisi" rows="4" class="form-control form-control-alternative">{{$company->deskripsi}}</textarea>
                  </div>
                </div>
             </form>   
                <input type="submit" value="Create Job" class="btn btn-primary btn-md text-white">
              
            </div>
          </div>
        </div>
      </div>

@endsection