<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Card;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->orderBy('sort_order', 'ASC')->get();
        $categories = Category::where('parent_id', NULL)->take(6)->get();
        $cards = Card::with('category_detail')->with('cardImages')->get();
        return view('front.index')->with('sliders', $sliders)->with('categories', $categories)->with('cards', $cards);
    }
}
