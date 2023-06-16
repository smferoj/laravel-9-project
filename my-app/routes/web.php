<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubCategoryController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:user'])->name('dashboard');



Route::middleware(['auth', 'role:admin'])->group(function(){
Route::controller(DashboardController::class)->group(function(){
Route::get('/admin/dashboard', "Index")->name('admindashboard');
});


Route::controller(CategoryController::class)->group(function(){
    Route::get('admin/all-categories', 'Index')->name('allcategories');
    Route::get('admin/add-category', 'AddCategory')->name('addcategory');
});

Route::controller(SubCategoryController::class)->group(function(){
    Route::get('admin/all-subcategories', 'Index')->name('allsubcategories');
    Route::get('admin/add-subcategory', 'AddSubCategory')->name('addsubcategory');
});
Route::controller(ProductController::class)->group(function(){
    Route::get('admin/all-products', 'Index')->name('allproducts');
    Route::get('admin/add-product', 'AddProduct')->name('addproduct');
});
Route::controller(OrderController::class)->group(function(){
    Route::get('admin/pending-orders', 'Index')->name('pendingorders');

});

});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';