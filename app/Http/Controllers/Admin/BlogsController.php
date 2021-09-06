<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use File;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index')->with('blogs', $blogs);
    }

    public function create()
    {
        return view('admin.blog.add');
    }

    public function store(Request $request)
    {
        $blogs = Blog::storeBlog($request);
        return redirect()->route('blogs.index')->with('success','Blog created successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $blogs = Blog::find($id);
        return view('admin.blog.edit')->with('blogs', $blogs);
    }

    public function update(Request $request, $id)
    {
        $blogs = Blog::editBlog($request,$id);
        return redirect()->route('blogs.index')->with('success','Blog updated successfully!');
    }

    public function destroy($id)
    {
        $blogs = Blog::findOrFail($id);
        if(!empty($blogs) && !empty($blogs['image'])){
            $files = array("public/Uploads/Blog/".$blogs['image']);
            File::delete($files);
        }
        $blogs->delete();
        return redirect()->route('blogs.index')->with('success','Blog deleted successfully!');
    }
}
