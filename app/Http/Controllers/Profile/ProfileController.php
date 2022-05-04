<?php

namespace App\Http\Controllers\Profile;

use App\Http\Requests\Profile\CreateProfileRequest;
use App\Http\Requests\Profile\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Traits\ProfileTrait;
use App\Models\Profile;

class ProfileController extends Controller
{

  use ProfileTrait;

  public function index()
  {
    $profiles = Auth::user()->profile;
    return view('profile.index', compact('profiles'));
  }

  public function create()
  {
    return view('profile.add');
  }

  public function store(CreateProfileRequest $request)
  {
    $newName = $this->uploadImage($request, $request->profile_pic, "public/profileimage/");
    Profile::create([ "user_id" => auth()->user()->id, "profile_pic" => $newName ] + $request->validated());
    return redirect()->route('home')->with("success", "Profile added successfully");
  }

  public function edit(Profile $profile)
  {
    return view('profile.edit', compact('profile'));
  }

  public function update(UpdateProfileRequest $request, Profile $profile)
  {
    if (collect($request->profile_pic)->isNotEmpty()) {

      $this->deletImage("public/profileimage/$profile->profile_pic");
      $nameimge = $this->uploadImage($request, $request->profile_pic, "public/profileimage/");

      $profile->update(["profile_pic" => $nameimge] + $request->validated());
      return redirect()->route('home')->with("success", "Profile Updated successfully");
    }

    $profile->update($request->validated());
    return redirect()->route('home')->with("success", "Profile Updated successfully");
  }

  public function destroy(Profile $profile)
  {
    $this->deletImage("public/profileimage/$profile->profile_pic");
    $profile->delete();
    return redirect()->route('home')->with("success", "Profile Deleted successfully");
  }
}
