<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

//Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {

    Route::group(['middleware' => ['auth', 'role:admin']], function () {
        Route::get('/', 'Admin\AdminController@index')->name('dashboard');
        Route::resource('bookings', 'Admin\BookingController');
        Route::resource('brands', 'Admin\BrandController');
        Route::resource('businesses', 'Admin\BusinessController');
        Route::resource('categories', 'Admin\CategoryController');
        Route::resource('collections', 'Admin\CollectionController');
        Route::resource('items', 'Admin\ItemController');
        Route::resource('permissions', 'Admin\PermissionController');
        Route::resource('products', 'Admin\ProductController');
        Route::resource('product-types', 'Admin\ProductTypeController');
        Route::resource('product-menus', 'Admin\ProductMenuController');
        Route::resource('reviews', 'Admin\ReviewController');
        Route::resource('roles', 'Admin\RoleController');
        Route::resource('users', 'Admin\UserController');
    });
});
