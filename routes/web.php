<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [
    'as' => 'home.home',
    'uses' => 'App\Http\Controllers\HomeController@index'
]);

Route::get('/shop', [
    'as' => 'home.shop',
    'uses' => 'App\Http\Controllers\HomeController@shop'
]);

Route::controller(\App\Http\Controllers\CheckoutController::class)->group(function () {
    Route::get('/checkout', 'index')->name('checkout.index');
});

Route::controller(\App\Http\Controllers\CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart');
    Route::get('/cart/{id}', 'addToCart')->name('add.to.cart');
    Route::patch('/cart/update', 'updatecart')->name('update.cart');
    Route::delete('/cart/remove', 'remove')->name('remove.from.cart');
});

Route::get('/viewcategory/{slug}' ,[\App\Http\Controllers\HomeController::class , 'viewCategory']);

Route::prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as' => 'categories.index',
            'uses' => 'App\Http\Controllers\CategoryController@index'
        ]);

        Route::get('/create', [
            'as' => 'categories.create',
            'uses' => 'App\Http\Controllers\CategoryController@create'
        ]);
        Route::post('/create', [
            'as' => 'categories.store',
            'uses' => 'App\Http\Controllers\CategoryController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'App\Http\Controllers\CategoryController@edit'
        ]);
        Route::post('/edit/{id}', [
            'as' => 'categories.update',
            'uses' => 'App\Http\Controllers\CategoryController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses' => 'App\Http\Controllers\CategoryController@delete'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses' => 'App\Http\Controllers\CategoryController@delete'
        ]);
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [
            'as' => 'product.index',
            'uses' => 'App\Http\Controllers\ProductController@index'
        ]);

        Route::get('/create', [
            'as' => 'product.create',
            'uses' => 'App\Http\Controllers\ProductController@create'
        ]);
        Route::post('/create', [
            'as' => 'product.store',
            'uses' => 'App\Http\Controllers\ProductController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'product.edit',
            'uses' => 'App\Http\Controllers\ProductController@edit'
        ]);
        Route::post('/edit/{id}', [
            'as' => 'product.update',
            'uses' => 'App\Http\Controllers\ProductController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'product.delete',
            'uses' => 'App\Http\Controllers\ProductController@delete'
        ]);

        Route::post('/delete/{id}', [
            'as' => 'product.destroy',
            'uses' => 'App\Http\Controllers\ProductController@destroy'
        ]);
    });

});

Route::controller(\App\Http\Controllers\AuthController::class)->group(function () {
    Route::get('/login', 'showLogin');
    Route::post('/login', 'login')->name('auth.login');
});
