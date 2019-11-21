@extends('layout.user')
@section('content')
@section('title', 'Profil Biodata')

<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								@yield('title')				
							</h1>	
						</div>											
					</div>
				</div>
			</section>

             <!-- Page content -->
    <div class="container-fluid mt--7">
    
    <div class="col-xl-12 order-xl-5">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Lengkapi Biodata</h3>
            </div>
            <div class="col-4 text-right">
              <a href="#!" class="btn btn-sm btn-primary">Settings</a>
            </div>
          </div>
        </div>
        <div class="card-body">
<form action="{{ route('biodata.store') }}" method="POST">
    
    
    <input type="hidden" name="user_id" value="{{ Sentinel::getUser()->id }}">
            <h6 class="heading-small text-muted mb-4">User information</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-8">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control form-control-alternative" placeholder="Username">
                  </div>
                </div>
                
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-first-name">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control form-control-alternative" placeholder="First name" >
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-last-name">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control form-control-alternative" placeholder="Last name">
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
                    <input type="text" name="kota" class="form-control form-control-alternative" placeholder="Kota" value="New York">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label" for="input-country">Negara</label>
                    <input type="text" name="negara" class="form-control form-control-alternative" placeholder="Negara" value="United States">
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
                    <input type="file" name="CV" class="form-control form-control-alternative" placeholder="Last name">
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
          </form>
        </div>
      </div>
    </div>
  </div><br>

@endsection