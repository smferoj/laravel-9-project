<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubCategoryController;



Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'Index')->name('Home');
});

Route::controller(ClientController::class)->group(function(){
    Route::get('/category/{id}/{slug}', 'CategoryPage')->name('category');
    Route::get('/single-product', 'SingleProduct')->name('singleproduct');
    Route::get('/add-to-cart', 'ADDToCart')->name('addtocart');
    Route::get('/checkout', 'Checkout')->name('checkout');
    Route::get('/user-profile', 'UserProfile')->name('userprofile');
    Route::get('/new-release', 'NewRelease')->name('newrelease');
    Route::get('/todays-deal', 'TodaysDeal')->name('todaysdeal');
    Route::get('/customer-service', 'CustomerService')->name('customerservice');
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
    Route::post('admin/store-category', 'StoreCategory')->name('storecategory');
    Route::get('admin/edit-category/{id}', 'EditCategory')->name('editcategory');
    Route::post('admin/update-category', 'UpdateCategory')->name('updatecategory');
    Route::get('admin/delete-category/{id}', 'DeleteCategory')->name('deletecategory');
});


Route::controller(SubCategoryController::class)->group(function(){
    Route::get('admin/all-subcategories', 'Index')->name('allsubcategories');
    Route::get('admin/add-subcategory', 'AddSubCategory')->name('addsubcategory');
    Route::post('admin/store-subcategory', 'StoreSubCategory')->name('storesubcategory');
    Route::get('admin/edit-subcategory/{id}', 'EditSubCat')->name('editsubcat');
    Route::post('/admin/update-subcategory', 'UpdateSubCat')->name('updatesubcat');
    Route::get('admin/delete-subcategory/{id}', 'DeleteSubCat')->name('deletesubcat');
});


Route::controller(ProductController::class)->group(function(){
    Route::get('admin/all-products', 'Index')->name('allproducts');
    Route::get('admin/add-product', 'AddProduct')->name('addproduct');
    Route::post('/admin/store-product', 'StoreProduct')->name('storeproduct');
    Route::get('/admin/edit-product-img/{id}', 'EditProductImg')->name('editproductimg');
    Route::post('/admin/update-product-image', 'UpdateProductImg')->name('updateproductimg');
    Route::get('/admin/edit-product/{id}', 'EditProduct')->name('editproduct');
    Route::post('/admin/update-product', 'UpdateProduct')->name('updateproduct');
    Route::get('/admin/delete-product/{id}', 'DeleteProduct')->name('deleteproduct');

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
