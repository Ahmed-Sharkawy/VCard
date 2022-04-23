<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

Trait ProfileTrait
{
  public function uploadImage($request, $name, $pas)
  {
    if ($request->hasFile($request->$name)) {
      $ext = $name->getClientOriginalExtension();
      $newName = date('Y-m-d') . '_' . uniqid() . '.' . $ext;
      $name->storeAs($pas, $newName);
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
