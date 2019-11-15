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
    $name = Route::currentRouteName();
    return view('welcome')->with('name',$name);
})->name('Welcome');

/*Route::get('/pages/home',function(){
    return view('pages.home');
}); */

Route::view('/test/auth', 'pages.home');

//Sending some data to the view
Route::get('/services',function(){
    $heading = "Welcome to services";
    $data = [
        'title' => 'services',
        'services' => ['web design', 'Programming', 'Animation']
    ];
    return view('pages.services')->with('heading',$heading)->with($data);
});

//Basic Routing && Naming Route
//Optional Parameter
//Regular Expression constraint
Route::get('/hello/{name?}',function($name=null){
    return "<h2>Hello {$name}!</h2>";
})->name('hello')
  ->where('name', '[A-Za-z]+');

//Dynamic Routing
Route::get('/user/{id}/{name}',function($id,$name){
    return "User with id:".$id." Name".$name;
})->where(['name' => '[a-z]+'])   ;

Route::redirect('/hello', '/services');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware' => 'auth'],function(){

    Route::get('/todos','TodoController@index')->name('Todos');
    Route::get('/todo/delete/{todo}','TodoController@delete')->name('Delete Todo');
    Route::get('/todo/{todo}','TodoController@show')->name('View Todo');
    Route::get('/new-todo','TodoController@create')->name('Create Todo');
    Route::post('/store-todo','TodoController@store')->name('Store Todo');
    Route::get('/edit-todo/{todo}','TodoController@edit')->name('Edit Todo');
    Route::put('/update-todo/{todo}','TodoController@update')->name('Update Todo');
    Route::get('/finished/{todo}','TodoController@finished')->name('Finished');


});
