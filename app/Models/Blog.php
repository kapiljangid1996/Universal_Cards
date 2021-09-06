<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = ['author', 'description', 'image', 'sort_order', 'status', 'meta_name', 'meta_keyword', 'meta_description'];

    public static function storeBlog($request)
    {
        $request->validate([
            'author'  => 'required|min:2|max:255|string',
            'image'  => 'sometimes|nullable',
            'description'  => 'sometimes|nullable|min:3',
            'meta_name'  => 'sometimes|nullable|min:3|max:255|string',
            'meta_keyword'  => 'sometimes|nullable|min:3',
            'meta_description'  => 'sometimes|nullable|min:3',
        ]);

        $blogs = new Blog();
        $blogs -> author = request('author');
        $blogs -> description = request('description');
        $blogs -> meta_name = request('meta_name');
        $blogs -> meta_keyword = request('meta_keyword');
        $blogs -> meta_description = request('meta_description');
        $blogs -> sort_order = request('sort_order');
        $blogs -> status = (isset($request['status']))?1:0;

        if (request()->file('image')){
            $imageName =$request->get('slug')."-".request()->image->getClientOriginalName();
            request()->image->move(public_path('Uploads/Blog'), $imageName); 
            $blogs->image = $imageName;
        }
        $blogs->save();
    }

    public static function editBlog($request,$id)
    {
        $request->validate([
            'author'  => 'required|min:2|max:255|string',
            'image'  => 'sometimes|nullable',
            'description'  => 'sometimes|nullable|min:3',
            'meta_name'  => 'sometimes|nullable|min:3|max:255|string',
            'meta_keyword'  => 'sometimes|nullable|min:3',
            'meta_description'  => 'sometimes|nullable|min:3',
        ]);

        $blogs = Blog::find($id);
        $blogs -> author = $request->input('author');
        $blogs -> description = $request->input('description');
        $blogs -> meta_name = $request->input('meta_name');
        $blogs -> meta_keyword = $request->input('meta_keyword');
        $blogs -> meta_description = $request->input('meta_description');
        $blogs -> sort_order = $request->input('sort_order');
        $blogs -> status = (isset($request['status']))?1:0;
        $old_image = $request->input('old_image');

        if ($request->file('image')){
            if(!empty($old_image)){
                unlink(public_path("Uploads/Blog/{$old_image}"));
            }
            $slug = $request->get('slug');
            $imageName =$slug.'-'.request()->image->getClientOriginalName();
            request()->image->move(public_path('Uploads/Blog'), $imageName); 
            $blogs->image = $imageName;
        }

        $blogs->save();
    }
}
