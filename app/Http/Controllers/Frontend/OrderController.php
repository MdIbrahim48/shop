<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Order;
use Cart;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{

    // public function order(Request $request){
    //     foreach (Cart::instance('addtoCart')->content() as $cItem) { OrderItem::create(['product_id' => $cItem->id,'price' => $cItem->price, 'quantity' => $cItem->qty, ]);
    //         $findData = Product::where('id', $cItem->id)->first(); 
    //         if ($findData) { $udata = $findData->sold + 1;
    //             $findData->update(['sold' => $udata]); } } Cart::instance('addtoCart')->destroy();
    //              return back(); 
                
    //     }
        
        public function order(Request $request) {
            // $request->validate([ 'first_name' => 'required', 'last_name' => 'required', 'email' => 'required', 'phone' => 'required', 'address' => 'required', 'zipcode' => 'required', 'address' => 'required', 'divisions_id' => 'required', 'district_id' => 'required', 'upazila' => 'required', ]);
            // if ($request->payment == 0) { $divisions = Division::where('id', $request->divisions_id)->first(); 
            // $district = District::where('id', $request->district_id)->first(); 
            // $orderId = '#FD' . rand(100000000000, 9999999999999); 
            Order::create([ 'orderId' => rand(100000000000, 9999999999999), 'first_name' => $request->first_name, 'last_name' => $request->last_name, 'email' => $request->email,'phone' => $request->phone, 'address' => $request->address,'divisions' => $request->divisions, 'district' => $request->district	,'amount' => Cart::instance('addtoCart')->subtotal(), ]);
                foreach (Cart::instance('addtoCart')->content() as $cItem) { OrderItem::create(['price' => $cItem->price, 'quantity' => $cItem->qty, ]);
                    $findData = Product::where('id', $cItem->product_id)->first(); 
                    if ($findData) { $udata = $findData->sold + 1;
                        $findData->update(['sold' => $udata]); } }
                        Cart::instance('addtoCart')->destroy();
                        return redirect()->route('home'); 
            } 
        
   
    
    
   
  

        // public function order(Request $request) {
        //      $prod_id = $request->input('product_id');
        //       dd($request->product_id);
        //        return response()->json(['prod_id' => $request->product_id]); 
        //        $quantity = $request->input('quantity'); 
        //        $singleCartpro = Product::where('id', $prod_id)->first();
        //         return response()->json(['status' => $singleCartpro]);
        //         $price = $singleCartpro->price * $quantity;
        //          Cart::instance('addtoCart')->add($prod_id, $singleCartpro->name, $quantity, $price)->associate('App\odels\roduct'); } 
        //          public function placeOrderCashOnDelevary(Request $request) {
        //               $request->validate([ 'first_name' => 'required', 'last_name' => 'required', 'email' => 'required', 'phone' => 'required', 'address' => 'required', 'zipcode' => 'required', 'address' => 'required', 'divisions_id' => 'required', 'district_id' => 'required', 'upazila' => 'required', ]);
        //              if ($request->payment == 0) { $divisions = Division::where('id', $request->divisions_id)->first(); 
        //                 $district = District::where('id', $request->district_id)->first(); 
        //                 $orderId = '#FD' . rand(100000000000, 9999999999999); 
        //                 $order = Order::create([ 'orderId' => $orderId, 'first_name' => $request->first_name, 'last_name' => $request->last_name, 'email' => $request->email, 'user_id' => Auth::user()->id, 'phone' => $request->phone, 'address' => $request->address, 'zipcode' => $request->zipcode, 'divisions' => $divisions->name, 'district' => $district->name, 'upazila' => $request->upazila, 'discount' => $request->discount, 'subtotal' => $request->subtotal, 'tax' => $request->tax, 'amount' => Cart::instance('cartProduct')->subtotal(), ]);
        //                  foreach (Cart::instance('cartProduct')->content() as $cItem) { OrderItems::create([ 'user_id' => Auth::user()->id, 'product_id' => $cItem->id, 'order_id' => $order->id, 'shop_for' => $cItem->model->shop_for, 'product_by_shopid' => $cItem->model->user_id, 'price' => $cItem->price, 'quantity' => $cItem->qty, ]);
        //                      $findData = Product::where('id', $cItem->id)->first(); 
        //                      if ($findData) { $udata = $findData->sold + 1;
        //                          $findData->update(['sold' => $udata]); } } Cart::instance('cartProduct')->destroy();
        //                           return redirect(route('front.thankyou')); } 
        //             }


        // }
}