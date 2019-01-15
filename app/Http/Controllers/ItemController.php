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

}
