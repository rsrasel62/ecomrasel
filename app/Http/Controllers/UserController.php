<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Str;
use Image;

class UserController extends Controller
{
    function user(){
        $users = User::where('id', '!=', Auth::id())->get();
        $total_user = User::count();
        return view('admin.user.user',[
            'users' => $users,
            'total_user' => $total_user,
        ]);
    }

    function user_delete($user_id){
        User::find($user_id)->delete();
        return back()->withDelete('user delete successfully!');
    }

    function user_profile(){
        return view('admin.user.profile');
    }

    function user_name_update(Request $request){
        User::find(Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return back()->with('namupdate', 'Profile name and email has been updated!');
    }

    function user_pass_update(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|',
        ]);

        if(Hash::check($request->old_password, Auth::user()->password)){
            User::find(Auth::id())->update([
                'password' => bcrypt($request->new_password),
            ]);
            return back()->with('passreset', 'Password changed!');
        }else{
            return back()->with('wrongPass', 'Please insert correct password');
        }
    }

    function profile_photo(Request $request){
        $photo = User::find(Auth::id());
        if($photo->image == null){
            $photo = $request->photo;
            $extension = $photo->GetClientOriginalExtension();
            $file_name = Str::lower(str_replace('','-',Auth::user()->name)).'-'.rand('1000','9999').'.'.$extension;
            Image::make($photo)->save(public_path('uploads/user/'.$file_name));
            User::find(Auth::id())->update([
                'image' => $file_name,
            ]);
            return back()->with('photoupdate', 'profile image uploaded!');
        }else{
            $delete_form = public_path('uploads/user/'.$photo->image);
            unlink($delete_form);

            $photo = $request->photo;
            $extension = $photo->GetClientOriginalExtension();
            $file_name = Str::lower(str_replace('','-',Auth::user()->name)).'-'.rand('1000','9999').'.'.$extension;
            Image::make($photo)->save(public_path('uploads/user/'.$file_name));
            User::find(Auth::id())->update([
                'image' => $file_name,
            ]);
            return back()->with('photoupdate', 'profile image uploaded!');
        }

    }
}
