@extends('layout.admin')
@section('container')
@section('title', 'Table')

<div class="container mt-2">
<a href="{{route('create')}}" class="btn btn-primary">Tambah Data</a><br><br>

    @if(session('notice'))
          <div class="alert alert-default">
                  <strong>{!!session('notice') !!}</strong>
          </div>
    @endif

            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Last Login</th>
                    <th scope="col">Users</th>
                    <th scope="col">Option</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($user as $a)
                  <tr>
                    <th scope="row">
                      
                        <div class="media-body">
                          <span class="mb-0 text-sm">{{$a->first_name}} {{$a->last_name}}</span>
                        </div>
                      </div>
                    </th>
                    <td>
                      {{$a->email}}
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i> {{$a->last_login}}
                      </span>
                    </td>
                    <td>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="{{$a->first_name}}">
                          <img alt="Image placeholder" src="../assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
                        </a>
                      </div>
                    </td>
                   
                  
                    
        <td>
        <form action="{{ route('admin.destroy', $a->id) }}" method="POST" >    
                   
          <a class="btn btn-icon ni ni-settings text-primary" 
          href="{{ route( 'admin.edit', $a->id ) }}" data-toggle="tooltip" data-original-title="Edit"></a>

          {{ csrf_field() }} {{ method_field('delete') }}  
          <button class="btn btn-icon btn-2 btn-danger" type="submit" onclick="return confirm('Apa Anda Yakin?')" data-toggle="tooltip" data-original-title="Delete">
            <span class="btn-inner--icon"><i class="ni ni-atom"></i></span>
          </button>
        </form>
        </td>
                        
                     
                   
                  </tr>
                  @endforeach
                  
    
@endsection