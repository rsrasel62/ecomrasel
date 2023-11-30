<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerloginController extends Controller
{
    // function customer_login(Request $request){
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);
    // }

    function customer_login(Request $request){

            if(Auth::guard('customerlogin')->attempt(['email'=>$request->email, 'password'=>$request->password])){
                return redirect('/');
            }
            else{
              return back()->with('wrong_pass', 'Please login with right user and password');
            }
    }

    function customer_logout(){
        Auth::guard('customerlogin')->logout();
        return redirect()->route('customer.register');
    }
}
