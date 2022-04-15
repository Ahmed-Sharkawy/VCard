<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'name'      => "required|max:100|string",
      'img'       => "image",
      'username'  => "required|unique:users,username," . Auth::id(),
      'email'     => "required|email|unique:users,email," . Auth::id(),
    ];
  }
}
