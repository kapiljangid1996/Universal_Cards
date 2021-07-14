<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use File;

class SlidersController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index')->with('sliders', $sliders);
    }

    public function create()
    {
        return view('admin.slider.add');
    }

    public function store(Request $request)
    {
        $sliders = Slider::storeSlider($request);
        return redirect()->route('sliders.index')->with('success','Slider created successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $sliders = Slider::find($id);
        return view('admin.slider.edit')->with('sliders',$sliders);
    }

    public function update(Request $request, $id)
    {
        $sliders = Slider::editSlider($request,$id);
        return redirect()->route('sliders.index')->with('success','Slider updated successfully!');
    }

    public function destroy($id)
    {
        $sliders = Slider::findOrFail($id);
        if(!empty($sliders) && !empty($sliders['image'])){
            $files = array("public/Uploads/Slider/".$sliders['image']);
            File::delete($files);
        }
        $sliders->delete();
        return redirect()->route('sliders.index')->with('success','Slider deleted successfully!');
    }
}
