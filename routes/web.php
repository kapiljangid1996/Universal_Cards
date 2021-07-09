<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Front User Routing
Route::group(['middleware' => ['auth', 'user', 'PreventBackHistory'], 'prefix' => 'user'], function () {
    //User Dashboard
    Route::get('/dashboard', [UserController::class, 'index'])->name('front.user.dashboard');
});

//Back User (Admin) Routing
Route::group(['middleware' => ['auth', 'admin', 'PreventBackHistory'], 'prefix' => 'admin'], function () {
    //Admin Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
});
