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

    public function getCardPopup(Request $request)
    {
        $cards = Card::with('category_detail')->with('cardImages')->where('id', $request->custId)->get();
        $response = '<div class="product-details-inner">';
            $response .= '<div class="row">';
                $response .= '<div class="col-lg-5">';
                    $response .= '<div class="product-large-slider">';
                        $response .= '<div class="pro-large-img img-zoom">';

                            foreach($cards[0]['cardImages'] as $key => $cardImg){
                                if (!empty($cardImg->image_type) && $cardImg->image_type == 'main_view') {
                                    $response .= '<img src="'. asset('Uploads/Card/Gallary')."/" .$cardImg->image.'" alt="'.$cardImg->image_caption.'">';
                                }
                            }                                
                            
                        $response .= '</div>';
                    $response .= '</div>';
                $response .= '</div>';
            $response .= '</div>';
        $response .= '</div>';
        echo $response;
        exit;
    }
}
