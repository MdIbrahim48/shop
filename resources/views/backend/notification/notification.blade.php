@extends('layouts')
@section('content')
<div class="page-body">
<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Category List</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Bootstrap Tables</li>
            <li class="breadcrumb-item active">Bootstrap Basic Tables</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  @include('_partials.toast')
<div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table" id="example">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Notification Message</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($collection as $item)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->message}}</td>
                  </tr>  
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection