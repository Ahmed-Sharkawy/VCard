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

// Route::get("/",function () { return redirect()->back();})->name("back");

Route::get('/profile/{user}/{bas?}', [UserController::class, "index"]);


Route::group(["middleware" => "guest"], function () {

  // register
  Route::get('register', [RegisterController::class, 'cerate']);
  Route::post('registers', [RegisterController::class, 'store']);

  // login
  Route::get('login', [LoginController::class, 'create'])->name('login');
  Route::post('login', [LoginController::class, 'store']);
});


Route::group(["middleware" => "auth"], function () {

  // logout
  Route::get('logout', [LoginController::class, 'logout']);

  // register Edit
  Route::get('registerview', [UserController::class, 'edit']);
  Route::put('registerupdatee', [UserController::class, 'update']);

  // User destroy User
  Route::delete('destoyUser', [UserController::class, 'destroy'])->name("destroy");

// All Route Profile Home

  // Profile Home
  Route::get('home', [ProfileController::class, "index"]);

  // Profile Create
  Route::get('addlink', [ProfileController::class, "create"]);
  Route::post('addlink', [ProfileController::class, "store"]);

  // Profile Edit
  Route::get('edit/{id}', [ProfileController::class, "edit"]);
  Route::put('update/{id}', [ProfileController::class, "update"]);

  // Profile destroy
  Route::delete('destroy/{id}', [ProfileController::class, "destroy"]);

    Route::group(["middleware" => "showuser"], function () {
      Route::get("showuser",[UserController::class, "showuser"]);
    });
});

