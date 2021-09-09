@extends('layouts')
@section('content')
<div class="page-body">
<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Brand List</h3>
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
        <h5>Brand List</h5><h4 class="btn pull-right"><a href="{{route('brands.create')}}">Add Brand</a></h4>
      </div>
     <div class="card-body">
      <div class="table-responsive">
        <table class="table" id="example">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Brand Name</th>
              <th scope="col">Slug</th>
              <th scope="col">Brand Description</th>
              <th scope="col">Status</th>
              <th scope="col">Image</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($brands as $brand)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$brand->name}}</td>
                <td>{{$brand->slug}}</td>
                <td>{{$brand->description}}</td>
                <td>
                  @if ($brand->status==0)
                  <a href="{{route('brand.status', $brand->id)}}" class="btn btn-info">Active</a>
                  @else
                  <a href="{{route('brand.status', $brand->id)}}" class="btn btn-warning">InActive</a>
                  @endif
                </td>
                <td><img width="100" src='{{asset("images/brand/".$brand->img)}}' alt="{{$brand->img}}"></td>
                <td style="display: inline-flex">
                    <form action="{{route('brands.destroy',['brand'=>$brand->id])}}"  method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are You Delete?')" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i></button>
                    </form>
                    <a href="{{route('brands.edit',['brand'=>$brand->id])}}" style="margin-left:3px" class="btn-sm btn-primary pt-2"><i class="fas fa-edit"></i></a>
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