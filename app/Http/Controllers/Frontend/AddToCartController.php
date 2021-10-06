<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Division;
use App\Models\District;
use Illuminate\Support\Facades\Session;
use Cart;
use Illuminate\Support\Facades\Cookie;

class AddToCartController extends Controller
{

    function getDistrict($divisions_id)
    {
        $district = District::where('division_id', $divisions_id)->get();
        return response()->json($district);
    }
    /**
     * Display a listing of the resource.
     
     * @return \Illuminate\Http\Response
     */
    public function singleCart($id)
    {
        $singleCart = Product::find($id);
        Cart::instance('addtoCart')->add($singleCart->product_id, $singleCart->name, 1, $singleCart->price)->associate('App\Models\Product');
        return back();
    }


    public function addToCart(Request $request)
    {

        $singleCart = Product::find($request->product_id);
        Cart::instance('addtoCart')->add($singleCart->product_id, $singleCart->name, $request->quantity, $singleCart->price)->associate('App\Models\Product');
        return back();
    }

    public function showCart()
    {
        $divisions = Division::get();
        return view('frontend.cart', [
            'divisions' => $divisions
        ]);
    }


    function updatetocart(Request $request)
    {
        Cart::instance('addtoCart')->update($request->rowId, $request->qty);
        return back();
    }


    public function incrimentItem($rowId)
    {
        $productItem =  Cart::instance('addtoCart')->get($rowId);
        $quantity = $productItem->qty + 1;
        // dd($quantity);
        Cart::instance('addtoCart')->update($rowId, $quantity);
        return back();
    }

    public function decrimentItem($rowId)
    {
        $productItem =  Cart::instance('addtoCart')->get($rowId);
        $quantity = $productItem->qty - 1;
        // dd($quantity);
        Cart::instance('addtoCart')->update($rowId, $quantity);
        return back();
    }


    public function checkout(){
        return view('frontend.checkout');
    }

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
