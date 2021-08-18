<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use File;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index')->with('categories',$categories);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.category.add')->with('categories',$categories);;
    }

    public function store(Request $request)
    {
        $categories = Category::storeCategory($request);
        return redirect()->route('category.index')->with('success','Category created successfully!');
    }

    public function edit($id)
    {
        $categories = Category::find($id);
        $parent_categories = Category::all();
        return view('admin.category.edit')->with('categories',$categories)->with('parent_categories',$parent_categories);
    }

    public function update(Request $request, $id)
    {
        $categories = Category::editCategory($request,$id);
        return redirect()->route('category.index')->with('success','Category Updated!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if(!empty($category) && !empty($category['image'])){
            $files = array("public/Uploads/Category/".$category['image']);
            File::delete($files);
        }
        $child = Category::where("parent_id", $id)->delete();
        if(!empty($child) && !empty($child['image'])){
            $files = array("public/Uploads/Category/".$child['image']);
            File::delete($files);
        }
        $category->delete();
        return redirect()->route('category.index')->with('success','Category Deleted!');
    }
}
