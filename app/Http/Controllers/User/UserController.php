<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\ProfileTrait;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{

  use ProfileTrait;

  public function registerview()
  {
    $user = User::findOrfail(Auth::id());
    return view('auth.update', compact('user'));
  }

  public function registerupdate(UserRequest $request)
  {

    $user = User::find(Auth::id());

    if (!empty($request->password)) {
      $user->password = bcrypt($request->password);
    }

    if (collect($request->img)->isNotEmpty()) {
      $newImage = $this->uploadImage($request, $request->img, "public/user/");
      $this->deletImage("public/user/$user->img");
      $user->img = $newImage;
    }

    $user->name = $request->name;
    $user->username = $request->username;
    $user->email = $request->email;
    $user->save();

    return redirect("home")->with('success', 'update valid');
  }

  public function destoyUser()
  {

    $user = User::find(Auth::id());

    foreach ($user->profile as $value) {
      $this->deletImage("public/profileimage/" . $value->profile_pic);
    }

    $user->delete();
    $this->deletImage("public/user/" . $user->img);
    return redirect("login");
  }
}
