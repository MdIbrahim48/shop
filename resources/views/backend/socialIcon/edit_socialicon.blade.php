@extends('layouts')

@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>Edit Social Icon</h3>
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
              {{-- <h4><a href="{{route('socialIcon.index')}}" class="btn-primary pull-right" style="margin-right:5px">Social Icon List</a></h4>
           --}}
            <div class="card-body">
              <form action="{{route('socialIcon.update',['socialIcon'=>$socialicicon->id])}}" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label" for="validationCustom01">Social Icon Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{$socialicicon->name ?? old('name')}}" id="validationCustom01" type="text" placeholder="Enter Social Icon Name" required="">
                    @error('name')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="icon">Social Icon</label>
                    <input class="form-control @error('icon') is-invalid @enderror" name="icon" value="{{$socialicicon->icon ?? old('icon')}}" id="icon" type="text" placeholder="Enter Social Icon" required="">
                    @error('icon')
                        <div class="alert text-danger">{{$message}}</div>
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
