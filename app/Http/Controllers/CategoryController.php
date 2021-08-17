<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $category = new Category();
            $category->title = $data['title'];
            $category->description = $data['description'];
            $category->save();
            return redirect('/category/add')->with('flash_message_success','Category Added Successfully!!');
        }
        return view('admin.categories.add_category');
    }
    public function viewCategory()
    {
        $categories = Category::all();
        return view('admin.categories.view_categories',compact('categories'));
    }
    public function editCategory(Request $request ,$id)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            Category::where('id',$id)->update(['title'=>$data['title'],'description'=>$data['description']]);
            return redirect('/category/view')->with('flash_message_success','Category Updated Successfully!!');
        }
        $category = Category::where('id',$id)->first();
        return view('admin.categories.edit_category',compact('category'));
    }
    public function deleteCategory($id)
    {
        Category::where('id',$id)->delete();
        return redirect('/category/view')->with('flash_message_error','Category Deleted Successfully!!');
    }
}
