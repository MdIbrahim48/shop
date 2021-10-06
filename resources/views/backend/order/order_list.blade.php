@extends('layouts')
@section('content')
<div class="page-body">
<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Customer Orders</h3>
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
     <div class="card-body">
      <div class="table-responsive">
        <table class="table" id="example">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Order Id</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Address</th>
              <th scope="col">Divisions</th>
              <th scope="col">District</th>
              <th scope="col">Amount</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($orders as $order)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$order->orderId}}</td>
                <td>{{$order->first_name}}</td>
                <td>{{$order->last_name}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->divisions}}</td>
                <td>{{$order->district}}</td>
                <td>{{$order->amount}}</td>
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