<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Cart;
use Illuminate\Support\Facades\Cookie;

class AddToCartController extends Controller
{
    /**
     * Display a listing of the resource.
     
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request)
    {
        
        $singleCart = Product::find($request->product_id);
        Cart::instance('addtoCart')->add($singleCart->product_id, $singleCart->name, $request->quantity, $singleCart->price)->associate('App\Models\Product');
        return back();
    }

    public function showCart(){
        return view('frontend.cart');
    }


    // public function updatetocart(Request $request)
    // {
    //     $prod_id = $request->input('product_id');
    //     $quantity = $request->input('quantity');

    //     if(Cookie::get('shopping_cart'))
    //     {
    //         $cookie_data = stripslashes(Cookie::get('shopping_cart'));
    //         $cart_data = json_decode($cookie_data, true);

    //         $item_id_list = array_column($cart_data, 'item_id');
    //         $prod_id_is_there = $prod_id;

    //         if(in_array($prod_id_is_there, $item_id_list))
    //         {
    //             foreach($cart_data as $keys => $values)
    //             {
    //                 if($cart_data[$keys]["item_id"] == $prod_id)
    //                 {
    //                     $cart_data[$keys]["item_quantity"] =  $quantity;
    //                     $item_data = json_encode($cart_data);
    //                     $minutes = 60;
    //                     Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
    //                     return response()->json(['status'=>'"'.$cart_data[$keys]["item_name"].'" Quantity Updated']);
    //                 }
    //             }
    //         }
    //     }
    // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
