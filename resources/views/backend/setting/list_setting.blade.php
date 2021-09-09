@extends('layouts')
@section('content')
<div class="page-body">
<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Setting List</h3>
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
      <div class="card-header">
        <h5>Setting List</h5><h4 class="btn pull-right"><a href="{{route('settings.create')}}">Add Setting</a></h4>
      </div>
     <div class="card-body">
      <div class="table-responsive">
        <table class="table" id="example">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Description</th>
              <th scope="col">Address</th>
              <th scope="col">Phone</th>
              <th scope="col">Fax</th>
              <th scope="col">Icon</th>
              <th scope="col">Email</th>
              <th scope="col">Mobile</th>
              <th scope="col">Skype</th>
              <th scope="col">Copyright</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($settings as $setting)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$setting->description}}</td>
                <td>{{$setting->address}}</td>
                <td>{{$setting->phone}}</td>
                <td>{{$setting->fax}}</td>
                <td>{{$setting->email}}</td>
                <td><img width="100" src='{{asset("images/setting/icon/".$setting->img)}}' alt="{{$setting->img}}"></td>
                <td>{{$setting->mobile}}</td>
                <td>{{$setting->skype}}</td>
                <td>{{$setting->copyright}}</td>
                <td style="display: inline-flex">
                    <form action="{{route('settings.destroy',['setting'=>$setting->id])}}"  method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are You Delete?')" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i></button>
                    </form>
                    <a href="{{route('settings.edit',['setting'=>$setting->id])}}" style="margin-left:3px" class="btn-sm btn-primary pt-2"><i class="fas fa-edit"></i></a>
                </td>
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