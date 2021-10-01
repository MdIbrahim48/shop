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
                 <div class="col-md-5">
                <form action="{{route('divisions.store')}}" method="POST" class="needs-validation" novalidate="">
                  @csrf
                  <h5 style="margin-top: 60px">Add Division Name</h5>
                    <label class="form-label" for="validationCustom01">Division name</label>
                    <input class="form-control @error('division_name') is-invalid @enderror" name="division_name" value="{{old('division_name')}}" id="validationCustom01" type="text" placeholder="Enter Division Name" required="">
                    @error('division_name')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                    <br>
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
                </div>
                <div class="col-md-7">
                    <div class="card-header">
                      <div class="table-responsive">
                        <table class="table" id="example">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Division Name</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($divisions as $division)
                              <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$division->division_name}}</td>
                                <td style="display: inline-flex">
                                    <form action="{{route('divisions.destroy',['division'=>$division->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger " onclick="return confirm('Are You Delete?')">
                                        <i class="fas fa-trash text-danger"></i></button>
                                    </form>
                                    <a href="{{route('divisions.edit',['division'=>$division->id])}}" style="margin-left:3px" class="btn-sm pt-2 btn-primary"><i class="fas fa-edit"></i></a>
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
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
@endsection

