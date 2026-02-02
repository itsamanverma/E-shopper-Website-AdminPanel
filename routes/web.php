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
Route::get('/', [App\Http\Controllers\IndexController::class, 'index']);

/* Category/Listing Page */
Route::get('/products/{url}', [App\Http\Controllers\ProductsController::class, 'products']);

/* Product Details Page */
Route::get('/product/{id}', [App\Http\Controllers\ProductsController::class, 'product']);

/* Get Product Attribute Price*/
Route::get('/get-product-price', [App\Http\Controllers\ProductsController::class, 'getProductPrice']);

/* Get Product Attribute Stock */
Route::get('/get-product-stock', [App\Http\Controllers\ProductsController::class, 'getProductStock']);

/**End E-shopper Route   */

/** Start of Admin Route */
Route::match(['get', 'post'], '/admin', [App\Http\Controllers\AdminController::class, 'login']);
Route::get('/logout', [App\Http\Controllers\AdminController::class, 'logout']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard']);
    Route::get('/admin/settings', [App\Http\Controllers\AdminController::class, 'settings']);
    Route::get('/admin/check-pwd', [App\Http\Controllers\AdminController::class, 'checkPassword']);
    Route::match(['get', 'post'], '/admin/update-pwd', [App\Http\Controllers\AdminController::class, 'updatePassword']);

    /* Category Admin Route */
    Route::match(['get','post'],'/admin/add-category', [App\Http\Controllers\CategoryController::class, 'addCategory']);
    Route::match(['get', 'post'],'/admin/edit-category/{id}', [App\Http\Controllers\CategoryController::class, 'editCategory']);
    Route::match(['get', 'post'],'/admin/delete-category/{id}', [App\Http\Controllers\CategoryController::class, 'deleteCategory']);
    Route::get('/admin/view-categories', [App\Http\Controllers\CategoryController::class, 'viewCategories']);

    // Product Routes
    Route::match(['get', 'post'],'/admin/add-product', [App\Http\Controllers\ProductsController::class, 'addProduct']);
    Route::match(['get', 'post'],'/admin/edit-product/{id}', [App\Http\Controllers\ProductsController::class, 'editProduct']);
    Route::get('/admin/view-products', [App\Http\Controllers\ProductsController::class, 'viewProduct']);
    Route::get('/admin/delete-product/{id}', [App\Http\Controllers\ProductsController::class, 'deleteProduct']);
    Route::get('/admin/delete-product-image/{id}', [App\Http\Controllers\ProductsController::class, 'deleteProductImage']);
    Route::get('/admin/delete-alt-image/{id}', [App\Http\Controllers\ProductsController::class, 'deleteAltImage']);

    // Products Attributes Routes
    Route::match(['get', 'post'], '/admin/add-attributes/{id}', [App\Http\Controllers\ProductsController::class, 'addAttributes']);
    Route::match(['get', 'post'], '/admin/add-images/{id}', [App\Http\Controllers\ProductsController::class, 'addImages']);
    Route::get('/admin/delete-attribute/{id}', [App\Http\Controllers\ProductsController::class, 'deleteAttribute']);

});
/** End of Admin Route */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
