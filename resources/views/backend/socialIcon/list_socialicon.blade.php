@extends('layouts')
@section('content')
<div class="page-body">
<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Social Icon List</h3>
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
        <h5>Social Icon List</h5><h4 class="btn pull-right"><a href="{{route('socialIcon.create')}}">Add Social Icon</a></h4>
      </div>
     <div class="card-body">
      <div class="table-responsive">
        <table class="table" id="example">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Social Icon Name</th>
              <th scope="col">Social Icon Url</th>
              <th scope="col">Social Icon</th>
              <th scope="col">Slug</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($socialIcons as $socialIcon)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$socialIcon->name}}</td>
                <td>{{$socialIcon->url}}</td>
                <td>{{$socialIcon->icon}}</td>
                <td>
                  @if ($socialIcon->status==0)
                  <a href="{{route('socialicon.status', $socialIcon->id)}}" class="btn btn-info">Active</a>
                  @else
                  <a href="{{route('socialicon.status', $socialIcon->id)}}" class="btn btn-warning">InActive</a>
                  @endif
                </td>
                <td style="display: inline-flex">
                    <form action="{{route('socialIcon.destroy',['socialIcon'=>$socialIcon->id])}}"  method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are You Delete?')" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i></button>
                    </form>
                    <a href="{{route('socialIcon.edit',['socialIcon'=>$socialIcon->id])}}" style="margin-left:3px" class="btn-sm btn-primary pt-2"><i class="fas fa-edit"></i></a>
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