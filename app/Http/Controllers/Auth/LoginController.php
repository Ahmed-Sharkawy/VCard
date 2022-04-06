<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function login()
  {
    return view('auth.login');
  }

  public function loginvalidator(Request $request)
  {
    $request->validate([
      'email'     => 'required|email',
      'password'  => 'required|min:3|max:20',
    ]);

    $data = [
      'email' => $request->email,
      'password'  => $request->password,
    ];

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
