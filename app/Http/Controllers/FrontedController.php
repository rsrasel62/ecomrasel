<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\ProductThumb;
use App\Models\Size;
use Illuminate\Http\Request;

class FrontedController extends Controller
{
    function welcome(){
        return 'ok';
    }
    function master(){
        return view('frontend.master');
    }

    function home(){
        $products = Product::latest()->take(8)->get();
        $categories = Category::all();
        $feature_products = Product::take(3)->get();
        return view('frontend.fronthome',[
            'categories' => $categories,
            'products' => $products,
            'feature_products' => $feature_products,
        ]);
    }

    function product_details($slug){
        $product_info = Product::where('slug', $slug)->get();
        $product_thums = ProductThumb::where('product_id', $product_info->first()->id)->get();
        $releted_products = Product::where('category_id', $product_info->first()->category_id)->where('id', '!=', $product_info->first()->id)->get();
        $available_colors = Inventory::where('product_id', $product_info->first()->id)
                           ->groupBy('color_id')
                           ->selectRaw('count(*) as total, color_id')
                           ->get();
        $available_sizes = Inventory::where('product_id', $product_info->first()->id)->first()->size_id;

        $sizes = Size::all();
        return view('frontend.product_details',[
            'product_info' => $product_info,
            'product_thums' => $product_thums,
            'releted_products' => $releted_products,
            'available_colors' => $available_colors,
            'available_sizes' => $available_sizes,
            'sizes' => $sizes,
        ]);
    }

    function getSize(Request $request){
        $sizes = Inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->get();
        $str = ' ';
        // foreach($sizes as $size){
            foreach ($sizes as $size) {
                $str .= '<div class="form-check size-option form-option form-check-inline mb-2">
                            <input class="form-check-input" type="radio" value="'.$size->rel_to_size->id.'" name="size_id" id="'.$size->size_id .'" checked="">
                            <label class="form-option-label" for="'.$size->size_id.'">'.$size->rel_to_size->size.'</label>
                        </div>';
            }
        // }
        echo $str;
    }



}
