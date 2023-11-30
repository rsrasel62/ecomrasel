<?php

namespace App\Http\Controllers;

use App\Models\Copon;
use Illuminate\Http\Request;

class CoponController extends Controller
{
    function copon(){
        $copons = Copon::all();
        return view('admin.copon.copon',[
            'copons' => $copons,
        ]);
    }

    function copon_store(Request $request){
        Copon::insert([
            'copon_code' => $request->copon_code,
            'type' => $request->type,
            'amount' => $request->amount,
            'validity' => $request->validity,
        ]);
        return back();
    }

    function copon_delete($copon_id){
        Copon::find($copon_id)->delete();
        return back();
    }
}
