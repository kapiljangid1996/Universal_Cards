<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $table = 'cards';

    protected $fillable = ['card_code', 'height', 'width', 'weight', 'price', 'sample_price', 'orientation', 'card_color', 'description', 'extra_info', 'pattern', 'order_qty', 'included', 'available_extra_insert', 'material', 'youtube_link', 'more_information', 'meta_name', 'meta_keyword', 'meta_description', 'wedding_invitations', 'designer_collection', 'trending_now', 'shipping_free'];

    public function category_detail()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function cardImages()
    {
        return $this->hasMany('App\Models\CardImage');
    }

    public function cardCategories()
    {
        return $this->hasMany('App\Models\CardCategory');
    }

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
        $cards -> designer_collection = (isset($request['designer_collection']))?1:0;
        $cards -> wedding_invitations = (isset($request['wedding_invitations']))?1:0;
        $cards -> trending_now = (isset($request['trending_now']))?1:0;
        $cards -> shipping_free = (isset($request['shipping_free']))?1:0;

        $cards->save();

        $lastInsertedId = $cards->id;
        $lastInsertedCardCode = $cards->card_code;

        if (!empty($request->addmore[0]['image_caption'])) {
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

        if (!empty($request->category_id)) {
            foreach ($request->category_id as $val) {
                $data2 = new CardCategory();
                $data2 -> category_id = $val;
                $data2 -> card_code = $lastInsertedCardCode;
                $data2 -> card_id = $lastInsertedId;
                $data2 -> save();
            }
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
        $cards -> designer_collection = (isset($request['designer_collection']))?1:0;
        $cards -> wedding_invitations = (isset($request['wedding_invitations']))?1:0;
        $cards -> trending_now = (isset($request['trending_now']))?1:0;
        $cards -> shipping_free = (isset($request['shipping_free']))?1:0;

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
