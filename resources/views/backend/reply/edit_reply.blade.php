@extends('layouts')

@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>Edit Reviews Reply</h3>
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
              {{-- <h4><a href="{{route('categories.index')}}" class="btn-primary pull-right" style="margin-right:5px">Category List</a></h4>
           --}}
            <div class="card-body">
              <form action="{{route('replies.update',['reply'=>$reply->id])}}" method="POST" class="needs-validation" novalidate="">
                  @csrf
                  @method('PUT')
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label" for="validationCustom01">Reviews Reply</label>
                    <textarea name="comment" class="form-control @error('comment') is-invalid @enderror" id="validationCustom01" cols="" rows="" required>{{$reply->comment}}</textarea>
                    @error('comment')
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