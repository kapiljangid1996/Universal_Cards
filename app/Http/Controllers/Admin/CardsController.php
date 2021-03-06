<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Card;
use App\Models\CardImage;
use App\Models\CardCategory;
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
        $dataCategory = array();
        $cardCategory = CardCategory::where('card_id', $id)->get();
        foreach ($cardCategory as $key => $value) {
            $dataCategory[] = $value['category_id'];
        }
        $data = CardImage::where('card_id', $id)->get();
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.card-manager.edit')->with('cards',$cards)->with('data', $data)->with('categories',$categories)->with('dataCategory',$dataCategory);
    }

    public function update(Request $request, $id)
    {
        $cards = Card::editCard($request,$id);
        return redirect()->route('cards.index')->with('success','Card updated successfully!');
    }

    public function destroy($id)
    {
        $cards = Card::findOrFail($id);
        $cardCategory = CardCategory::where('card_id', $id)->delete();
        $images = CardImage::where('card_id', $id)->get();
        foreach ($images as $key => $value) {
            if (!empty($value->image)) {
                unlink(public_path('Uploads/Card/Gallary/') . $value->image);
            }
            $value->delete();
        }
        $cards->delete();
        return redirect()->route('cards.index')->with('success','Custom page deleted successfully!');
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
