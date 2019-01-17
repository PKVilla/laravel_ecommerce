<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Category;
use Session;

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
    	//input fields taht needs to be validated
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

    	//upload image
    	$image = $request->file('itemimg_path');
    	$image_name = time().".".$image->getClientOriginalExtension(); /*will get the original name and connect it with the current time*/
    	$destination = "images/";/*file destination folder*/
    	$image->move($destination, $image_name);
    	
    	$item->img_path = $destination.$image_name;
    	$item->save();
    	Session::flash('successmessage', 'Successfully added');
  		return redirect('/catalog');
    }

    public function deleteItem($id){
    	$itemdelete = Item::find($id);
    	$itemdelete->delete();
    	return redirect('/catalog');
    }

    public function showEditForm($id){
    	$itemedit = Item::find($id);
    	$categories = Category::all();
    	return view('items.edit_form', compact('itemedit', 'categories'));	
    }

    public function updateItem($id, request $request){
    	$itemupdate = Item::find($id);
    	
    	//validation
    	$rules = array(
    		"name" => "required",
    		"description" => "required",
    		"price" => "required|numeric",
    		"categories" => "required",
    		"image_path" => "image|mimes:jpeg, jpg, png, gif, svg| max:2048"
    		);
    	$this->validate($request, $rules);

    	$itemupdate->name = $request->name;
    	$itemupdate->description = $request->description;
    	$itemupdate->price = $request->price;
    	$itemupdate->category_id = $request->categories;
    	
    	if ($request->file('image_path')!=null) {
	    	$image = $request->file('image_path');
	    	$image_name = time().".".$image->getClientOriginalExtension();
	    	$destination = "images/";
	    	$image->move($destination, $image_name);
	    	$itemupdate->img_path = $destination.$image_name;
    	}
    	
    	$itemupdate->save();

    	return redirect('/menu/'.$id); // returns to itemdetails
    }
}
	