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
    Profile::create($request->except(['profile_pic']) + ["user_id" => auth()->user()->id, "profile_pic" => $newName]);
    return redirect('home')->with("success", "Profile added successfully");
  }

  public function edit($id)
  {
    $profile = Profile::findOrFail($id);
    return view('profile.edit', compact('profile'));
  }

  public function update(UpdateProfileRequest $request, $id)
  {
    $profile = Profile::find($id);
    if (collect($request->profile_pic)->isNotEmpty()) {
      $this->deletImage("public/profileimage/$profile->profile_pic");
      $nameimge = $this->uploadImage($request, $request->profile_pic, "public/profileimage/");
      $profile->update($request->except(["profile_pic"]) + ["profile_pic" => $nameimge]);
    } else {
      $profile->update($request->except(["profile_pic"]));
    }

    return redirect('home')->with("success", "Profile Updated successfully");
  }

  public function destroy($id)
  {
    $profile = Profile::find($id);
    $this->deletImage("public/profileimage/$profile->profile_pic");
    $profile->delete();
    return redirect('home')->with("success", "Profile Deleted successfully");
  }
}
