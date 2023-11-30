<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CoponController;
use App\Http\Controllers\CustomerloginController;
use App\Http\Controllers\CustomerRegisterController;
use App\Http\Controllers\FrontedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


//start now
// Route::get('/', [FrontedController::class, 'welcome']);

Auth::routes();
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [FrontedController::class, 'home'])->name('home');
//forntend
Route::get('/master', [FrontedController::class, 'master']);
Route::get('/product/details/{slug}', [FrontedController::class, 'product_details'])->name('product.details');
Route::POST('/getSize', [FrontedController::class, 'getSize']);

//customer register login
Route::get('/customer/register/login', [CustomerRegisterController::class, 'customer_register'])->name('customer.register');
Route::post('/customer/store', [CustomerRegisterController::class, 'customer_store'])->name('customer.store');
Route::post('/customer/login', [CustomerloginController::class, 'customer_login'])->name('customer.login');
Route::get('/customer/logout', [CustomerloginController::class, 'customer_logout'])->name('customer.logout');

//cart controller
Route::post('/cart/store', [CartController::class, 'cart_store'])->name('cart.store');
Route::get('/remove/cart/{cart_id}', [CartController::class, 'remove_cart'])->name('remove.cart');
Route::get('/clear/cart', [CartController::class, 'clear_cart'])->name('clear.cart');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart/update', [CartController::class, 'cart_update'])->name('cart.update');

//Copon
Route::get('/copon', [CoponController::class, 'copon'])->name('copon');
Route::post('/copon/store', [CoponController::class, 'copon_store'])->name('copon.store');
Route::get('/copon/delete/{copon_id}', [CoponController::class, 'copon_delete'])->name('copon.delete');

//checkout
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/getcity', [CheckoutController::class, 'getcity']);
Route::post('/order/store', [CheckoutController::class, 'order_store'])->name('order.store');


//user
Route::get('/user', [UserController::class, 'user'])->name('user');
Route::get('/user/delete{user_id}', [UserController::class, 'user_delete'])->name('user.delete');
Route::get('/user/profile', [UserController::class, 'user_profile'])->name('user.profile');
Route::post('/user/name/update', [UserController::class, 'user_name_update'])->name('usernameemail.update');
Route::post('/user/profile/password/update', [UserController::class, 'user_pass_update'])->name('user.password.update');
Route::post('/user/profile/photo', [UserController::class, 'profile_photo'])->name('profile.photo');

//category
Route::get('/category', [CategoryController::class, 'category'])->name('category');
Route::post('/category/store', [CategoryController::class, 'category_store'])->name('category.store');
Route::get('/category/delete/{category_delete}', [CategoryController::class, 'category_delete'])->name('category.delete');
Route::get('/category/edit/{category_id}', [CategoryController::class, 'category_edit'])->name('category.edit');
Route::post('/category/update', [CategoryController::class, 'category_update'])->name('category.update');
Route::get('/category/restore/{category_id}', [CategoryController::class, 'category_restore'])->name('category.restore');
Route::get('/trash/delete/{category_id}', [CategoryController::class, 'trash_delete'])->name('trash.delete');

//subcategory
Route::get('/subCategory', [SubcategoryController::class, 'subcategory'])->name('subcategory');
Route::post('/subcategory/store', [SubcategoryController::class, 'subcategory_store'])->name('subcategory.store');

//products
Route::get('/product', [ProductController::class, 'product'])->name('product');
Route::post('/getsubcategory', [ProductController::class, 'getsubcategory']);
Route::post('/product/store', [ProductController::class, 'product_store'])->name('product.store');
Route::get('/product/list', [ProductController::class, 'product_list'])->name('product.list');
Route::get('/product/inventory/{product_id}', [ProductController::class, 'add_inventory'])->name('add.inventory');
Route::post('/inventory/store', [ProductController::class, 'inventory_store'])->name('inventory.store');
Route::get('/product/delete/{product_id}', [ProductController::class, 'product_delete'])->name('product.delete');

//variation
Route::get('/variation', [ProductController::class, 'variation'])->name('variation');
Route::post('/color/store', [ProductController::class, 'color_store'])->name('color.store');
Route::post('/size/store', [ProductController::class, 'size_store'])->name('size.store');




