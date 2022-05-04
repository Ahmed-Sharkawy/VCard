<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\ProfileTrait;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{

  use ProfileTrait;

  public function index(User $user, $profile_name = null)
  {

    if ($user) {
      if ($profile_name) {
        $profile = $user->profile->where("profile_name", $profile_name)->first();
      } else {
        $profile = $user->profile->first();
      }
      if ($profile) {
        return view('index', compact("user", "profile"));
      }
    }
    return abort("404");
  }

  public function edit()
  {
    $user = User::findOrfail(Auth::id());
    return view('auth.update', compact('user'));
  }

  public function update(UserRequest $request, User $user)
  {

    if (collect($request->img)->isNotEmpty()) {
      $newImage = $this->uploadImage($request, $request->img, "public/user/");
      $this->deletImage("public/user/" . $user->img);
    }

    $img      = empty($request->img) ? $user->img : $newImage;
    $password = collect($request->password)->isNotEmpty() ? bcrypt($request->password) : $user->password;

    $user->update(["img" => $img, "password" => $password] + $request->validated());

    return redirect()->route("home")->with('success', 'update valid');
  }

  public function destroy()
  {
    $user = User::find(Auth::id());

    foreach ($user->profile as $value) {
      $this->deletImage("public/profileimage/" . $value->profile_pic);
    }

    $user->delete();
    $this->deletImage("public/user/" . $user->img);
    Auth::logout(false);
    return redirect()->route('/');
  }

}
