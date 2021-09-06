<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Card;
use App\Models\Testimonial;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->orderBy('sort_order', 'ASC')->get();
        $categories = Category::where('parent_id', NULL)->take(6)->get();
        $cards = Card::with('category_detail')->with('cardImages')->get();
        $testimonials = Testimonial::where('status', 1)->orderBy('sort_order', 'ASC')->get();
        $blogs = Blog::where('status', 1)->orderBy('sort_order', 'ASC')->get();
        return view('front.index')->with('sliders', $sliders)->with('categories', $categories)->with('cards', $cards)->with('testimonials', $testimonials)->with('blogs', $blogs);
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
                    $response .= '<div class="product-details-des">';    
                        $response .= '<div class="manufacturer-name mb-2">';    
                            $response .= '<a href="javascript:void(0)"><h3 class="product-name">'.$cards[0]->card_code.'</h3> <span>'.$cards[0]->category_detail->name.'</span></a>';        
                        $response .= '</div>'; 

                        $response .= '<div class="ratings d-flex">';
                            $response .= '<span><i class="fa fa-star-o"></i></span>';
                            $response .= '<span><i class="fa fa-star-o"></i></span>';
                            $response .= '<span><i class="fa fa-star-o"></i></span>';
                            $response .= '<span><i class="fa fa-star-o"></i></span>';
                            $response .= '<span><i class="fa fa-star-o"></i></span>';
                            $response .= '<div class="pro-review">';
                                $response .= '<span>1 Reviews</span>';
                            $response .= '</div>';
                        $response .= '</div>';

                        $response .= '<div class="price-box">';  
                            $response .= '<span>Price - &nbsp; ₹ '.$cards[0]->price.'</span>';              
                        $response .= '</div>'; 

                        $response .= '<p class="price-old pl-0">Sample Price - &nbsp; ₹ '.$cards[0]->sample_price.'</p>';

                        $response .= '<p class="pl-0">Size - &nbsp; '.$cards[0]->width.' * '.$cards[0]->height.'</p>';

                        $response .= '<p class="pl-0">Orientation -  &nbsp; '.$cards[0]->orientation.'</p><hr>';

                        $response .= '<p class="pro-desc">'.$cards[0]->description.'</p><hr>'; 

                        $response .= '<div class="quantity-cart-box d-flex align-items-center">';    
                            $response .= '<h6 class="option-title">qty:</h6>';
                            $response .= '<div class="quantity">';
                                $response .= '<div class="pro-qty"><input type="text" value="1"></div>';
                            $response .= '</div>';
                            $response .= '<div class="action_link">';
                                $response .= '<a class="btn btn-cart2" href="#">Add to cart</a>';
                            $response .= '</div>';
                        $response .= '</div>'; 

                        $response .= '<div class="useful-links">';
                            $response .= '<a href="#" data-toggle="tooltip" title="Compare"><i class="pe-7s-refresh-2"></i>compare</a>';
                            $response .= '<a href="#" data-toggle="tooltip" title="Wishlist"><i class="pe-7s-like"></i>wishlist</a>';
                        $response .= '</div>';

                        $response .= '<div class="like-icon">';
                        $response .= '<a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>';
                        $response .= '<a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>';
                        $response .= '<a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>';
                        $response .= '<a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>';
                        $response .= '</div>';
                    $response .= '</div>';            
                $response .= '</div>';            
            $response .= '</div>';        
        $response .= '</div>';
        echo $response;
        exit;
    }
}
