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
      <div class="card-header">
        <h5>Category List</h5><h4 class="btn pull-right"><a href="{{route('categories.create')}}">Add Category</a></h4>
      </div>
      <div class="card-header">
        <div class="table-responsive">
          <table class="table" id="example">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Category Description</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$category->name}}</td>
                  <td>{{$category->slug}}</td>
                  <td>{{$category->description}}</td>
                  <td>
                    @if ($category->status==0)
                    <a href="{{route('category.status', $category->id)}}" class="btn btn-info">Active</a>
                    @else
                    <a href="{{route('category.status', $category->id)}}" class="btn btn-warning">InActive</a>
                    @endif
                  </td>
                  <td style="display: inline-flex">
                      <form action="{{route('categories.destroy',['category'=>$category->id])}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-outline-danger " onclick="return confirm('Are You Delete?')">
                          <i class="fas fa-trash text-danger"></i></button>
                      </form>
                      <a href="{{route('categories.edit',['category'=>$category->id])}}" style="margin-left:3px" class="btn-sm pt-2 btn-primary"><i class="fas fa-edit"></i></a>
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