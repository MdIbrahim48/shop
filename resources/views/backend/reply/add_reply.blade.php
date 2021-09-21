@extends('layouts')

@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>Comment Reply</h3>
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
           <table class="table" id="example">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Comment</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                <td>{{$comment->name}}</td>
                <td>{{$comment->email}}</td>
                <td>{{$comment->description}}</td>
                </tr>
            </tbody>
        </table>
            <div class="card-body">
              <form action="{{route('reply.store')}}" method="POST" class="needs-validation" novalidate="">
                  @csrf
                <div class="row g-3">
                  <div class="col-md-6">
                    <select name="comment_id" id="" style="display: none">
                      <option value="{{$comment->id}}"></option>
                    </select>
                    <label class="form-label" for="validationCustom01">Comments Reply</label>
                    <textarea name="comment" class="form-control @error('comment') is-invalid @enderror" id="validationCustom01" cols="" rows="" required></textarea>
                    @error('comment')
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