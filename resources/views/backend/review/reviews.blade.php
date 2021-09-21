@extends('layouts')
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                <h3>Review List</h3>
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
                    <th scope="col">Rating</th>
                    <th scope="col">Status</th>
                    {{-- <th scope="col">Action</th> --}}
                </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$review->name}}</td>
                    <td>{{$review->email}}</td>
                    <td>{{$review->comment}}</td>
                    <td>{{$review->rating}}</td>
                    <td>
                        @if ($review->status==0)
                        <a href="{{route('review.status', $review->id)}}" class="btn btn-info">Approved</a>
                        @else
                        <a href="{{route('review.status', $review->id)}}" class="btn btn-warning">Pending</a>
                        @endif
                    </td>
                    {{-- <td style="display: inline-flex">
                        <form action="{{route('categories.destroy',['review'=>$review->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger " onclick="return confirm('Are You Delete?')">
                            <i class="fas fa-trash text-danger"></i></button>
                        </form>
                        <a href="{{route('categories.edit',['review'=>$review->id])}}" style="margin-left:3px" class="btn-sm pt-2 btn-primary"><i class="fas fa-edit"></i></a>
                    </td> --}}
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