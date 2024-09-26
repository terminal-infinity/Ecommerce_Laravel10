<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\backend\PropertyTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

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

//Home route
Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/about',[HomeController::class,'about'])->name('home.about');
Route::get('/shop',[HomeController::class,'shop'])->name('home.shop');
Route::get('/product_details/{id}',[HomeController::class,'product_details'])->name('home.product_details');


// admin login route
Route::get('/admin/login',[AdminController::class,'AdminLogin'])->name('admin.login');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// admin group middleware
Route::middleware(['auth','role:admin'])->group(function(){


    Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout',[AdminController::class,'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile',[AdminController::class,'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store',[AdminController::class,'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password',[AdminController::class,'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password',[AdminController::class,'AdminUpdatePassword'])->name('admin.update.password');


}); // end group admin middleware


// agent group middleware
Route::middleware(['auth','role:agent'])->group(function(){
    Route::get('/agent/dashboard',[AgentController::class,'AgentDashboard'])->name('agent.dashboard');
}); // end group agent middleware


// admin group middleware
Route::middleware(['auth','role:admin'])->group(function(){

    // Product Controller group
    Route::controller(ProductController::class)->group(function(){
        Route::get('/admin/view_category', 'view_category')->name('admin.view_category');
        Route::get('/admin/add_category', 'add_category')->name('admin.add_category');
        Route::post('/admin/upload_category', 'upload_category')->name('admin.upload_category');
        Route::get('/admin/edit_category/{id}', 'edit_category')->name('admin.edit_category');
        Route::post('/admin/update_category/{id}', 'update_category')->name('admin.update_category');
        Route::get('/admin/delete_category/{id}', 'delete_category')->name('admin.delete_category');


        Route::get('/admin/view_subcategory', 'view_subcategory')->name('admin.view_subcategory');
        Route::get('/admin/add_subcategory', 'add_subcategory')->name('admin.add_subcategory');
        Route::post('/admin/upload_subcategory', 'upload_subcategory')->name('admin.upload_subcategory');
        Route::get('/admin/edit_subcategory/{id}', 'edit_subcategory')->name('admin.edit_subcategory');
        Route::post('/admin/update_subcategory/{id}', 'update_subcategory')->name('admin.update_subcategory');
        Route::get('/admin/delete_subcategory/{id}', 'delete_subcategory')->name('admin.delete_subcategory');

        Route::get('/admin/view_brand', 'view_brand')->name('admin.view_brand');
        Route::get('/admin/add_brand', 'add_brand')->name('admin.add_brand');
        Route::post('/admin/upload_brand', 'upload_brand')->name('admin.upload_brand');
        Route::get('/admin/edit_brand/{id}', 'edit_brand')->name('admin.edit_brand');
        Route::post('/admin/update_brand/{id}', 'update_brand')->name('admin.update_brand');
        Route::get('/admin/delete_brand/{id}', 'delete_brand')->name('admin.delete_brand');

        Route::get('/admin/view_colour', 'view_colour')->name('admin.view_colour');
        Route::get('/admin/add_colour', 'add_colour')->name('admin.add_colour');
        Route::post('/admin/upload_colour', 'upload_colour')->name('admin.upload_colour');
        Route::get('/admin/edit_colour/{id}', 'edit_colour')->name('admin.edit_colour');
        Route::post('/admin/update_colour/{id}', 'update_colour')->name('admin.update_colour');
        Route::get('/admin/delete_colour/{id}', 'delete_colour')->name('admin.delete_colour');


        Route::get('/admin/view_size', 'view_size')->name('admin.view_size');
        Route::post('/admin/upload_size', 'upload_size')->name('admin.upload_size');
        Route::get('/admin/delete_size/{id}', 'delete_size')->name('admin.delete_size');


        Route::get('/admin/view_product', 'view_product')->name('admin.view_product');
        Route::get('/admin/add_product', 'add_product')->name('admin.add_product');
        Route::post('/admin/upload_product', 'upload_product')->name('admin.upload_product');
        Route::get('/admin/edit_product/{id}', 'edit_product')->name('admin.edit_product');
        Route::post('/admin/update_product/{id}', 'update_product')->name('admin.update_product');
        Route::get('/admin/delete_product/{id}', 'delete_product')->name('admin.delete_product');

        Route::get('/admin/{productId}/productimages', 'productimages')->name('admin.productimages');
        Route::post('/admin/{productId}/upload_productimages', 'upload_productimages')->name('admin.upload_productimages');
        Route::get('/admin/{id}/delete_productimages', 'delete_productimages')->name('admin.delete_productimages');


        

        
    });


}); // end group admin middleware

