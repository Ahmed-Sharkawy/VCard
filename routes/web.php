<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\User\UserController;
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

Route::get('/', function () {
  return view('auth.login');
})->middleware("guest");


Route::group(["middleware" => "guest"], function () {

  // register
  Route::get('register', [RegisterController::class, 'register']);
  Route::post('registers', [RegisterController::class, 'registervalidator']);

  // login
  Route::get('login', [LoginController::class, 'login'])->name('login');
  Route::post('login', [LoginController::class, 'loginvalidator']);
});


Route::group(["middleware" => "auth"], function () {

  // registerViewUpdate
  Route::get('registerview', [UserController::class, 'registerview']);
  Route::put('registerupdate', [UserController::class, 'registerupdate']);
  Route::delete('destoyUser', [UserController::class, 'destoyUser'])->name("destoyUser");


  // logout
  Route::get('logout', [LoginController::class, 'logout']);

  // Profile
  Route::get('home', [ProfileController::class, "index"]);

  Route::get('addlink', [ProfileController::class, "create"]);
  Route::post('addlink', [ProfileController::class, "store"]);

  Route::get('edit/{id}', [ProfileController::class, "edit"]);
  Route::put('update/{id}', [ProfileController::class, "update"]);

  Route::delete('destroy/{id}', [ProfileController::class, "destroy"]);
});
