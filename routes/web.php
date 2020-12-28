<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/', 'OrderController@index');

Route::post('/save', 'OrderController@save');

Route::get('/logout', 'LoginController@UserLogout');

Route::match(['get', 'post'], '/register', function () {
    return Redirect('/login');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', 'Admin\IndexController@index');
});
