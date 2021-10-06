@extends('frontend.layouts.master')
@section('page_title')
    <section id="page-title">
        <div class="container clearfix">
            <h1 id="shop">Shop</h1>
            <span>Start Buying your Favourite Theme</span>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </div>
    </section>
@endsection
@section('content')
<div class="checkout-area ptb-100" style="margin-top: 30px">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-form form-style">
                    <h3>Billing Details</h3>
                    <form action="{{route('order')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <p>First Name *</p>
                                <input type="text" name="first_name">
                                <input type="hidden" name="orderId">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Last Name *</p>
                                <input type="text" name="last_name">
                            </div>                                                                                                                                                                                                                                 
                            <div class="col-sm-6 col-12">
                                <p>Email Address *</p>
                                <input type="email" name="email">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Phone No. *</p>
                                <input type="text" name="phone">
                            </div>
                            <div class="col-12">
                                <p>Your Address *</p>
                                <input type="text" name="address">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Divisions *</p>
                                <input type="text" name="divisions">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>District *</p>
                                <input type="text" name="district">
                            </div>
                        </div>
                    {{-- </form> --}}
                    {{-- <table class="table" id="example">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Category Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <td>{{Illuminate\Support\Facades\Auth::user()->name}}</td>
                            </tr>
                        </tbody>
                      </table> --}}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="order-area">
                    {{-- <form action="{{route('order')}}" method="post">
                        @csrf --}}
                        <h3>Your Order</h3>
                        <ul class="total-cost">
                            @foreach (Cart::instance('addtoCart')->content() as $item)
                                <li>{{$item->name}} <span class="pull-right">${{$item->price*$item->qty}}</span></li>
                            @endforeach
                        </ul>
                        <ul class="payment-method">
                            <li>
                                <input id="delivery" name="delivery" type="radio">
                                <label for="delivery">Cash on Delivery</label>
                            </li>
                        </ul>
                        <button type="submit">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
