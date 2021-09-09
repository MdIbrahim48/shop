@extends('layouts')

@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>Edit Category</h3>
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
            <div class="card-body">
              <form action="{{route('categories.update',$category->id)}}" method="POST" class="needs-validation" novalidate="">
                  @csrf
                  @method('PUT')
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label" for="validationCustom01">Category name</label>
                    <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{$category->name ?? old('name')}}" id="validationCustom01" type="text" placeholder="Enter Category Name" required="">
                    @error('name')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="validationCustom02">Slug</label>
                    <input class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{$category->slug ?? old('slug')}}" id="validationCustom02" type="text" required="">
                    @error('slug')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-8">
                    <label class="form-label" for="description">Category Description</label>
                    <textarea name="description" id="description" cols="70" rows="" class="form-conytrol @error('description') is-invalid @enderror" placeholder="Enter Category Description">{{$category->description ?? old('description')}}</textarea>
                    @error('description')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-8">
                    <label class="form-label" for="status">Status</label>
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                      <option selected disabled>Select</option>
                      <option value="1" {{$category->status == 'Active'?'selected':''}}>Active</option>
                      <option value="0" {{$category->status == 'InActive'?'selected':''}}>InActive</option>
                    </select>
                    @error('status')
                        <div class="alert text">{{$message}}</div>
                    @enderror
                  </div>
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
@endsection