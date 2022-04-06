<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $profiles = Profile::where('user_id', Auth::id())->get();
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
  public function store(Request $request)
  {

    $request->validate([
      "profile_name"  => "required|min:5",
      "phone"         => "required|numeric",
      "email"         => "required|email|unique:profiles",
      "facebook"      => 'required',
      "linkedin"      => "required",
      "github"        => "required",
      "profile_pic"   => "required|image",
    ]);

    if ($request->hasFile("profile_pic")) {

      $ext = $request->profile_pic->getClientOriginalExtension();

      $newName = date('Y-m-d') . '_' . uniqid() . '.' . $ext;
      $img = $request->file('profile_pic');

      $img->move(public_path('upload'), $newName);
    } else {
      $newName = 'job.png';
    }

    Profile::create([
      "profile_name"  => $request->profile_name,
      "phone"         => $request->phone,
      "email"         => $request->email,
      "fb"            => $request->facebook,
      "linkedin"      => $request->linkedin,
      "github"        => $request->github,
      "profile_pic"   => $newName,
      "user_id"       => auth()->user()->id,
    ]);

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
  public function update(Request $request, $id)
  {
    $request->validate([
      "profile_name"  => "required|min:5",
      "phone"         => "required|numeric",
      "email"         => "required|email",
      "facebook"      => 'required',
      "linkedin"      => "required",
      "github"        => "required",
      "profile_pic"   => "image",
    ]);

    $profile = Profile::find($id);

    $profile->profile_name = $request->profile_name;
    $profile->phone = $request->phone;
    $profile->email = $request->email;
    $profile->fb = $request->facebook;
    $profile->linkedin = $request->linkedin;
    $profile->github = $request->github;


    if (collect($request->profile_pic)->isEmpty()) {
      $profile->profile_pic = $profile->profile_pic;
    }

    if ($request->hasFile('profile_pic')) {

      $imgfile = $request->file('profile_pic');
      unlink(public_path('upload') . '/' . $profile->profile_pic);

      $ext = $request->profile_pic->getClientOriginalExtension();
      $img = date('Y-m-d') . '_' . uniqid() . '.' . $ext;

      $imgfile->move(public_path('upload/'), $img);
      $profile->profile_pic = $img;
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
    unlink(public_path('upload') . '/' . $profile->profile_pic);
    $profile->delete();
    return redirect('home')->with("success", "delete success row");
  }
}
