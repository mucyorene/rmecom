<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Categories
Route::get('categories','api\CategoryController@index');

//Products
Route::get('products','api\ProductController@index');

//Sliders

Route::get('sliders','api\SliderController@index');

Route::get('sliderApis','api\TestApi@index');
Route::get('/gories','api\TestApi@create');

Route::get('/allProjects','api\LiProjects@index');
Route::post('/postProject','api\LiProjects@store');
Route::post('/updateProject','api\LiProjects@update');
Route::get('/deleteProject.{id}','api\LiProjects@destroy');
