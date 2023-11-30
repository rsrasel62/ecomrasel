<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\ProductThumb;
use App\Models\Size;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;
use Image;

class ProductController extends Controller
{
    function product(){
        $categores = Category::all();
        $subcategoires = Subcategory::all();
        return view('admin.product.product',[
            'categories' => $categores,
            'subcategories' => $subcategoires,
        ]);
    }

    function getsubcategory(Request $request){
        $str = '<option value="">--select subcategory</option>';
        $subcategoires = Subcategory::where('category_id', $request->category_id)->get();

        foreach($subcategoires as $subcategory){
            $str .= '<option value="' .$subcategory->id. '">'.$subcategory->subcategory_name.'</option>' ;
        }

        echo $str;
    }

    function product_store(Request $request){

        $product_id = Product::insertGetId([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'brand' => $request->brand,
            'price' => $request->price,
            'discount' => $request->discount,
            'after_discount' => $request->price - ($request->price * $request->discount) /100,
            'short_desp' => $request->short_desp,
            'long_desp' => $request->long_desp,
            // 'preview' => $request->preview,
            'slug' => Str::lower(str_replace(' ','-', $request->product_name)).'-'.rand('100','999'),
            'created_at' => Carbon::now(),
        ]);

        $upload_file = $request->preview;
        $extension = $upload_file->GetClientOriginalExtension();
        // $file_name = Str::lower(str_replace(' ','-', $request->product_name)).'-'.rand('100','999').'.'.$extension;
        $file_name = Str::lower(str_replace(' ', '-', substr($request->product_name, 0, 6))). '-' . rand(100, 999) . '.' . $extension;
        Image::make($upload_file)->save(public_path('uploads/product/preview/'.$file_name));
        Product::find($product_id)->update([
                'preview' => $file_name,
        ]);

        $thumbnails = $request->thumbnails;
        foreach($thumbnails as $thumbnail){
            $thum_extension = $thumbnail->GetClientOriginalExtension();
            $thum_name = Str::lower(str_replace(' ', '-', substr($request->product_name, 0, 6))). '-' . rand(100, 999) . '.' . $thum_extension;

            // $thum_name = Str::lower(str_replace(' ','-', $request->product_name)).'-'.rand('100','999').'.'.$thum_extension;
            Image::make($thumbnail)->save(public_path('uploads/product/thumbnail/'.$thum_name));

            ProductThumb::insert([
                'product_id' => $product_id,
                'thumbnail' => $thum_name,
                'created_at' => Carbon::now(),
            ]);
        }
        return back();

    }

    function product_list(){
        $products = Product::all();
        return view('admin.product.product_list',[
            'products' => $products,
        ]);
    }

    function add_inventory($product_id){
        $colors = Color::all();
        $sizes = Size::all();
        $product = Product::find($product_id);
        $inventories = Inventory::where('product_id', $product_id)->get();
        return view('admin.product.add_inventory',[
            'product' => $product,
            'colors' => $colors,
            'sizes' => $sizes,
            'inventories' => $inventories,
        ]);
    }

    function inventory_store(Request $request){
        // if (Inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->where('size_id',               $request->size_id)->exists()) {
        //     Inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->increment('quantity', $request->quantity);

        //     return back();
        // } else {
        // Inventory::insert([
        //     'product_id' => $request->product_id,
        //     'color_id' => $request->color_id,
        //     'size_id' => $request->size_id,
        //     'quantity' => $request->quantity,
        //     'created_at' => Carbon::now(),
        // ]);
        // return back();
        if (Inventory::where('product_id', $request->product_id)
        ->where('color_id', $request->color_id)
        ->where('size_id', $request->size_id)
        ->exists()) {

        Inventory::where('product_id', $request->product_id)
        ->where('color_id', $request->color_id)
        ->where('size_id', $request->size_id)
        ->increment('quantity', $request->quantity);

        } else {

        Inventory::updateOrInsert(
        [
        'product_id' => $request->product_id,
        'color_id' => $request->color_id,
        'size_id' => $request->size_id,
        ],
        [
        'quantity' => $request->quantity,
        'created_at' => Carbon::now(),
        ]
        );
        }

        return back();
        }



    function variation(){
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.product.variation',[
            'colors' => $colors,
            'sizes' => $sizes,
        ]);
    }

    function color_store(Request $request){
        Color::insert([
            'color_name' => $request->color,
            'color_code' => $request->color_code,
            'created_at' => Carbon::now(),
        ]);
        return back();
    }

    function size_store(Request $request){
        Size::insert([
            'size' => $request->size,
            'created_at' => Carbon::now(),
        ]);
        return back();
    }

    //product delete
    function product_delete($product_id){
        // $product = Product::where('id', $product_id)->get();
        // echo $product->first()->preview;
        $product = Product::find($product_id);
        $delete_form = public_path('uploads/product/preview/'.$product->preview);
        unlink($delete_form);
        $product->delete();

        //product_thum
        $product_thum = ProductThumb::where('product_id', $product_id)->get();
        foreach($product_thum as $thum){
            $delete_form = public_path('uploads/product/thumbnail/'.$thum->thumbnail);
            unlink($delete_form);
            ProductThumb::find($thum->id)->delete();
        }

        //inventory_product
        $inventories = Inventory::where('product_id', $product_id)->get();

        foreach($inventories as $inventory){
            Inventory::find($inventory->id)->delete();
        }

        return back();
    }
}
