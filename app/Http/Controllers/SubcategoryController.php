<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubcategoryController extends Controller
{
    function subcategory(){
        $subcategories = Subcategory::all();
        $categories = Category::all();
        return view('admin.subcategory.subcategory',[
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    function subcategory_store(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required',
        ]);
        Subcategory::create([
            'subcategory_name' => $request->subcategory_name,
            'category_id' => $request->category_id,
            'addedby' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);
        return back();
    }

}
