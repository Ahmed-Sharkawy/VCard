<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{

  public function registerview()
  {
    $user = User::findOrfail(Auth::id());
    return view('auth.update', compact('user'));
  }

  public function registerupdate(Request $request)
  {
    $id = Auth::id();
    $request->validate([
      'name'      => "required|max:100|string",
      'img'      => "image",
      'username'  => "required|unique:users,username,$id",
      'email'     => "required|email|unique:users,email,$id",
    ]);

    $user = User::find($id);

    if (empty($request->password)) {
      $user->password = $user->password;
    } else {
      $user->password = bcrypt($request->password);
    }

    if (empty($request->file()->img)) {
      $user->img = auth()->user()->img;
    }

    if ($request->hasFile("img")) {

      $image_path = public_path("user/" . $user->img);

      if (File::exists($image_path)) {
        File::delete($image_path);
      }

      $ext = $request->img->getClientOriginalExtension();

      $image = date("Y-m-d") . '_' . uniqid() . "." . $ext;
      $request->img->move(public_path("user/"), $image);
      $user->img = $image;
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
      $pas = public_path("upload/". $value->profile_pic);
      File::delete($pas);
    }
    $pas = public_path("user/" . $user->img);
    File::delete($pas);
    $user->delete();
    return redirect("login");
  }
}
