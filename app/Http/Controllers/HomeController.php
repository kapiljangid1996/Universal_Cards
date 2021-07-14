<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->orderBy('sort_order', 'ASC')->get();
        return view('front.index')->with('sliders', $sliders);
    }
}
