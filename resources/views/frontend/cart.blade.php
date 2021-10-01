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

                                <td class="cart-product-price">
                                    <span id="price" class="amount">{{$item->price}}</span>
                                </td>
                                <td class="cart-product-quantity">
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus">
                                        <input type="text" name="quantity" value="1"class="qty" />
                                        <input type="button" value="+" class="plus">
                                    </div>
                                </td>

                                {{-- <td class="cart-product-quantity">
                                    <input type="hidden" class="product_id" value="{{$item['item_id']}}" >
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus changeQuantity">
                                        <input type="text" name="quantity" value="1"class="qty" />
                                        <input type="button" value="+" class="plus changeQuantity">
                                    </div>
                                </td> --}}
                                
                            </tr> 
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="cart-product-price">
                                <span id="price" class="amount">{{Cart::subtotal()}}</span>
                            </td>
                        </tr>
                    </tfoot>

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
                                            <span class="amount color lead"><strong>{{Cart::instance('addtoCart')->subtotal()}}</strong></span>
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
     // Update Cart Data
    //  $(document).ready(function () {
    //     $('.changeQuantity').click(function (e) {
    //         e.preventDefault();

    //         var quantity = $(this).closest(".cartpage").find('.qty').val();
    //         var product_id = $(this).closest(".cartpage").find('.product_id').val();

    //         var data = {
    //             '_token': $('input[name=_token]').val(),
    //             'quantity':quantity,
    //             'product_id':product_id,
    //         };

    //         $.ajax({
    //             url: '/update-to-cart',
    //             type: 'POST',
    //             data: data,
    //             success: function (response) {
    //                 window.location.reload();
    //                 alertify.set('notifier','position','top-right');
    //                 alertify.success(response.status);
    //             }
    //         });
    //     });

    // });

</script>





      
    {{-- <div class="mr-2 s_qtty_area d-flex">
        <div onclick="decrement()" class="btn border_redious0"><i class="fa fa-minus font-size-15"></i></div>
        <div id="output-area" desabled class="btn border_redious0 btn-desabled font-size-15"></div>
        <input type="hidden" name="qtty" value="1" id="input-qtty">
        <div class="btn border_redious0" onclick="increment()"><i class="fa fa-plus font-size-15"></i></div>
    </div> --}}

    {{-- <script>
        var x = 1;
        document.getElementById('output-area').innerHTML = x;

        function increment() {
            var a = ++x;
            document.getElementById('output-area').innerHTML = a;
            document.getElementById('input-qtty').value = a;
            document.getElementById('input-buynowqtty').value = a;
        }

        function decrement() {
            if (x > 1) {
            var a = --x;
            document.getElementById('output-area').innerHTML = a;
            document.getElementById('input-qtty').value = a;
            document.getElementById('input-buynowqtty').value = a;
            }
        }
    </script> --}}
@endsection