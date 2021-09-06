<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $table = 'testimonials';

    protected $fillable = ['author', 'description', 'image', 'rating', 'sort_order', 'status', 'meta_name', 'meta_keyword', 'meta_description'];

    public static function storeTestimonial($request)
    {
        $request->validate([
            'author'  => 'required|min:2|max:255|string',
            'image'  => 'sometimes|nullable',
            'description'  => 'sometimes|nullable|min:3',
            'rating'  => 'sometimes|nullable',
            'meta_name'  => 'sometimes|nullable|min:3|max:255|string',
            'meta_keyword'  => 'sometimes|nullable|min:3',
            'meta_description'  => 'sometimes|nullable|min:3',
        ]);

        $testimonials = new Testimonial();
        $testimonials -> author = request('author');
        $testimonials -> description = request('description');
        $testimonials -> rating = request('rating');
        $testimonials -> meta_name = request('meta_name');
        $testimonials -> meta_keyword = request('meta_keyword');
        $testimonials -> meta_description = request('meta_description');
        $testimonials -> sort_order = request('sort_order');
        $testimonials -> status = (isset($request['status']))?1:0;

        if (request()->file('image')){
            $imageName =$request->get('slug')."-".request()->image->getClientOriginalName();
            request()->image->move(public_path('Uploads/Testimonial'), $imageName); 
            $testimonials->image = $imageName;
        }
        $testimonials->save();
    }

    public static function editTestimonial($request,$id)
    {
        $request->validate([
            'author'  => 'required|min:2|max:255|string',
            'image'  => 'sometimes|nullable',
            'description'  => 'sometimes|nullable|min:3',
            'rating'  => 'sometimes|nullable',
            'meta_name'  => 'sometimes|nullable|min:3|max:255|string',
            'meta_keyword'  => 'sometimes|nullable|min:3',
            'meta_description'  => 'sometimes|nullable|min:3',
        ]);

        $testimonials = Testimonial::find($id);
        $testimonials -> author = $request->input('author');
        $testimonials -> description = $request->input('description');
        $testimonials -> rating = $request->input('rating');
        $testimonials -> meta_name = $request->input('meta_name');
        $testimonials -> meta_keyword = $request->input('meta_keyword');
        $testimonials -> meta_description = $request->input('meta_description');
        $testimonials -> sort_order = $request->input('sort_order');
        $testimonials -> status = (isset($request['status']))?1:0;
        $old_image = $request->input('old_image');

        if ($request->file('image')){
            if(!empty($old_image)){
                unlink(public_path("Uploads/Testimonial/{$old_image}"));
            }
            $slug = $request->get('slug');
            $imageName =$slug.'-'.request()->image->getClientOriginalName();
            request()->image->move(public_path('Uploads/Testimonial'), $imageName); 
            $testimonials->image = $imageName;
        }

        $testimonials->save();
    }
}
