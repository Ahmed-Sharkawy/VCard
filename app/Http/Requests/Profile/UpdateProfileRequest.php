<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
      "profile_name"  => "required|min:5|regex:/[a-zA-Z0-9]+$/",
      "phone"         => "required|numeric",
      "email"         => "required|email",
      "fb"            => "required",
      "linkedin"      => "required",
      "github"        => "required",
      "profile_pic"   => "image|sometimes",
    ];
  }
}
