<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
  public function create()
  {
    return view('auth.login');
  }

  public function store(LoginRequest $request)
  {
    $data = ['email' => $request->email, 'password' => $request->password];

    if (Auth::attempt($data)) {
      return redirect('home');
    }

    return redirect('login')->with('success', 'email or passowrd not valid');
  }

  public function logout()
  {
    Auth::logout(false);
    return redirect("login");
  }
}
