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



Route::get('/', [
    'as' => 'home.front',
    'uses' => 'OrderController@index',
]);

Route::post('/', 'OrderController@store');

Route::get('/login', [
    'as' => 'home.login',
    'uses' => 'LoginController@index',
]);
Route::post('/login', [
    'as' => 'home.login',
    'uses' => 'LoginController@postLogin',
]);

Route::get('/logout', 'LogoutController@index')->name('logout.index');

Route::get('/home', [
    'as' => 'home.index',
    'uses' => 'LoginController@profile',
]);

Route::get('/services', [
    'as' => 'home.services',
    'uses' => 'HomeController@index',
]);

Route::get('/neworder', [
    'as' => 'home.getNeworder',
    'uses' => 'HomeController@getNewOrder',
]);

Route::post('/neworder', [
    'uses' => 'HomeController@postNewOrder',
]);


Route::get('/admindashboard', [
    'as' => 'admin.index',
    'uses' => 'AdminController@index',
]);

Route::post('/admindashboard', [
    'uses' => 'AdminController@postLogin',
]);

Route::get('/clients', [
    'as' => 'admin.clients',
    'uses' => 'AdminController@getClient',
]);


Route::post('/profile/{id}', 'HomeController@update');

Route::get('/clients/{id}', 'AdminController@show');


Route::get('/invoices', [
    'as' => 'admin.invoices',
    'uses' => 'AdminController@getAllInvoices',
]);

Route::get('/invoices/{id}', [
    'as' => 'admin.invoicedetails',
    'uses' => 'AdminController@getInvoiceDetails',
]);

Route::post('/invoices/{id}', [
    'uses' => 'AdminController@postInvoiceDetails',
]);

Route::get('/invoices/{id}/delete', 'AdminController@destroyInvoice');





Route::resource('profile', 'HomeController');
