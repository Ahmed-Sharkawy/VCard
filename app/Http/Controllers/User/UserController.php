<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\ProfileTrait;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{

  use ProfileTrait;

  public function index($username, $bas = null)
  {

    $user = User::with("profile")->where("username", $username)->first();

    if ($user) {
      if ($bas) {
        $profile = $user->profile->where("profile_name", $bas)->first();
      } else {
        $profile = $user->profile->first();
      }
      if ($profile) {
        return view('index', compact("user", "profile"));
      }
    }
    return abort("404");
  }

  // Edit User Account
  public function edit()
  {
    $user = User::findOrfail(Auth::id());
    return view('auth.update', compact('user'));
  }

  public function update(UserRequest $request)
  {

    $user = User::find(Auth::id());

    $user->name     = $request->name;
    $user->username = $request->username;
    $user->email    = $request->email;

    if (collect($request->img)->isNotEmpty()) {
      $newImage = $this->uploadImage($request, $request->img, "public/user/");
      $this->deletImage("public/user/$user->img");
      $user->img = $newImage;
    }

    if (collect($request->password)->isNotEmpty()) {
      $user->password = bcrypt($request->password);
    }

    $user->save();

    // $user->update($request->validated());
    // $user->updated($request->validated() + ["img" => $newImage]);
    return redirect("home")->with('success', 'update valid');
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
    return redirect("login");
  }

  public function showAlluser()
  {
    $users = User::withCount("profile")->where("role", 0)->get();
    return view("user.showuser", compact("users"));
  }
}
