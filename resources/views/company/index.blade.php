@extends('layout.admin')
@section('container')
@section('title', 'Company')

<div class="container mt-2">
<a href="{{route('create.company')}}" class="btn btn-primary">Tambah Job</a><br><br>

    @if(session('notice'))
          <div class="alert alert-default">
                  <strong>{!!session('notice') !!}</strong>
          </div>
    @endif

            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nama Perusahaan</th>
                    <th scope="col">Judul Pekerjaan</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Gaji</th>
                    <th scope="col">deskripsi</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Action</th>
                    <th scope="col">Image</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($company as $a)
                  <tr>
                    <th scope="row">
                      
                        <div class="media-body">
                          <span class="mb-0 text-sm">{{$a->nama_perusahaan}}</span>
                        </div>
                      </div>
                    </th>
                    <td>
                      {{$a->judul_pekerjaan}}
                    </td>
                    <td>
                      {{$a->alamat}}                   
                    </td>
                    <td>
                      {{$a->gaji}}
                    </td>
                    <td>
                      {{str_limit($a->deskripsi, 30)}}
                    </td>
                    <td>
                      {{$a->waktu_bekerja}}
                    </td>         
                    <td>
      <form action="{{ route('company.destroy', $a->id) }}" method="POST">    
        <a class="btn btn-icon ni ni-settings text-primary" 
          href="{{ route( 'company.edit', $a->id ) }}" data-toggle="tooltip" data-original-title="Edit"></a>

          {{ csrf_field() }} {{ method_field('delete') }}  
          <button class="btn btn-icon btn-2 btn-danger" type="submit" onclick="return confirm('Apa Anda Yakin?')" data-toggle="tooltip" data-original-title="Delete">
            <span class="btn-inner--icon"><i class="ni ni-atom"></i></span>
          </button>
        </form>
        </td>  
                  </tr>
                  
                  @endforeach

@endsection