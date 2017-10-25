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

Route::get('/', function () {return view('pages.create');});
Route::get('/view', function () {
    return view('pages.home');
});
Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'AddMoneyController@payWithPaypal',));

Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));
Route::resource('transaction', 'TransactionController');
Route::get('paypal', array('as' => 'payment.status','uses' => 'AddMoneyController@getPaymentStatus',));
Route::get('newtran', array('as' => 'transaction.new', 'uses' => 'TransactionController@newTransaction',));
Route::get('list', array('as' => 'transaction.list', 'uses' => 'TransactionController@allTransaction',));


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
