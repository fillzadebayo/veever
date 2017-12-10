<?php
use App\Mail\MailMe;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('sendmail', function () {
    // send an email to "batman@batcave.io"
    $myname="30";
    Mail::to('batman@batcave.io')->send(new MailMe ($myname));
    return view('pages.home');
});
Route::get('/', function () {return view('pages.create');});
Route::get('/view', function () {
    return view('pages.home');
});
Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'AddMoneyController@payWithPaypal',));
Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'payment.status','uses' => 'AddMoneyController@getPaymentStatus',));
Route::resource('transaction', 'TransactionController');
Route::get('newtran', array('as' => 'transaction.new', 'uses' => 'TransactionController@newTransaction',));
Route::get('list', array('as' => 'transaction.list', 'uses' => 'TransactionController@allTransaction',));
Route::match(['get','post'],'transaction/{id}/confirm/{role}', array('as' => 'transaction.confirm', 'uses' => 'TransactionController@confirmTransaction',));
Route::match(['get','post'],'transaction/show/{id}', array('as' => 'transaction.show', 'uses' => 'TransactionController@show',));
Route::resource('user', 'UserController');
Route::get('account', array('as' => 'user.account', 'uses' => 'UserController@updateView',));
Route::post('update/user/{id}', array('as' => 'user.accountupdate', 'uses' => 'UserController@updateAccount',));
Route::resource('message', 'MessageController');

Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay'); // Laravel 5.1.17 and above

Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
Route::get('/payment', 'PaymentController@sendTestview');
Route::get('/user/activation/{token}', 'Auth\RegisterController@userActivation');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
  });
