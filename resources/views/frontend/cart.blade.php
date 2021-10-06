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
    <section id="content">
        <div class="content-wrap">
            <div class="container">

                <table class="table cart mb-5">
                    <thead>
                        <tr>
                            <th class="cart-product-remove">&nbsp;</th>
                            <th class="cart-product-name">Product</th>
                            <th class="cart-product-price">Unit Price</th>
                            <th class="cart-product-quantity">Quantity</th>
                            <th class="cart-product-subtotal">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::instance('addtoCart')->content() as $item)
                            <tr class="cart_item cartpage">
                                <td class="cart-product-remove">
                                    <a href="#" class="remove" title="Remove this item"><i class="icon-trash2"></i></a>
                                </td>
                            
                                <td class="cart-product-name">
                                    <a href="#">{{$item->name}}</a>
                                </td>
                                <input type="hidden" id="productId" name="productId" value="{{$item->product_id}}">
                                <td class="cart-product-price">
                                    <span class="amount">{{$item->price}}</span>
                                    <input type="hidden" value="{{$item->price}}" id="price{{$loop->index}}">
                                </td>
                                <td class="cart-product-quantity" width="130px">
                                    <div class="input-group quantity">
                                        <div class="input-group-prepend">
                                            <a href="{{route('cart.decrimentItem', $item->rowId)}}" class="input-group-text">-</a>
                                        </div>
                                        <span type="text" class="qty-input form-control"> {{$item->qty}} </span>
                                        <div class="input-group-append">
                                            <a href="{{route('cart.incriment', $item->rowId)}}" class="input-group-text">+</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="cart-product-price">
                            <span id="price" class="amount">{{$item->price*$item->qty}}</span>
                                </td>
                                <td>
                            </tr> 
                        @endforeach
                    </tbody>
                </table>

                <div class="row col-mb-30">
                    <div class="col-lg-6">
                        <form class="row">
                            <div class="col-12 form-group">
                                <h5>Division Name</h5>
                                <select class="sm-form-control" id="divisions" name="divisions">
                                    <option value>Select One</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{$division->id}}">{{$division->division_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <h5>District Name</h5>
                            <div class="col-6 form-group">
                                <select class="sm-form-control" id="district_id" name="district_id">
                                    
                                </select>
                            </div>

                            <div class="col-6 form-group">
                                <input type="text" class="sm-form-control" placeholder="PostCode / Zip" />
                            </div>
                            <div class="col-12 form-group">
                                <a href="{{route('customer.index')}}" class="button button-3d m-0 button-black">Checkout</a>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-6">
                        <h4>Cart Totals</h4>
                        <div class="table-responsive">
                            <table class="table cart cart-totals">
                                <tbody>
                                    <tr class="cart_item">
                                        <td class="cart-product-name">
                                            <strong>Cart Subtotal</strong>
                                        </td>

                                        <td class="cart-product-name">
                                            <span class="amount">{{Cart::subtotal()}}</span>
                                        </td>
                                    </tr>
                                    <tr class="cart_item">
                                        <td class="cart-product-name">
                                            <strong>Shipping</strong>
                                        </td>

                                        <td class="cart-product-name">
                                            <span class="amount">Free Delivery</span>
                                        </td>
                                    </tr>
                                    <tr class="cart_item">
                                        <td class="cart-product-name">
                                            <strong>Total</strong>
                                        </td>

                                        <td class="cart-product-name">
                                            <span id="totalAmount" class="amount color lead"><strong>{{Cart::instance('addtoCart')->subtotal()}}</strong></span>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- #content end -->



<script>


    function plus(id){
        var qty =   document.getElementById('qty'+id).value;
        var price = document.getElementById('price'+id).value;
        var total = Number(price)*Number(qty);
        document.getElementById('amount'+id).innerHTML=total;
       
    }

    function minus(id){
        var qty = document.getElementById('qty'+id).value;
        var price = document.getElementById('price'+id).value;
        var total = Number(price)*Number(qty);
        document.getElementById('amount'+id).innerHTML=total;
       
    }
    
    var totalAmount = 
    document.getElementById(totalAmount).innerHTML = totalAmount;



</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#divisions').change(function(){
            let divisions_id  = $(this).val();
            if(divisions_id){
                $.ajax({
                    type:"GET",
                    url:"{{url('get-district')}}/"+divisions_id,
                    success:function(response){
                        if(response){
                            $('#district_id').empty();
                            $('#district_id').append("<option value>Select One</option>");
                            $.each(response,function(key, value){
                                $('#district_id').append("<option value='"+value.id+"'>"+value.district_name+"</option>")
                            })
                        }else{
                            $('#district_id').empty();
                        }
                    }
                })
            }else{
                $('#district_id').empty();
            }
        })
    })
</script>

@endsection