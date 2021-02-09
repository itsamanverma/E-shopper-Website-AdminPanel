<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


// Route::get('/', function () {
//     return view('welcome');
// });

/**Start E-shopper Route */
Route::get('/', 'IndexController@index');

/* Category/Listing Page */
Route::get('/products/{url}','ProductsController@products');

/* Product Details Page */
Route::get('/product/{id}', 'ProductsController@product');

/* Get Product Attribute Price*/
Route::get('/get-product-price', 'ProductsController@getProductPrice');

/* Get Product Attribute Stock */
Route::get('/get-product-stock', 'ProductsController@getProductStock');

/**End E-shopper Route   */

/** Start of Admin Route */
Route::match(['get', 'post'], '/admin','AdminController@login');
Route::get('/logout', 'AdminController@logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/dashboard','AdminController@dashboard');
    Route::get('/admin/settings','AdminController@settings');
    Route::get('/admin/check-pwd', 'AdminController@checkPassword');
    Route::match(['get', 'post'], '/admin/update-pwd','AdminController@updatePassword');

    /* Category Admin Route */
    Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
    Route::match(['get', 'post'],'/admin/edit-category/{id}','CategoryController@editCategory');
    Route::match(['get', 'post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');
    Route::get('/admin/view-categories','CategoryController@viewCategories');

    // Product Routes
    Route::match(['get', 'post'],'/admin/add-product','ProductsController@addProduct');
    Route::match(['get', 'post'],'/admin/edit-product/{id}','ProductsController@editProduct');
    Route::get('/admin/view-products', 'ProductsController@viewProduct');
    Route::get('/admin/delete-product/{id}','ProductsController@deleteProduct');
    Route::get('/admin/delete-product-image/{id}', 'ProductsController@deleteProductImage');
    Route::get('/admin/delete-alt-image/{id}', 'ProductsController@deleteAltImage');

    // Products Attributes Routes
    Route::match(['get', 'post'], '/admin/add-attributes/{id}','ProductsController@addAttributes');
    Route::match(['get', 'post'], '/admin/add-images/{id}','ProductsController@addImages');
    Route::get('/admin/delete-attribute/{id}','ProductsController@deleteAttribute');

});
/** End of Admin Route */
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
