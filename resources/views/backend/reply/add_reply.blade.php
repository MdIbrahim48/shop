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
                <span>Name : {{$comment->name}}</span>
                <span>Email : {{$comment->email}}</span>
                <span>Comment : {{$comment->description}}</span>
           <table class="table" id="example">
            <thead>
            <tr>
                <th scope="col">Reply</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($reply as $item)
                <tr>
                  <td>{{$item->comment}}</td>
                  <td style="display: inline-flex">
                      <form action="{{route('reply.destroy',['reply' => $item->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are You Delete?')" class=""><i class="fas fa-trash text-danger"></i></button>
                      </form>
                      <a href="{{route('reply.edit',['reply'=>$item->id])}}" style="margin-left:3px" class="btn-sm pt-2 btn-primary"><i class="fas fa-edit"></i></a>
                  </td>
                  </tr>
                  @endforeach
            </tbody>
        </table>
        <div class=""><h4>Reply</h4></div>
        <form action="{{route('reply.store')}}" method="POST" class="needs-validation" novalidate="">
          @csrf
        <div class="row g-3">
          <div class="col-md-6">
            <input type="hidden" name="comment_id" value="{{$comment->id}}">
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
    <!-- Container-fluid Ends-->
  </div>
@endsection