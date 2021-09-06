<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use File;

class TestimonialsController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonial.index')->with('testimonials', $testimonials);
    }

    public function create()
    {
        return view('admin.testimonial.add');
    }

    public function store(Request $request)
    {
        $testimonials = Testimonial::storeTestimonial($request);
        return redirect()->route('testimonials.index')->with('success','Testimonial created successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $testimonials = Testimonial::find($id);
        return view('admin.testimonial.edit')->with('testimonials', $testimonials);
    }

    public function update(Request $request, $id)
    {
        $testimonials = Testimonial::editTestimonial($request,$id);
        return redirect()->route('testimonials.index')->with('success','Testimonial updated successfully!');
    }

    public function destroy($id)
    {
        $testimonials = Testimonial::findOrFail($id);
        if(!empty($testimonials) && !empty($testimonials['image'])){
            $files = array("public/Uploads/Testimonial/".$testimonials['image']);
            File::delete($files);
        }
        $testimonials->delete();
        return redirect()->route('testimonials.index')->with('success','Testimonial deleted successfully!');
    }
}
