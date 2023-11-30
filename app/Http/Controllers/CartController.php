<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Copon;
use App\Models\Inventory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function cart_store(Request $request){
        if(Auth::guard('customerlogin')->check()){
            if($request->size_id == ''){
               $size_id = 3;
            }else{
               $size_id = $request->size_id;
            }
            if($request->color_id == ''){
                $color_id = 3;
            }else{
                $color_id = $request->color_id;
            }
            Inventory::where('customer_id', Auth::guard('çustomerlogin')->id())
            Cart::insert([
                'customer_id' => Auth::guard('customerlogin')->user()->id,
                'product_id' => $request->product_id,
                'size_id' => $size_id,
                'color_id' => $color_id,
                'quantity' => $request->quantity,
                'created_at' => Carbon::now(),
            ]);
            return back()->with('cart_added', 'Product cart added successfully!');
        }else{
            return redirect()->route('customer.register')->with('login', 'Please login firt to add to cart!');
        }
    }

    function remove_cart($cart_id){
        Cart::find($cart_id)->delete();
        return back();
    }
    function clear_cart(){
        Cart::where('customer_id', Auth::guard('customerlogin')->id())->delete();
        return back();
    }

    function cart(Request $request){
        $carts = Cart::where('customer_id', Auth::guard('customerlogin')->id())->get();
        $coupon = $request->coupon;
        $discount = 0;
        $message = '';
        $type = '';
        if($coupon == ''){
            $discount = 0;
        }else{
            if(Copon::where('copon_code', $coupon)->exists()){
                if(Carbon::now()->format('Y-m-d') > Copon::where('copon_code', $coupon)->first()->validity){
                    $discount = 0;
                    $message = 'coupon code expire!';
                }else{
                    $discount = Copon::where('copon_code', $coupon)->first()->amount;
                    $type = Copon::where('copon_code', $coupon)->first()->type;
                }
            }else{
                $discount = 0;
                $message = 'ivalid coupon code!';
            }
        }

        return view('frontend.cart',[
            'carts' => $carts,
            'coupon' => $coupon,
            'message' => $message,
            'discount' => $discount,
            'type' => $type,
        ]);
    }

    function cart_update(Request $request){
        foreach($request->quantity as $cart_id=>$quantity){
            Cart::find($cart_id)->update([
                'quantity' => $quantity,
            ]);

        }
        return back();
    }
}
