<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Card;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->orderBy('sort_order', 'ASC')->get();
        $categories = Category::where('parent_id', NULL)->take(6)->get();
        $cards = Card::with('category_detail')->with('cardImages')->get();
        $testimonials = Testimonial::where('status', 1)->orderBy('sort_order', 'ASC')->get();
        return view('front.index')->with('sliders', $sliders)->with('categories', $categories)->with('cards', $cards)->with('testimonials', $testimonials);
    }

    public function getCardPopup(Request $request)
    {
        $cards = Card::with('category_detail')->with('cardImages')->where('id', $request->custId)->get();
        $response = '<div class="product-details-inner">';            
            $response .= '<div class="row">';                
                $response .= '<div class="col-lg-5">';                    
                    $response .= '<div class="product-large-slider">';                        
                        foreach($cards[0]['cardImages'] as $key => $cardImg){
                            if (!empty($cardImg->image_type)) {
                                $response .= '<div class="pro-large-img img-zoom">';  
                                    $response .= '<img src="'. asset('Uploads/Card/Gallary')."/" .$cardImg->image.'" alt="'.$cardImg->image_caption.'">';                               
                                $response .= '</div>';
                            }
                        }                    
                    $response .= '</div>';
                    $response .= '<div class="pro-nav slick-row-10 slick-arrow-style">';
                        foreach($cards[0]['cardImages'] as $key => $cardImg){
                            if (!empty($cardImg->image_type)) {
                                $response .= '<div class="pro-nav-thumb">';  
                                    $response .= '<img src="'. asset('Uploads/Card/Gallary')."/" .$cardImg->image.'" alt="'.$cardImg->image_caption.'">';                               
                                $response .= '</div>';
                            }
                        }
                    $response .= '</div>';                
                $response .= '</div>';                
                $response .= '<div class="col-lg-7">';                
                $response .= '</div>';            
            $response .= '</div>';        
        $response .= '</div>';
        echo $response;
        exit;
    }
}
