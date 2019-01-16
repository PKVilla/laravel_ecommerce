<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Category;

class ItemController extends Controller
{
    public function showItems(){
    	$categories = Category::all();
    	$items = Item::all();
    	return view('items/catalog', compact('items', 'categories'));
    }
    public function itemDetails($id){
    	$itemdetails = Item::find($id);
    	// dd($itemdetails);
    	return view('items.item_details', compact('itemdetails'));
    }

    public function showAdditemForm(){
		return view('items.add_items');    	  
    }

    public function  saveItems(request $request){
    	$rules = array(
    		"itemname" => "required",
    		"itemdescription" => "required",
    		"itemprice" => "required|numeric",
    		"itemimg_path" => "required|image|mimes:jpeg, jpg, png, gif, svg| max:2048"
    		);
    	//to validate $request form
    	$this->validate($request, $rules);

    	$item = new Item;
    	$item->name = $request->itemname;
    	$item->description = $request->itemdescription;
    	$item->price = $request->itemprice;
    	$item->category_id = 1;

    	$image = $request->file('itemimg_path');
    	$image_name = time().".".$image->getClientOriginalExtension(); /*will get the original name and connect it with the current time*/
    	$destination = "images/";/*file destination folder*/
    	$image->move($destination, $image_name);
    	
    	$item->img_path = $destination.$image_name;
    	$item->save();
  		// return view('items/catalog');
    }
}
	