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

Route::get('/', 'WelcomeController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Route Group Middleware Permission
Route::middleware(['auth'])->group(function() {
	Route::resource('user', 'UserController');
	Route::POST('user/{id}','UserController@updateRoles');
	Route::get('miperfil', 'UserController@miperfil');
	Route::resource('role', 'RoleController');
	Route::resource('product', 'ProductController');
	Route::resource('category', 'CategoryController');
	Route::resource('color', 'ColorController');
	Route::resource('size', 'SizeController');
	Route::resource('price', 'PriceController');
	Route::resource('material', 'MaterialController');
	//Rutas de generar los pdfs
		Route::get('product/pdf/{filtro}', 'ProductController@exportPdf');
		Route::get('category/pdf/{filtro}', 'CategoryController@exportPdf');
});


