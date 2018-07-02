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


//Authentication scaffolding route
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

//Cart functions
Route::get('cart', 'cartController@index');
Route::get('cart/add/{id}', 'cartController@addItem');
Route::get('cart/remove/{id}', 'cartController@removeItem');
Route::get('cart/update/', 'cartController@update');
//Cart functions end

//Front Controller
Route::view('/', 'front.index');
Route::view('products', 'front.products', [
  'data' => App\Product::all(),
  'catByUser' => 'All Products'
]);
Route::get('products/{cat}', 'FrontController@proCat');
Route::get('search', 'FrontController@search');

//Get products from database using AJAX
Route::get('productsCat' , 'FrontController@productsCat');

//user middleware
Route::group(['middleware' => 'auth'], function() {
  Route::get('home', 'HomeController@index')->name('home');
  Route::get('dashboard','HomeController@index');
  Route::get('myaccount/{link}',function($link){
      return view('myaccount.index', ['link' => $link]);
  });

  Route::view('inbox','myaccount.inbox', [
    'data' => App\Inbox::all()
  ]);

  Route::get('updateInbox', 'profileController@updateInbox');
});

//admin middleware start
//Make sure you add admin middleware later
Route::group(['prefix' => 'admin'], function() {
    Route::get('/','AdminController@index');
    Route::get('profile','AdminController@profile')->name('profile');
    Route::get('/addProduct','AdminController@addProduct')->name('addProduct');
    Route::post('saveProduct','AdminController@saveProduct');

    Route::view('products', 'admin.products', [
      //Passes the products table together with cats table
      'data' => App\Product::with('cats')->get()
    ]);
    Route::get('editProduct/{id}','AdminController@editProduct')->name('editProduct');
    Route::get('/changeImage/{id}','AdminController@changeImage')->name('changeImage');
    //Upload Image Route
    Route::post('/uploadPP','AdminController@uploadPP');

    //Categories
    Route::view('addCategory', 'admin.addCategory');
    Route::view('cats', 'admin.cats', [
      'data' => App\Cat::all()
    ]);
    Route::post('saveCategory','AdminController@saveCategory');

    Route::view('users', 'admin.users', [
        "data" => App\User::all()
    ]);
    Route::get('banUser', 'AdminController@banUser');
});