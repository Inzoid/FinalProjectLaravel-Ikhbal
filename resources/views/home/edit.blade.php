@extends ('layout.admin')
@section ('container')
@section('title', 'Edit User')

<div class="container mt-3">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Silahkan Isi data</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="{{route('user')}}" class="btn btn-sm btn-primary">Back</a>
                </div>
              </div>
            </div>
            <div class="card-body">
        
            <form action="{{ route('admin.update', $user->id) }}" method="post" 
              enctype="multipart/form-data">
                {{ csrf_field() }}    {{ method_field('put') }}
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" name="first_name" class="form-control form-control-alternative" value="{{ $user->first_name }}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" name="last_name" class="form-control form-control-alternative" value="{{ $user->last_name }}">
                      </div>
                    </div>
                  </div>
                </div>
               
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Email</label>
                        <input name="email" class="form-control form-control-alternative" placeholder="Email" type="email" value="{{ $user->email }}">
                      </div>
                    </div>
                  </div> 
                    
                  </div>
                </div>
               </div>
                 <input type="submit" value="Edit User" class="btn btn-primary btn-md text-white">
      
        

            </div>
          </div>
        </div>
      </div>


@endsection