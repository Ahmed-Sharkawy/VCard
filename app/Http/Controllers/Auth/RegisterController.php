<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Http\Traits\ProfileTrait;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{

  use ProfileTrait;

  // View Cerate User
  public function cerate()
  {
    return view('auth.register');
  }

  // Save Date User and Validation
  public function store(RegisterRequest $request)
  {

    $nameImage = $this->uploadImage($request, $request->img, "public/user/");

    $user = User::create($request->except(["password", "img"]) + ['password' => bcrypt($request->password), 'img' => $nameImage,]);

    Auth::login($user, true);
    return redirect("login");
  }

}
