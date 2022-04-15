<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\CreateRegisterRequest;
use App\Http\Controllers\Controller;
use App\Http\Traits\ProfileTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class RegisterController extends Controller
{

  use ProfileTrait;

  public function register()
  {
    return view('auth.register');
  }

  public function registervalidator(CreateRegisterRequest $request)
  {

    $nameImage = $this->uploadImage($request, $request->img, "public/user/");

    $user = User::create([
      'name'     => $request->name,
      'username' => $request->username,
      'img'      => $nameImage,
      'email'    => $request->email,
      'remember_token' => Str::random(64),
      'password' => bcrypt($request->password),
    ]);

    Auth::login($user, true);
    return redirect("login");
  }

  public function registerview()
  {
    $user = User::findOrfail(Auth::id());
    return view('auth.update', compact('user'));
  }
}
