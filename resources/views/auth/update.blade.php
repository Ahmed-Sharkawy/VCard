@extends('layout.layout')
@section('title')
    Update Profile
@endsection
@section('css.admin')
    <link href="{{ asset('back/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('add-content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update Profile</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form action="{{ route('update.user', Auth::id()) }}" method="post" enctype="multipart/form-data" class="form-admin-style">
            @csrf
            @method("PUT")
            <div class="row card-body">
                <div class="col-md-12 form-group">
                    <label for="exampleInputEmail1">Name</label>
                    @error('name')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="exampleInputEmail1"
                        placeholder="Profile Name">
                </div>

                <div class="col-md-12 form-group">
                    <label for="exampleInputEmail1">Username</label>
                    @error('username')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <input type="text" name="username" value="{{ $user->username }}" class="form-control"
                        id="exampleInputEmail1" placeholder="username">
                </div>

                <div class="col-md-12 form-group">
                    <label for="exampleInputPassword1">Email</label>
                    @error('email')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                        id="exampleInputPassword1" placeholder="Email">
                </div>

                <div class="col-md-12 form-group">
                    <label for="exampleInputPassword1">Password</label>
                    @error('password')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Password">
                </div>
                <div class="col-md-12 form-group">
                    @error('img')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="img" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="avatar avatar-xl col-md-12 row justify-content-between align-items-end">
                    <img alt="avatar" src="{{ asset('storage/user/' . auth()->user()->img) }}" width="10%" class="rounded rounded-admin" />
                </div>
                <div>
                    <button type="submit" class="btn btn-primary button-update-admin">Update </button>
                </div>
            </div>
        </form>
        <form class="form-admin-style-delete" action="{{ route('destoy.user') }}" method="post">
            @csrf
            @method("DELETE")
            <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
@endsection
