@extends('layout.admin')
@section('container')
@section('title','Status Pelamar')

<div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Pekerjaan</th>
                    <th scope="col">Status Apply</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($apply as $a)
                  <tr>
                    <th scope="row">
                      
                        <div class="media-body">
                          <span class="mb-0 text-sm">{{$a->user->first_name}}</span>
                        </div>
                      </div>
                    </th>
                    <td>
                      {{$a->user->email}}
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i> {{$a->status_apply}}
                      </span>
                    </td>     
        <td>
  @endforeach
@endsection