<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Card;
use App\Models\CardImage;
use File;

class CardsController extends Controller
{
    public function index()
    {
        $cards = Card::all();
        return view('admin.card-manager.index')->with('cards', $cards);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.card-manager.add')->with('categories', $categories);
    }

    public function show($id)
    {
        //
    }

    public function store(Request $request)
    {
        $cards = Card::storeCard($request);
        return redirect()->route('cards.index')->with('success','Card created successfully!');
    }

    public function edit($id)
    {
        $cards = Card::find($id);
        $data = CardImage::where('card_id', $id)->get();
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.card-manager.edit')->with('cards',$cards)->with('data', $data)->with('categories',$categories);
    }

    public function update(Request $request, $id)
    {
        $cards = Card::editCard($request,$id);
        return redirect()->route('cards.index')->with('success','Card updated successfully!');
    }

    public function destroy($id)
    {
        $cards = Card::findOrFail($id);
        if(!empty($cards) && !empty($cards['designer_image']) && !empty($cards['wedding_invite_image'])){
            $files = array("public/Uploads/Card/Designer-Image/".$cards['designer_image'], "public/Uploads/Card/Wedding-Invite-Image/".$cards['wedding_invite_image']);
            File::delete($files);
        }
        $images = CardImage::where('card_id', $id)->get();
        foreach ($images as $key => $value) {
            if (!empty($value->image)) {
                unlink(public_path('Uploads/Card/Gallary/') . $value->image);
            }
            $value->delete();
        }
        $cards->delete();
        return redirect()->route('page-builder.index')->with('success','Custom page deleted successfully!');
    }

    public function removeCardImage($id)
    {
        $images = CardImage::findOrFail($id);
        if (!empty($images->image)) {
            unlink(public_path('Uploads/Card/Gallary/') . $images->image);
        }        
        $images->delete();
        echo "Image Deleted Successfully";
    }
}
