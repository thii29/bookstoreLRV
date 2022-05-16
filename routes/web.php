<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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
    return view('frontend.index',['book'=>DB::table('book')->get()],
                                 ['cate'=>DB::table('category')->get()]);
});

//admin
Route::group(['prefix'=>'admin'],function(){
    //login - Register
    Route::get('showlogin','AdminController@showLogin')->name('ad.showLogin');
    Route::get('showReg','AdminController@showRegister')->name('ad.showregister');
    Route::post('loginAdmin','AdminController@login')->name('ad.login');
    Route::post('register','AdminController@register')->name('ad.reg');
    Route::get('logout','AdminController@logout')->name('ad.logout');
    //Product
    Route::get('product','AdminController@product')->name('ad.product');
    Route::get('getpro','AdminController@getpro')->name('ad.getpro');
    Route::post('addpro','AdminController@addpro')->name('ad.addpro');
    Route::get('deletepro/{idbook}','AdminController@deletepro')->name('ad.deletepro');
    Route::get('geteditpro/{idbook}','AdminController@geteditpro')->name('ad.geteditpro');
    Route::put('editpro','AdminController@editpro')->name('ad.editpro');
    //Category
    Route::get('category','AdminController@category')->name('ad.category');
    Route::get('getcate','AdminController@getcate')->name('ad.getcate');
    Route::post('addcate','AdminController@addcate')->name('ad.addcate');
    Route::get('delcate/{id}','AdminController@delcate')->name('ad.delcate');
    Route::get('geteditcate/{id}','AdminController@geteditcate')->name('ad.geteditcate');
    Route::put('editcate','AdminController@editcate')->name('ad.editcate');
    //Order
    Route::get('order','AdminController@order')->name('ad.order');
    //User
    Route::get('user','AdminController@user')->name('ad.user');
    //Admin
    Route::get('admin','AdminController@admin')->name('ad.admin');

});

//Users
Route::group(['prefix'=>'user'], function(){
    Route::get('showIndex','UserController@showIndex')->name('user.index');
    Route::get('showpro','UserController@showproduct')->name('user.showPro');
    Route::get('showLoginUser','UserController@showLoginUser')->name('user.showLogin');
    Route::get('showregisterUser','UserController@showRegisterUser')->name('user.showRegister');
    Route::get('showContact','UserController@showContact')->name('user.contact');
    Route::get('showdetailPro/{idbook}','UserController@showProDetail')->name('user.detailPro');
    Route::post('postlogin','UserController@postLogin')->name('user.postlogin');
    Route::get('logout','UserController@logout')->name('user.logout');
    Route::get('cart','CartController@index')->name('user.showcart');
    Route::post('addcart','CartController@addcart')->name('user.addcart');
    Route::delete('delcart','CartController@deletecart')->name('user.delcart');
    Route::put('updatecart','CartController@updatecart')->name('user.updatecart');
});
