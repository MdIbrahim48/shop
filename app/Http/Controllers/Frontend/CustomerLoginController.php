<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CustomerRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Auth;

class CustomerLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function customerLogin(Request $request)
    {
        $request->validate([
            'email' => 'email',
            'password' => 'min:5',
        ]);

        $credentials = $request->only('email', 'password');
        // dd($credentials);
        // if (Auth::attempt($credentials)) {
        if (Auth::guard('customer')->attempt($credentials)) {
            dd('login');
        }

        Session()->flash('alert-danger', "Email and Password doesn't match");
        return back();
        //    // $user = $request->only(['email','password']);
        //     $user = CustomerRegistration::where('email', '=',$request->email)->first();
        //     $password =  Hash::check($request->password, $user->password);
        //     if($user == $request->user && $password == $request->password){
        //         return redirect()->route('dashboard');
        //     }else{
        //         Session()->flash('alert-danger', "Email and Password doesn't match");
        //         return back();
        //     }

        //     // if(Auth::attempt($user)){

        //     return redirect()->route('dashboard');
        // }else{
        //     Session()->flash('alert-danger', "Email and Password doesn't match");
        //     return back();
        // }

    }
    public function index()
    {
        return view('frontend.customer_login');
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
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'email',
            'address' => 'required',
            'phone' => 'max:11',
            'password' => 'min:5|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:5'
        ]);
        $user = new CustomerRegistration;
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        Session()->flash('alert-success', 'Registration Successfully');
        return back();
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
