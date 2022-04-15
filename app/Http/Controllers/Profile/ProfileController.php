<?php

namespace App\Http\Controllers\Profile;

use App\Http\Requests\Profile\CreateProfileRequest;
use App\Http\Requests\Profile\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Traits\ProfileTrait;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{

  use ProfileTrait;

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $profiles = Auth::user()->profile;

    return view('profile.index', compact('profiles'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('profile.add');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreateProfileRequest $request)
  {

    $newName = $this->uploadImage( $request, $request->profile_pic ,"public/profileimage/");
    Profile::create($request->safe()->except(['profile_pic']) + [ "user_id" => auth()->user()->id, "profile_pic" => $newName]);

    return redirect('home')->with("success", "added success file");
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $res = Profile::findOrFail($id);
    return view('profile.edit', compact('res'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateProfileRequest $request, $id)
  {

    $profile = Profile::find($id);

    $profile->profile_name  = $request->profile_name;
    $profile->phone         = $request->phone;
    $profile->email         = $request->email;
    $profile->fb            = $request->fb;
    $profile->linkedin      = $request->linkedin;
    $profile->github        = $request->github;

    if ( collect($request->profile_pic)->isNotEmpty() ) {
      $this->deletImage("public/profileimage/$profile->profile_pic");
      $nameimge = $this->uploadImage($request, $request->profile_pic, "public/profileimage/");
      $profile->profile_pic = $nameimge;
    }

    $profile->save();
    return redirect('home')->with("success", "added success file");
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $profile = Profile::find($id);
    $this->deletImage("public/profileimage/$profile->profile_pic");
    $profile->delete();
    return redirect('home')->with("success", "delete success row");
  }
}
