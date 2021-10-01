@extends('layouts')
@section('content')
<div class="page-body">
<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Districts List</h3>
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
        <h5>Districts List</h5><h4 class="btn pull-right"><a href="{{route('districts.create')}}">Add Districts</a></h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table" id="example">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Districts Name</th>
                <th scope="col">Division Name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($districts as $district)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$district->district_name}}</td>
                  <td>{{$district->division->division_name??''}}</td>
                  <td style="display: inline-flex">
                      <form action="{{route('districts.destroy',['district'=>$district->id])}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" onclick="return confirm('Are You Delete?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                      </form>
                      <a href="{{route('districts.edit',['district'=>$district->id])}}" style="margin-left:3px" class="btn-sm pt-2 btn-primary"><i class="fas fa-edit"></i></a>
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