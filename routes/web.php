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
    return "<small>hello world</small>";
});
	//greet person
	// Route::get('/sample', "SampleController@greetPerson");
	//fruits
	// Route::get('/fruits', "SampleController@nameofFruits");

	Route::get('/catalog', "ItemController@showItems");

	// route::get('/menu/add', function(){
	// 	return view('items.add_items');
	// });
	route::get('/menu/add', 'ItemController@showAdditemForm');

	route::post('/menu/add', 'ItemController@saveItems');
	
	route::get('/menu/{id}', 'ItemController@itemDetails');

	route::delete('/menu/{id}/delete', 'ItemController@deleteItem');

	route::get('/menu/{id}/edit', 'ItemController@showEditForm');

	route::put('/menu/{id}/edit', 'ItemController@updateItem');

