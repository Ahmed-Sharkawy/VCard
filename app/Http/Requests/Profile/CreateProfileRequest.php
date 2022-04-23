<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class CreateProfileRequest extends FormRequest
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
      "profile_name"  => "required|min:5",
      "phone"         => "required|numeric",
      "email"         => "required|email",
      "fb"            => 'required|url',
      "linkedin"      => "required|url",
      "github"        => "required|url",
      "profile_pic"   => "required|image",
    ];
  }
}
