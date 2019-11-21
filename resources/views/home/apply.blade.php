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
                          $class = 'default';
                        } else {
                          $class = 'danger';
                        }
                      ?>
                  <div class="col-5 alert alert-{{$class}}">
                    <strong>{{$a->status_apply}}</strong>
                  </div>    
                      
                      </span>
                    </td>     
                    <td>
                            <form class="forms-sample" name="contactForm" method="post" action="{{ route('apply.update', $a->id)}}">
                                {{ csrf_field() }} {{method_field('put')}}
                                <input type="hidden" name="status_apply" value="Diterima">
                                <button type="submit" class="btn btn-primary" 
                                onclick="return confirm('Terima Pelamar?')">
                                    <i class="menu-icon mdi mdi-check-all" title="Terima"></i>
                                </button>
                            </form>
                            <form class="forms-sample" name="contactForm" method="post" action="{{ route('apply.update', $a->id)}}">
                                {{ csrf_field() }} {{method_field('put')}}
                                <input type="hidden" name="status" value="ditolak">
                                <button type="button" class="btn btn-icons btn-rounded btn-outline-danger" onclick="return confirm('Tolak Pelamar?')">
                                    <i class="menu-icon mdi mdi-close" title="Tolak"></i>
                                </button>
                            </form>
                        </td>
        <td>
  @endforeach
@endsection