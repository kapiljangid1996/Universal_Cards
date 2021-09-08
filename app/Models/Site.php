<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $table = 'sites';

    protected $fillable = ['title', 'logo', 'slogan', 'phone_number', 'email_address', 'address', 'youtube', 'facebook', 'instagram', 'twitter', 'footer_about', 'footer_text' , 'meta_name', 'meta_keyword', 'meta_description', 'google_analyst'];

    public static function editSetting($request,$id)
    {
        $request->validate([
            'title'  => 'required|min:5|max:255|string',
            'logo'  => 'sometimes|nullable',
            'slogan'  => 'sometimes|nullable',
            'phone_number' => 'sometimes|nullable',
            'email_address' => 'sometimes|nullable',
            'address'  => 'required|min:3',
            'youtube'  => 'sometimes|nullable',
            'facebook'  => 'sometimes|nullable',
            'instagram'  => 'sometimes|nullable',
            'twitter'  => 'sometimes|nullable',
            'footer_about'  => 'sometimes|nullable|min:3',
            'footer_text'  => 'required|min:3',
            'meta_name'  => 'sometimes|nullable',
            'meta_keyword'  => 'sometimes|nullable',
            'meta_description'  => 'sometimes|nullable',
            'google_analyst'  => 'sometimes|nullable',
        ]);
        $setting = Site::find($id);
        $setting -> title = $request->input('title');
        $setting -> slogan = $request->input('slogan');
        $setting -> phone_number = $request->input('phone_number');
        $setting -> email_address = $request->input('email_address');
        $setting -> address = $request->input('address');
        $setting -> youtube = $request->input('youtube');
        $setting -> facebook = $request->input('facebook');
        $setting -> instagram = $request->input('instagram');
        $setting -> twitter = $request->input('twitter');
        $setting -> footer_about = $request->input('footer_about');
        $setting -> footer_text = $request->input('footer_text');
        $setting -> meta_name = $request->input('meta_name');
        $setting -> meta_description = $request->input('meta_description');
        $setting -> meta_keyword = $request->input('meta_keyword');
        $setting -> google_analyst = $request->input('google_analyst');
        $old_logo = $request->input('old_logo');

        if ($request->file('logo'))
        {
            if(!empty($old_logo))
            {
                unlink(public_path("Uploads/Site/{$old_logo}"));
            }
            $title = $request->get('title');
            $imageName =$title.'-'.request()->logo->getClientOriginalName();
            request()->logo->move(public_path('Uploads/Site'), $imageName); 
            $setting->logo = $imageName;
        }
        $setting->save();
    }
}
