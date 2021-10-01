@extends('layouts')

@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>Add Divisions</h3>
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
            @include('_partials.toast')
            <div class="card-body">
                <div class="row g-3">
                 <div class="col-md-8">
                <form action="{{route('divisions.update',['division' => $division->id])}}" method="POST" class="needs-validation" novalidate="">
                  @csrf
                  @method('PUT')
                  <h5 style="margin-top: 60px">Edit Division Name</h5>
                    <label class="form-label" for="validationCustom01">Division name</label>
                    <input class="form-control @error('division_name') is-invalid @enderror" name="division_name" value="{{$division->division_name ?? old('division_name')}}" id="validationCustom01" type="text" placeholder="Enter Division Name" required="">
                    @error('division_name')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                    <br>
                    <button class="btn btn-primary" type="submit">Update</button>
                </form>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
@endsection

