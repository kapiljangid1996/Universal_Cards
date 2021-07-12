<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';

    protected $fillable = ['title','menu_key','heading','status'];

    public static function storeMenu($request){
        $menus = new Menu(); 
        $menus -> title = request('title');
        $menus -> menu_key = !empty($request->menu_key) ? Str::slug(trim($request->menu_key), '-') : Str::slug(trim($request->title), '-');
        $menus -> heading = request('heading');
        $menus -> status = (isset($request['status']))?1:0;
        $menus->save();
    }

    public static function editMenu($request){
        $menus = Menu::find($request->id);
        $menus -> title = $request->title;
        $menus -> menu_key = !empty($request->menu_key) ? Str::slug(trim($request->menu_key), '-') : Str::slug(trim($request->title), '-');
        $menus -> heading = $request->heading;
        $menus -> status = (isset($request->status))?1:0;
        $menus->save();;
    }

}