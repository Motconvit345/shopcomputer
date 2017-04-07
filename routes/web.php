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
Auth::routes();
Route::post('login-a', 'Auth\LoginController@authenticate');
Route::post('register-a', 'Auth\RegisterController@create');
Route::get('register/verify/{code}', 'Auth\RegisterController@verify');
Route::get('information-confirm/{status}', 'Auth\RegisterController@notification');

/*Page Admin*/
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::resource('/', 'Admin\HomeController');
    Route::resource('bill', 'Admin\BillController');
    Route::get('giao-dich', 'Admin\BillController@indexTransaction');
    Route::get('dat-hang', 'Admin\BillController@indexOrder');
    Route::resource('bill-detail', 'Admin\BillDetailController');
    Route::resource('category', 'Admin\CategoryController', ['except' => [
        'index'
    ]]);
    Route::get('category-index', 'Admin\CategoryController@index');
    Route::resource('product', 'Admin\ProductController');
    Route::resource('danh-sach-quan-tri', 'Admin\UserController');
    Route::get('danh-sach-thanh-vien', 'Admin\UserController@indexMember');
    Route::resource('slider', 'Admin\SliderController');
});

/*Page FrontEnd*/
Route::get('/', 'HomeController@index')->name('home');
Route::post('ajaxSearchHome', 'HomeController@search');

Route::resource('product', 'ProductController');

Route::resource('gio-hang', 'BillController');
Route::post('addCart', 'BillController@addCart');
Route::post('submit-payment', 'BillController@submit_payment');
Route::get('success-ngan-luong', 'BillController@success_nl');
Route::get('store-bill/{payment_name}/{order_code}/{status_payment}', 'BillController@store_bill');

// Route get product follow category
Route::get('{alias}/cid-{id}', 'ProductController@showFollowCategory');

Route::group(['prefix' => 'customer', 'middleware' => 'auth'], function () {
    Route::get('index', 'CustomerController@index');
    Route::get('edit-customer', 'CustomerController@editCustomer');
    Route::post('update-customer', 'CustomerController@update');
    Route::get('change-password', 'CustomerController@indexChangePassword');
    Route::post('update-password', 'CustomerController@updatePassword');
    Route::post('order', 'CustomerController@historyOrder');
    Route::get('order-detail/{id}', 'CustomerController@orderDetail');
});

use App\Models\Slider;
use File as F;
Route::get('test', function() {
    F::delete('image/upload/58af1bac66f30.jpg');
});
Route::get('{any?}', function () {
    return redirect('/');
});
