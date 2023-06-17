<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function Index(){
        $allsubcategoires = Subcategory::latest()->get();
        return view('admin.allsubcategories', compact('allsubcategoires'));
    }
    public function AddSubCategory(){
        $categories = Category::latest()->get();
        return view('admin.addsubcategory', compact('categories'));
    }
    
    public function StoreSubCategory(Request $request){
         $request->validate([
            'subcategory_name' => 'required|unique:subcategories|max:255',
            'category_id'=> 'required'
        ]);
        $category_id = $request->category_id;
        $category_name = Category::where('id', $category_id)->value('category_name');
        Subcategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'slug'=>strtolower(str_replace(' ','-', $request->subcategory_name)),
            'category_id'=>$category_id,
            'category_name'=> $category_name
        ]);
        Category::where('id', $category_id)->increment('subcategory_count', 1);
        return redirect()->route('allsubcategories')->with('message', 'Sub Category added successfully!');
    }

    public function EditSubCat($id){
        $subcatinfo = SubCategory::findOrFail($id);
        return view('admin.editsubcat', compact('subcatinfo'));
    }

    public function UpdateSubCat(Request $request){
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories|max:255',
        ]);
        $subcatid = $request->subcatid;
        Subcategory::findOrFail($subcatid)->update([
            'subcategory_name' => $request->subcategory_name,
            'slug'=>strtolower(str_replace(' ','-', $request->subcategory_name)),
        ]);
        return redirect()->route('allsubcategories')->with('message', 'Sub Category updated successfully!'); 
    }

    public function DeleteSubCat($id){
        $cat_id = Subcategory::where('id', $id)->value('category_id');
        Subcategory::findOrFail($id)->delete();
        Category::where('id', $cat_id)->decrement('subcategory_count', 1);
        return redirect()->route('allsubcategories')->with('message', 'Sub Category Deleted successfully!'); 
    }
}
