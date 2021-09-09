@extends('layouts')
@section('content')
<div class="page-body">
<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Product List</h3>
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
        <h5>Product List</h5><h4 class="btn pull-right"><a href="{{route('products.create')}}">Add Product</a></h4>
      </div>
      <div class="card-header">
        <div class="table-responsive">
          <table class="table" id="example">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Product Description</th>
                <th scope="col">Product Size</th>
                <th scope="col">Thumbnail</th>
                <th scope="col">Abalivality </th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$product->name}}</td>
                  <td>{{$product->slug}}</td>
                  <td>{{$product->description}}</td>
                  <td>{{$product->size}}</td>
                  <td><img width="100px" src="{{asset('images/products/thumbnail/'.$product->thumbnail)}}" alt=""></td>
                  <td>{{$product->abalivality}}</td>
                  {{-- <td>
                    @if ($product->status==0)
                    <a href="{{route('product.status', $product->id)}}" class="btn btn-info">Active</a>
                    @else
                    <a href="{{route('product.status', $product->id)}}" class="btn btn-warning">InActive</a>
                    @endif
                  </td> --}}
                  <td style="display: inline-flex">
                      <form action="{{route('products.destroy',['product'=>$product->id])}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are You Delete?')">
                          <i class="fas fa-trash"></i></button>
                      </form>
                      <a href="{{route('products.edit',['product'=>$product->id])}}" style="margin-left:3px" class="btn-sm pt-2 btn-primary"><i class="fas fa-edit"></i></a>
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