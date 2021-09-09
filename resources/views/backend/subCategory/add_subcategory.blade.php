@extends('layouts')

@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>Add SubCategory</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
              <li class="breadcrumb-item"> Form Controls</li>
              <li class="breadcrumb-item active"> Validation Forms</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
              {{-- <h4><a href="{{route('subCategories.index')}}" class="btn-primary pull-right" style="margin-right:5px">SubCategory List</a></h4>
           --}}
            <div class="card-body">
              <form action="{{route('subCategories.store')}}" method="POST" class="needs-validation" novalidate="">
                  @csrf
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label" for="validationCustom01">SubCategory name</label>
                    <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" id="validationCustom01" type="text" placeholder="Enter SubCategory Name" required="">
                    @error('name')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-8">
                    <label class="form-label" for="description">SubCategory Description</label>
                    <textarea name="description" id="description" cols="70" rows="" class="form-control @error('description') is-invalid @enderror" placeholder="Enter SubCategory Description"></textarea>
                    @error('description')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="category_id">Category Name</label>
                   <select name="category_id" id="" class="form-control @error('category_id') is-invalid @enderror">
                     <option value>Select Category</option>
                     @foreach ($categories as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                     @endforeach
                   </select>
                    @error('category_id')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
@endsection