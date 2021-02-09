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

Route::get('/', 'LandingpageController@index')->name('home');
Route::get('/tentang', 'LandingpageController@about')->name('about');
Route::get('/kontak', 'LandingpageController@contact')->name('contact');
Route::get('/shop', 'LandingpageController@product')->name('shop');
Route::get('/shop/{slug}', 'LandingpageController@productDetail')->name('shop.detail');
Route::post('/product', 'LandingpageController@getProductCart')->name('product');

Route::post('/order/checkout', 'OrderController@checkout')->name('checkout');

Route::get('/region/province', 'RajaOngkirController@getProvince')->name('province');
Route::get('/region/city/{id_province}', 'RajaOngkirController@getCity')->name('city');
Route::get('/region/district/{id_city}', 'RajaOngkirController@getDistrict')->name('district');
Route::get('/region/subdistrict/{id_district}', 'RajaOngkirController@getSubdistrict')->name('subdistrict');
Route::post('/region/courier', 'RajaOngkirController@getCourier')->name('courier');
Route::post('/region/cities', 'RajaOngkirController@getCities')->name('cities');

Route::get('/wa/{order_id}', 'OrderController@generateWhatsapp')->name('wa');


Route::group(['prefix' => 'admin'], function () {
    Route::resource('login', 'LoginController');
    Route::get('login', 'LoginController@index')->name('login');
    Route::get('/', 'LoginController@index')->name('login');

    Route::middleware('auth')->group(function () {
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::resource('category', 'CategoryController');
        Route::resource('product', 'ProductController');
        Route::resource('order', 'OrderController');
        Route::resource('product-images', 'ProductImageController');
        Route::resource('product-prices', 'PriceListController');

        Route::resource('settings', 'SettingController');
        Route::resource('slider', 'SliderController');
        Route::resource('review', 'ReviewController');
        Route::resource('page', 'PageController');

        Route::get('socmed', 'SettingController@socmed')->name('socmed');
        Route::post('socmed/store', 'SettingController@socmedStore')->name('socmed.store');
        Route::get('contact', 'SettingController@contact')->name('admin.contact');
        Route::post('contact/store', 'SettingController@contactStore')->name('admin.contact.store');
    });
});
