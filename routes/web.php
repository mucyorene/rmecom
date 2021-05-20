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

Route::get('/user/{id}/{names}', function ($id,$name) {
    return 'Hello this one is an id of someone '.$id.'And his name is '.$name;
*/
 
Route::get('/', 'CategoriesController@index');
Route::post('/catPost','CategoriesController@store');
Route::get('/create','CategoriesController@create');
Route::get('/editCat.{id}','CategoriesController@edit');
Route::post('/catUpdate.{id}','CategoriesController@update');
Route::get('/deleteCategory/{id}','CategoriesController@destroy');
Route::get('/allCategories', 'DashboardController@index');

// products routes

Route::get('/allProducts','ProductController@index');
Route::post('/postProduct','ProductController@store');
Route::get('/createProduct','ProductController@create');
Route::get('/editProduct.{id}','ProductController@edit');
Route::post('/updateProduct.{id}','ProductController@update');
Route::get('/destroyProduct/{id}','ProductController@destroy');

//Slider routes

Route::get('/allSlider','sliderController@index');
Route::get('/createSlider','sliderController@create');
Route::post('/postSlider','sliderController@store');
Route::get('/editSlider.{id}','sliderController@edit');
Route::post('/updateSlider.{id}','sliderController@update');
Route::get('/destroySlider/{id}','sliderController@destroy');

// Route::get('/about', 'pagescontroller@about');
// Route::get('/firstpage', 'pagescontroller@first');
// Route::get('/services', 'pagescontroller@services');
// Route::resource('posts','PostController');
//Route::resource('/students','StudentController');
/*Route::get('/user/{id}/{name}',function($id,$name){
	return 'You typed name <br />'.$id.'With name of: <br />'.$name;
});*/
Route::get('/user','userConstroller@user');
Auth::routes();

Route::get('/Dashboard', 'DashboardController@index');