@extends('layouts')

@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>Add Brand</h3>
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
              {{-- <h4><a href="{{route('brands.index')}}" class="btn-primary pull-right" style="margin-right:5px">Brand List</a></h4>
           --}}
            <div class="card-body">
              <form action="{{route('brands.store')}}" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
                  @csrf
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label" for="validationCustom01">Brand name</label>
                    <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" id="validationCustom01" type="text" placeholder="Enter Brand Name" required="">
                    @error('name')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="img">Brand Image</label>
                    <input class="form-control @error('img') is-invalid @enderror" name="img" value="{{old('img')}}" id="img" type="file" placeholder="Enter Brand Image" required="">
                    @error('img')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-8">
                    <label class="form-label" for="description">Brand Description</label>
                    <textarea name="description" id="description" cols="70" rows="" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Brand Description">{{old('description')}}</textarea>
                    @error('description')
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