<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function CategoryPage($id){
        $category = Category::findOrFail($id);
        $products = Product::where('product_category_id', $id)->latest()->get();
        return view ('user_template.category', compact('category', 'products'));
    }
    public function SingleProduct(){
        return view ('user_template.singleproduct');
    }
    public function ADDToCart(){
        return view ('user_template.addtocart');
    }
    public function Checkout(){
        return view ('user_template.checkout');
    }
    public function UserProfile(){
        return view ('user_template.userprofile');
    }
    public function TodaysDeal(){
        return view ('user_template.todaysdeal');
    }
    public function NewRelease(){
        return view ('user_template.newrelease');
    }
    public function CustomerService(){
        return view ('user_template.customerservice');
    }

}
