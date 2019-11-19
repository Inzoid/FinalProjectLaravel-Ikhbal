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
                      {{$a->deskripsi}}
                    </td>
                    <td>
                      {{$a->waktu_bekerja}}
                    </td>           
                  </tr>
                  @endforeach

@endsection