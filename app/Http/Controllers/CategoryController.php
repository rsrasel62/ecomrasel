<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use Image;

class CategoryController extends Controller
{
    function category(){
        $categoires = Category::all();
        $trashed = Category::onlyTrashed()->get();
        return view('admin.category.category',[
            'categories' => $categoires,
            'trashed' => $trashed,
        ]);
    }

    function category_store(Request $request){
        $request->validate([
            'category_name' => 'required',
            'cat_image' => 'required',
        ]);

        $category_id = Category::insertGetId([
            'category_name' => $request->category_name,
            'added_by' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);
        $photo = $request->cat_image;
        $extension = $photo->GetClientOriginalExtension();
        $file_name = Str::lower(str_replace('','-', $request->category_name)).'-'.rand('1000','9999').'.'.$extension;
        Image::make($photo)->save(public_path('uploads/category/'.$file_name));
        Category::find($category_id)->update([
            'cat_image' => $file_name,
        ]);
        return back()->withSuccess('Category upload successfully!');
    }

    function category_delete($category_id){
        $category = Category::find($category_id);
        // $delete_form = public_path('uploads/category/'. $category->cat_image);
        // unlink($delete_form);
        $category->delete();
        return back()->with('delete_category', 'Category delete successfully!');
    }

    function category_edit($category_id){
        $category = Category::find($category_id);
        return view('admin.category.edit',[
            'category' => $category,
        ]);
    }

    function category_update(Request $request){
        if($request->cat_image == null){
            Category::find($request->category_id)->update([
                'category_name' => $request->category_name,
               ]);
        }else{
            $category = Category::find($request->category_id);
            // $category_image = Category::where('id', $request->category_id)->first()->cat_image;
            $delete_form = public_path('uploads/category/'.$category->cat_image);
            unlink($delete_form);
            $uploaded_file =  $request-> cat_image;
            $extension = $uploaded_file->GetClientOriginalExtension();
            $file_name = str::lower(str_replace(' ', '-',$request->category_name)).'-'.rand('100', '999').'.'.$extension;
            Image::make($uploaded_file)->save(public_path('uploads/category/'.$file_name));

           Category::find($request->category_id)->update([
            'category_name' => $request->category_name,
            'cat_image' => $file_name,
           ]);
        }
        return back()->with('update_category', 'Category update successfully!');


    }

    function category_restore($category_id){
        Category::onlyTrashed()->find($category_id)->restore();
        return back();
    }

    function trash_delete($category_id){
        $category = Category::onlyTrashed()->find($category_id);
        $delete_form = public_path('uploads/category/'. $category->cat_image);
        unlink($delete_form);
        $category->forceDelete();
        return back();
    }
}
