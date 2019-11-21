@extends('layout.admin')
@section('container')
@section('title','Status Pelamar')

    
<div class="container mt-2">
  <div class="main-content">
      @if(session('notice'))
            <div class="alert alert-default">
                    <strong>{!!session('notice') !!}</strong>
            </div>
      @endif

      @if(session('error'))
            <div class="alert alert-default">
                    <strong>{!!session('error') !!}</strong>
            </div>
      @endif
<div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Pekerjaan</th>
                    <th scope="col">Status Apply</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($apply as $a)
                  <tr>
                    <th scope="row">
                      
                        <div class="media-body">
                          <span class="mb-0 text-sm">{{$a->user['first_name']}}</span>
                        </div>
                      </div>
                    </th>
                    <td>
                      {{$a->user['email']}}
                    </td>
                    <td>
                      {{$a->company['judul_pekerjaan']}}
                    </td>
                    <td>
                      <?php
                        if ($a->status_apply=='Menunggu') {
                          $class = 'warning';
                        } elseif ($a->status_apply=='Diterima') {
                          $class = 'success';
                        } else {
                          $class = 'danger';
                        }
                      ?>
                  <button type="button" class="btn btn-{{$class}} btn-sm">{{$a->status_apply}}</button> 
                      
                      </span>
                    </td>     
                    <td>
                            <form method="post" action="{{ route('apply.update', $a->id)}}">
                                {{ csrf_field() }} {{method_field('put')}}
                                <input type="hidden" name="status_apply" value="Diterima">
                                  <button type="submit" onclick="return confirm('Terima Pelamar?')" 
                                  class="btn btn-icon btn-3 btn-primary" type="button">
                                    <span class="btn-inner--icon"><i class="ni ni-diamond"></i></span>                    
                                    <span class="btn-inner--text">Accept</span>                                
                                  </button>
                            </form>
                            <div class="mt-1">
                            <form method="post" action="{{ route('apply.update', $a->id)}}">
                                {{ csrf_field() }} {{method_field('put')}}
                                <input type="hidden" name="status_apply" value="Ditolak">
                                  <button type="submit" onclick="return confirm('Tolak Pelamar')" 
                                  class="btn btn-icon btn-3 btn-danger" type="button">
                                    <span class="btn-inner--icon"><i class="ni ni-button-power"></i></span>                    
                                    <span class="btn-inner--text" >Reject</span>                                
                                  </button>
                            </form>
                        </td>
        <td>
  @endforeach
@endsection