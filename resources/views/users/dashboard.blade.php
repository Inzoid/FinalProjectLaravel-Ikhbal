@extends('layout.user')
@section('content')
@section('title', 'Home')

<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Welcome To Job Builder	<br>
								@if (Sentinel::check())
								{!! Sentinel::getUser()->first_name !!} 
								{!! Sentinel::getUser()->last_name !!}	
								@endif
							</h1>	
						</div>											
					</div>
				</div>
			</section>

		

            <section class="post-area section-gap">
				<div class="container">
				@if(session('notice'))
                        <div class="alert alert-default">
                                <strong>{!!session('notice') !!}</strong>
                        </div>
            	@endif
					<div class="row justify-content-center d-flex">
                    @foreach ($dashboard as $job)
						<div class="col-lg-12 post-list">
							<div class="single-post d-flex flex-row">
								<div class="thumb">
									<img src="{{ $job->image() }}" width="120">
									<ul class="tags">
										<li>
											<a href="#">Art</a>
										</li>
										<li>
											<a href="#">Media</a>
										</li>
										
											&nbsp	&nbsp&nbsp	
										
									</ul>
								</div>
								<div class="details">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<a href="single.html"><h4>{{$job->judul_pekerjaan}}</h4></a>
											<h6>{{$job->nama_perusahaan}}</h6>					
										</div>
										<ul class="btns">
	<form action="{{ route('apply.buat',$job->id)  }}" 
		method="POST"> {{ csrf_field() }}
											<li><input type="submit" class="btn btn-primary" value="Apply"></li>
										</form>
										</ul>
									</div>
									<p>
                                        {{$job->deskripsi}}
									</p>
									<h5>Waktu Kerja : {{$job->waktu_bekerja}}</h5>
									<p class="address"><span class="lnr lnr-map"></span> 
                                    &nbsp {{$job->alamat}}
                                    </p>
									<p class="address"><span class="lnr lnr-database"></span>
                                    &nbsp Rp. {{$job->gaji}}</p>
								</div>
							</div>
						</div>
                    @endforeach
									

						</div>
					</div>
				</div>	
			</section>
			<!-- End post Area -->

@endsection