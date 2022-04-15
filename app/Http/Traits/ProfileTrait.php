<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

Trait ProfileTrait
{
  public function uploadImage($request, $profile_pic, $pas)
  {
    if ($request->hasFile($request->$profile_pic)) {
      $ext = $profile_pic->getClientOriginalExtension();
      $newName = date('Y-m-d') . '_' . uniqid() . '.' . $ext;
      $profile_pic->storeAs($pas, $newName);
      return $newName;
    }
  }

  public function deletImage($pas)
  {
    if (Storage::exists($pas)) {
      Storage::delete($pas);
    }
  }
}
