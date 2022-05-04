<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function showAllUser()
  {
    $users = User::withCount("profile")->where("role", 0)->get();
    return view("user.showuser", compact("users"));
  }

  public function showUserProfiles($id)
  {
    $users = User::with("profile")->where("id", $id)->first();
    return view("user.showprofile", ["profiles" => $users->profile, 'user' => $users]);
  }
}
