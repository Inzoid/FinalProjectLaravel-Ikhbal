@extends('layout.user')
@section('content')
@section('title', 'Status Pelamar')
<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Welcome To Job Builder<br>
								@if (Sentinel::check())
								{!! Sentinel::getUser()->first_name !!} 
								{!! Sentinel::getUser()->last_name !!}	
								@endif
							</h1>	
						</div>											
					</div>
				</div>
			</section>
<div class="container mt-4">
@if (Sentinel::check())
<div class="card">
  <div class="card-header bg-dark">
    <font color="white">Profile</font>
  </div>
  <div class="card-body">
  
    <h5 class="card-title">{!! Sentinel::getUser()->first_name !!} {!! Sentinel::getUser()->last_name !!} </h5>
    <p class="card-text">{!! Sentinel::getUser()->email !!} </p>
    <a href="{{route('biodata')}}" class="btn btn-info">Edit Biodata</a>
  </div>
</div><br>
  @endif
            

    @foreach ($apply as $job)
    <div class="card">
        <div class="card-header">
            {{$job->company['nama_perusahaan']}}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$job->company['judul_pekerjaan']}}</h5>
            <p class="card-text">Nama Pelamar :
            <h6>{{$job->user['first_name']}} {{$job->user['last_name']}}</h4></p>
            <?php
                        if ($job->status_apply=='Menunggu') {
                          $class = 'warning';
                        } elseif ($job->status_apply=='Diterima') {
                          $class = 'success';
                        } else {
                          $class = 'danger';
                        }
                      ?>
            <a href="#" class="btn btn-{{$class}}">{{$job->status_apply}}</a>
        </div>
    </div><br>
    @endforeach


@endsection
