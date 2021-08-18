<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $table = 'cards';

    protected $fillable = ['card_code', 'height', 'width', 'weight', 'price', 'sample_price', 'orientation', 'card_color', 'description', 'extra_info', 'pattern', 'order_qty', 'included', 'available_extra_insert', 'material', 'youtube_link', 'more_information', 'meta_name', 'meta_keyword', 'meta_description', 'wedding_invite_image', 'designer_image', 'trending_now', 'shipping_free'];

    public static function storeCard($request){
        $cards = new Card();
        $cards -> card_code = request('card_code');
        $cards -> height = request('height');
        $cards -> width = request('width');
        $cards -> weight = request('weight');
        $cards -> price = request('price');
        $cards -> sample_price = request('sample_price');
        $cards -> orientation = request('orientation');
        $cards -> card_color = request('card_color');
        $cards -> description = request('description');
        $cards -> extra_info = (isset($request['extra_info']))?1:0;
        $cards -> pattern = request('pattern');
        $cards -> order_qty = request('order_qty');
        $cards -> included = request('included');
        $cards -> available_extra_insert = request('available_extra_insert');
        $cards -> material = request('material');
        $cards -> youtube_link = request('youtube_link');
        $cards -> more_information = request('more_information');
        $cards -> meta_name = request('meta_name');
        $cards -> meta_keyword = request('meta_keyword');
        $cards -> meta_description = request('meta_description');
        $cards -> trending_now = (isset($request['trending_now']))?1:0;
        $cards -> shipping_free = (isset($request['shipping_free']))?1:0;

        if (request()->file('wedding_invite_image')){
            $wedInviteImage =$request->get('card_code')."-".request()->wedding_invite_image->getClientOriginalName();
            request()->wedding_invite_image->move(public_path('Uploads/Card/Wedding-Invite-Image'), $wedInviteImage); 
            $cards->wedding_invite_image = $wedInviteImage;
        }

        if (request()->file('designer_image')){
            $designerImage =$request->get('card_code')."-".request()->designer_image->getClientOriginalName();
            request()->designer_image->move(public_path('Uploads/Card/Designer-Image'), $designerImage); 
            $cards->designer_image = $designerImage;
        }

        $cards->save();

        $lastInsertedId = $cards->id;

        foreach ($request->addmore as $key => $value) {
            $data = new CardImage();
            $data -> card_id = $lastInsertedId;
            $data -> image_type = $value['image_type'];
            $data -> image_caption = $value['image_caption'];
            
            if (!empty($value['image_type'])){
                $imageName = time()."-".$value['image_type']."-".$value['image']->getClientOriginalName();
                $value['image']->move(public_path('Uploads/Card/Gallary'), $imageName);
                $data -> image = $imageName;
            }
            $data->save();
        }
    }

    public static function editCard($request,$id)
    {
        $cards = Card::find($id);
        $cards -> card_code = request('card_code');
        $cards -> height = request('height');
        $cards -> width = request('width');
        $cards -> weight = request('weight');
        $cards -> price = request('price');
        $cards -> sample_price = request('sample_price');
        $cards -> orientation = request('orientation');
        $cards -> card_color = request('card_color');
        $cards -> description = request('description');
        $cards -> extra_info = (isset($request['extra_info']))?1:0;
        $cards -> pattern = request('pattern');
        $cards -> order_qty = request('order_qty');
        $cards -> included = request('included');
        $cards -> available_extra_insert = request('available_extra_insert');
        $cards -> material = request('material');
        $cards -> youtube_link = request('youtube_link');
        $cards -> more_information = request('more_information');
        $cards -> meta_name = request('meta_name');
        $cards -> meta_keyword = request('meta_keyword');
        $cards -> meta_description = request('meta_description');
        $cards -> trending_now = (isset($request['trending_now']))?1:0;
        $cards -> shipping_free = (isset($request['shipping_free']))?1:0;

        $old_designer_image = $request->input('old_designer_image');

        $old_wedding_invite_image = $request->input('old_wedding_invite_image');

        if (request()->file('wedding_invite_image')){
            if(!empty($old_wedding_invite_image)){
                unlink(public_path("Uploads/Card/Wedding-Invite-Image/{$old_wedding_invite_image}"));
            }
            $wedInviteImage =$request->get('card_code')."-".request()->wedding_invite_image->getClientOriginalName();
            request()->wedding_invite_image->move(public_path('Uploads/Card/Wedding-Invite-Image'), $wedInviteImage); 
            $cards->wedding_invite_image = $wedInviteImage;
        }

        if (request()->file('designer_image')){
            if(!empty($old_designer_image)){
                unlink(public_path("Uploads/Card/Designer-Image/{$old_designer_image}"));
            }
            $designerImage =$request->get('card_code')."-".request()->designer_image->getClientOriginalName();
            request()->designer_image->move(public_path('Uploads/Card/Designer-Image'), $designerImage); 
            $cards->designer_image = $designerImage;
        }

        $cards->save();        

        foreach ($request->addmore as $key => $value) {

            if (isset($value['image_id']) && !empty($value['image_id']) && isset($value['image']) && !empty($value['image']) ) {
                $deleteCardImage = CardImage::where('card_id', $id)->where('id', $value['image_id'])->get();
        
                foreach ($deleteCardImage as $key => $val) {
                    if (!empty($val->image)) {
                        unlink(public_path('Uploads/Card/Gallary/') . $val->image);
                       
                    }
                      $val->delete();           
                }
            }

            if(isset($value['image']) && !empty($value['image'])){
                $data = new CardImage();
                $data -> card_id = $id;
                $data -> image_type = $value['image_type'];
                $data -> image_caption = $value['image_caption'];
                
                if (!empty($value['image'])){
                    $imageName = time()."-".$value['image_type']."-".$value['image']->getClientOriginalName();
                    $value['image']->move(public_path('Uploads/Card/Gallary'), $imageName);
                    $data -> image = $imageName;
                }

                $data->save();
            }
           
        }
    }
}
