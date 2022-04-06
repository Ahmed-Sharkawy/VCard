<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
  public function register()
  {
    return view('auth.register');
  }

  public function registervalidator(Request $request)
  {
    $request->validate([
      'name'        => 'required|min:3|max:20',
      'username'    => 'required|unique:users',
      'email'       => 'required|email|unique:users',
      'img'         => 'required|image',
      'password'    => 'required|min:3|max:20',
      'repassword'  => 'required|min:5|max:20|same:password',
    ]);


    if ($request->hasFile("img")) {
      $ext = $request->img->getClientOriginalExtension();

      $image = date("Y-m-d") . '_' . uniqid() . "." . $ext;
      $request->img->move(public_path("user/"), $image);
    }

    $user = User::create([
      'name'     => $request->name,
      'username' => $request->username,
      'img'      => $image,
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
