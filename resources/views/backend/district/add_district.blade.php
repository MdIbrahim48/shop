@extends('layouts')

@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>Add District</h3>
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
                    <form action="{{route('districts.store')}}" method="POST" class="needs-validation" novalidate="">
                        @csrf
                        <div class="col-md-7">
                            <label class="form-label" for="validationCustom01">District name</label>
                            <input class="form-control @error('district_name') is-invalid @enderror" name="district_name" value="{{old('district_name')}}" id="validationCustom01" type="text" placeholder="Enter District Name" required="">
                            @error('district_name')
                                <div class="alert text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-7"><br>
                            <label class="form-label" for="division_id">Division Name</label>
                           <select name="division_id" id="" class="form-control @error('division_id') is-invalid @enderror">
                             <option value>Select Division</option>
                             @foreach ($divisions as $item)
                              <option value="{{$item->id}}">{{$item->division_name}}</option>
                             @endforeach
                           </select>
                            @error('division_id')
                                <div class="alert text-danger">{{$message}}</div>
                            @enderror
                          </div>
                        <br>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
@endsection

