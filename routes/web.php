<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

	route::middleware('auth')->group(function(){
		//routes
		Route::get('/catalog', "ItemController@showItems");
		//route to show the cart
		route::get('/showcart', 'ItemController@showCart');
	});

	//greet person
	// Route::get('/sample', "SampleController@greetPerson");
	//fruits
	// Route::get('/fruits', "SampleController@nameofFruits");

	

	// route::get('/menu/add', function(){
	// 	return view('items.add_items');
	// });
	route::get('/menu/add', 'ItemController@showAdditemForm');

	route::post('/menu/add', 'ItemController@saveItems');
	
	route::get('/menu/{id}', 'ItemController@itemDetails');

	route::delete('/menu/{id}/delete', 'ItemController@deleteItem');

	route::get('/menu/{id}/edit', 'ItemController@showEditForm');

	route::put('/menu/{id}/edit', 'ItemController@updateItem');

	//route for add to cart
	route::post('/addToCart/{id}', 'ItemController@addToCart');
	
	
	
	//route to the function delete cart
	route::delete('/menu/mycart/{id}/delete', 'ItemController@deletecart');
	
	//route to the function to clear the cart
	route::post('/menu/clearcart', 'ItemController@clearcart');
	
	//route to update the item quantity
	route::patch('/menu/mycart/{id}/updatecart', 'ItemController@updatecart');
	
	//route to update the item
	route::put('/menu/{id}', 'ItemController@updateitem');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

