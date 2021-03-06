<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Category;
use Session;
use App\Order;
use DB;
use Auth;

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
    	Session::flash('deletemessage', "item deleted successfully!");
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
    	Session::flash('successmessage', 'item updated successfully!');
    	return redirect('/menu/'.$id); // returns to itemdetails
    }

    //cart
    public function addToCart($id, Request $request){
    	//if cart has an item already
    	if (Session::has("cart")) {
    		$cart = Session::get("cart");
    	}else{
    		$cart = []; //if none, initialixe cart || this array is for cart to add items on it	
    	}

    	// if item on cart is alreay set
    	if (isset($cart[$id])) {
    		$cart[$id] += $request->quantity; // this will only add the quantity on the existing item
    	}else{
    		$cart[$id] = $request->quantity; //this will create the item on the cart and quantity
    	}


        // Session::forget("cart");
    	Session::put("cart", $cart);
    	
    	return redirect('/catalog');

    }

    public function showCart(){


    	$item_cart = []; //where to push all the content of the session cart

    	if (Session::has('cart')) {
    		$cart = Session::get('cart');
    		$total = 0;
    		foreach ($cart as $id => $quantity) {
    			$item = Item::find($id); //item id from the session cart
    			$item->quantity = $quantity;
    			$item->subtotal = $item->price * $quantity;
    			$total += $item->subtotal;
    			$item_cart[] = $item; // that has the id, name, description, price, img_path, category, and quantity and subtotal
    			// dd($item_cart);
            }
            
        }
    		return view('items.cart_content', compact('item_cart', 'total'));
    }

    public function deletecart($id){
        session::forget("cart.$id"); //$cart[$id]
        return redirect('/showcart');
    }

    public function clearcart(){
        session::forget('cart');
        return redirect('/catalog');
    }

    public function updatecart($id, Request $request){
        $cart = session::get('cart'); //get all the items in cart
        $cart[$id]= $request->newquantity;
        session::put('cart', $cart);
        return redirect('/showcart');
        // $cart->
        // dd($cart);
    }

    public function checkout(){
        $order = new Order;
        $order->user_id = Auth::user()->id; // where to get the id of the user and the user must be login
        $order->status_id = 1;
        $order->total = 0;
        $order->save();

        $cartitems = session::get('cart');
        $total = 0;
        foreach ($cartitems as $item_id => $quantity) {
            // $order_id = DB::table('orders')->orderBy('created_at', 'desc')->first();
            // $item_orders = DB::table('item_orders')->insert(['item_id' => $item_id, 'order_id' => $order_id->id, 'quantity' => $quantity]);

        $order->items()->attach($item_id,['quantity' => $quantity]);

        $item = Item::find($item_id);     
        $total += $item->price * $quantity;
        }

        $ordertotal = Order::find($order->id);
        $ordertotal->total = $total;
        $ordertotal->save();

        return redirect('catalog');
    }

    public function transaction(){
        $orders = Order::all();
        return view('items.transaction', compact('orders'));
    }
}
	