@extends('layouts')

@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>Add Social Icon</h3>
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
              <form action="{{route('socialIcon.store')}}" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
                  @csrf
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label" for="validationCustom01">Social Icon Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" id="validationCustom01" type="text" placeholder="Enter Social Icon Name" required="">
                    @error('name')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="url"> Icon Url</label>
                    <input class="form-control @error('url') is-invalid @enderror" name="url" value="{{old('url')}}" id="url" type="url" placeholder="Enter Social Icon Url" required="">
                    @error('url')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-12">
                    <div class="card">
                      {{-- <div class="card-body"> --}}
                        <div class="row icon-lists">
                          <div class="col-sm-6 col-md-4 col-xl-3"><input name="icon" value="fab fa-facebook-square icon-facebook" id="facebook" type="radio"><label for="facebook"><i class="fab fa-facebook-square"></i> fa-facebook</label></div>
                          <div class="col-sm-6 col-md-4 col-xl-3"> <input name="icon" value="fab fa-github icon-github" id="github" type="radio"><label for="github"><i class="fab fa-github"></i> fa-github</label></div>
                          <div class="col-sm-6 col-md-4 col-xl-3"><input name="icon" value="fab fa-google-plus-g icon-gplus" id="google" type="radio"><label for="google"><i class="fab fa-google-plus-g"></i> fa-google</label></div>
                          <div class="col-sm-6 col-md-4 col-xl-3"><input name="icon" value="fab fa-twitter icon-twitter" id="twitter" type="radio"><label for="twitter"><i class="fab fa-twitter"></i>fa-twitter-square</label></div>
                          <div class="col-sm-6 col-md-4 col-xl-3"><input name="icon" value="fab fa-linkedin icon-linkedin" id="linkedin" type="radio"><label for="linkedin"><i class="fab fa-linkedin"></i> fa-linkedin</label></div>
                          <div class="col-sm-6 col-md-4 col-xl-3"><input name="icon" value="fab fa-yahoo icon-yahoo" id="yahoo" type="radio"><label for="yahoo"><i class="fab fa-yahoo"></i>fa-yahoo</label></div>
                          <div class="col-sm-6 col-md-4 col-xl-3"><input name="icon" value="fab fa-instagram icon-instagram" id="instagram" type="radio"><label for="instagram"><i class="fab fa-instagram"></i> fa-instagram</label></div>
                          <div class="col-sm-6 col-md-4 col-xl-3"><input name="icon" value="fab fa-youtube icon-youtube" id="youtube" type="radio"><label for="youtube"><i class="fab fa-youtube"></i>fa-youtube</label></div>
                        </div>
                      {{-- </div> --}}
                      @error('icon')
                      <div class="alert text-danger">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
@endsection
