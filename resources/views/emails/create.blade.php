@extends('layout.login')
@section('container')

<!-- Page content -->
<div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary shadow border-0">
            <div class="card-header bg-transparent pb-5">
              <div class="btn-wrapper text-center">
                <a href="#" class="btn btn-neutral btn-icon">
                    <h3>Masukan Email</h3>
                </a>            
              </div><br><br>

              @if(session('error'))
                      <div class="alert alert-danger">
                              <strong>{!!session('error') !!}</strong>
                      </div>
                @endif

              @if(session('notice'))
                      <div class="alert alert-default">
                              <strong>{!!session('notice') !!}</strong>
                      </div>
                @endif

            <form action="{{ route('email.store') }}" method="POST">
                {{ csrf_field()}}
              <form role="form">
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" name="email" placeholder="Email" type="email">
                  </div>
                </div>
                
                <div class="text-center">
                  <input type="submit" class="btn btn-primary my-4" value="Forget Password">
                </div>
              </form>
            </div>
          </div>

                <div class="row mt-3">
                  <div class="col-6">
                    <a href="{{route('email.create')}}" class="text-light"><small>Forgot password?</small></a>
                  </div>
                  <div class="col-6 text-right">
                    <a href="{{route('signup')}}" class="text-light"><small>Create new account</small></a>
                  </div>
                </div>
          
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection