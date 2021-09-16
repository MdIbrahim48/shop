@extends('frontend.layouts.master')
@section('page_title')
    <section id="page-title">
        <div class="container clearfix">
            <h1>Shop</h1>
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
                            <th class="cart-product-thumbnail">&nbsp;</th>
                            <th class="cart-product-name">Product</th>
                            <th class="cart-product-price">Unit Price</th>
                            <th class="cart-product-quantity">Quantity</th>
                            <th class="cart-product-subtotal">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{Cart::instance('addtoCart')->content()}}
                        @foreach (Cart::instance('addtoCart')->content() as $item)
                            <tr class="cart_item">
                                <td class="cart-product-remove">
                                    <a href="#" class="remove" title="Remove this item"><i class="icon-trash2"></i>{{Cart::destroy()}}</a>
                                </td>
                                <td class="cart-product-thumbnail">
                                    <a href="#"><img width="64" height="64" src="{{asset('frontend/images/shop/thumbs/small/dress-3.jpg')}}" alt="Pink Printed Dress"></a>
                                </td>

                                <td class="cart-product-name">
                                    <a href="#">{{$item->name}}</a>
                                </td>

                                <td class="cart-product-price">
                                    <span id="price" class="amount">{{$item->price}}</span>
                                </td>

                                <td class="cart-product-quantity">
                                    <div class="quantity">
                                        <input type="button" value="-" onclick="decrement()" class="minus" id="minus">
                                        <input type="text" name="quantity" value="2" id="qty" class="qty" />
                                        <input type="button" onclick="increment()" value="+" class="plus" id="plus">
                                    </div>
                                </td>
                                <td class="cart-product-subtotal">
                                    <span id="totalPrice" class="amount">{{Cart::subtotal()}}</span>
                                </td>
                            </tr> 
                        @endforeach
                    </tbody>

                </table>

                <div class="row col-mb-30">
                    <div class="col-lg-6">
                        <h4>Calculate Shipping</h4>
                        <form class="row">
                            <div class="col-12 form-group">
                                <select class="sm-form-control">
                                    <option value="AX">&#197;land Islands</option>
                                    <option value="AF">Afghanistan</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                </select>
                            </div>
                            <div class="col-6 form-group">
                                <input type="text" class="sm-form-control" placeholder="State / Country" />
                            </div>

                            <div class="col-6 form-group">
                                <input type="text" class="sm-form-control" placeholder="PostCode / Zip" />
                            </div>
                            <div class="col-12 form-group">
                                <button class="button button-3d m-0 button-black">Update Totals</button>
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
                                            <span class="amount">$106.94</span>
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
                                            <span class="amount color lead"><strong>$106.94</strong></span>
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
        const a=1;
        const increment = document.getElementById('qty').value;
        const decrement = document.getElementById('minus');
        const price = document.getElementById('price').textContent;
        
        const increment = document.getElementById('totalPrice').innerHTML = 500;

        document.getElementById('plus').addEventListener('click',function(){
            let price = document.getElementById('price').textContent;
            let qty = document.getElementById('qty').value;
            const total = price * qty;
            console.log(total)
        })

        document.getElementById('minus').addEventListener('click',function(){
            let price = document.getElementById('price').textContent;
            let qty = document.getElementById('qty').value;
            let total = price*2
            console.log(total)
        })

        function increment(){
            let a=++1;
            let total = a*price
            const increment = document.getElementById('totalPrice').innerHTML = total;
        
        }
        increment()
    </script>
@endsection