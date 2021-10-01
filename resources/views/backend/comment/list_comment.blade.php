@extends('layouts')
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                <h3>Comment List</h3>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Bootstrap Tables</li>
                    <li class="breadcrumb-item active">Bootstrap Basic Tables</li>
                </ol>
                </div>
            </div>
        </div>
    </div>
@include('_partials.toast')
    <div class="col-sm-12">
        <div class="card">
        <div class="card-header">
            <div class="table-responsive">
            <table class="table" id="example">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$comment->name}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->description}}</td>
                    <td>
                        @if ($comment->status == 0)
                        <a href="{{route('comment.status', $comment->id)}}" class="btn btn-info">Approved</a>
                        @else
                        <a href="{{route('comment.status', $comment->id)}}" class="btn btn-warning">Pending</a> 
                        @endif
                    </td>
                    <td>
                        <a href="{{route('replies',$comment->id)}}" style="margin-left:3px" class="btn-sm pt-2 btn-primary"><i class="fas fa-reply"></i></a>
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
@endsection