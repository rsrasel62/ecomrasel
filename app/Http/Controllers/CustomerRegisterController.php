<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRegisterRequest;
use App\Models\CustomerLogin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerRegisterController extends Controller
{
    function customer_register(){
        return view('frontend.customer_register_login');
    }

    function customer_store(CustomerRegisterRequest $request){
        CustomerLogin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>bcrypt($request->password),
            'created_at' => Carbon::now(),
        ]);
        if(Auth::guard('customerlogin')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect('/')->with('register', 'Customer login success!');
        }
        else{
          return back()->with('wrong_pass', 'Please login with right user and password');
        }

    }
}
