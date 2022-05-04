<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;


/*
|------------------------------------------------------------
|                      |   Web Routes   |
|------------------------------------------------------------
*/
Route::get('profile/{user:username}/{profile_name?}', [UserController::class, "index"]);

/*
|------------------------------------------------------------
|                      |   Group guest   |
|------------------------------------------------------------
*/
Route::group(["middleware" => "guest"], function () {

  // register
  Route::get('register', [RegisterController::class, 'cerate'])->name("register.view");
  Route::post('registers', [RegisterController::class, 'store'])->name("register.cerate");

  // login
  Route::get('/', [LoginController::class, 'create'])->name('/');
  Route::post('login', [LoginController::class, 'store'])->name("auth.login");
});

/*
|------------------------------------------------------------
|                      |   Group Auth   |
|------------------------------------------------------------
*/

Route::group(["middleware" => "auth"], function () {

  // logout
  Route::get('logout', [LoginController::class, 'logout'])->name("logout");

  // register Edit
  Route::get('updateuser', [UserController::class, 'edit'])->name("view.update.user");
  Route::put('updateuser/{user}', [UserController::class, 'update'])->name("update.user");

  // User destroy User
  Route::delete('destoyuser', [UserController::class, 'destroy'])->name("destoy.user");

/*
|------------------------------------------------------------
|              |   All Route Profile Home   |
|------------------------------------------------------------
*/
  // Profile Home
  Route::get('home', [ProfileController::class, "index"])->name('home');

  // Profile Create
  Route::get('addprofile', [ProfileController::class, "create"])->name("view.add.profile");
  Route::post('addprofile', [ProfileController::class, "store"])->name("create.profile");

  // Profile Edit
  Route::post('edit/{profile}', [ProfileController::class, "edit"])->name("view.edit.profile");
  Route::put('update/{profile}', [ProfileController::class, "update"])->name("update.profile");

  // Profile destroy
  Route::delete('destroy/{profile}', [ProfileController::class, "destroy"])->name("destroy.profile");

    Route::group(["middleware" => "showuser"], function () {
      Route::get("showuser",[AdminController::class, "showAllUser"])->name("show.user");
      Route::get("showprofile/{id}", [AdminController::class, "showUserProfiles"])->name("show.profile");
    });
});

