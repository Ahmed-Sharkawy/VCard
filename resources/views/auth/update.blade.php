@extends('layout.blank')
@section('title')
    Update Profile
@endsection
@section('addlink')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form action="{{ url('registerupdate') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="row card-body">
                <div class="col-md-6 form-group">
                    <label for="exampleInputEmail1">Name</label>
                    @error('name')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="exampleInputEmail1"
                        placeholder="Profile Name">
                </div>

                <div class="col-md-6 form-group">
                    <label for="exampleInputEmail1">Username</label>
                    @error('username')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <input type="text" name="username" value="{{ $user->username }}" class="form-control"
                        id="exampleInputEmail1" placeholder="username">
                </div>

                <div class="col-md-6 form-group">
                    <label for="exampleInputPassword1">Email</label>
                    @error('email')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                        id="exampleInputPassword1" placeholder="Email">
                </div>

                <div class="col-md-6 form-group">
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
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
                <img src="{{ asset('user/'.auth()->user()->img) }}" alt="" srcset="">
                <!-- /.card-body -->

                <div class="d-flex justify-content-between col-md-12 ">
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
          </div>
        </form>
        <form class="formupdate" action="{{route('destoyUser')}}" method="post">
          @csrf
          @method("DELETE")
          <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
@endsection
