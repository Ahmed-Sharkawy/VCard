@extends('layout.blank')
@section('title')
  Add Link
@endsection
@section('addlink')
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Quick Example</h3>
    </div>
    <!-- /.card-header -->

    <!-- form start -->
    <form action="{{url('addlink')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">profile_name</label>
          @error('profile_name')
            <p style="color: red">{{$message}}</p>
          @enderror
          <input type="text" name="profile_name" value="{{old('profile_name')}}" class="form-control" id="exampleInputEmail1" placeholder="Profile Name">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">phone</label>
          @error('phone')
            <p style="color: red">{{$message}}</p>
          @enderror
          <input type="text" name="phone" value="{{old('phone')}}" class="form-control" id="exampleInputEmail1" placeholder="Phone">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Email</label>
          @error('email')
            <p style="color: red">{{$message}}</p>
          @enderror
          <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputPassword1" placeholder="Email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">facebook</label>
          @error('facebook')
            <p style="color: red">{{$message}}</p>
          @enderror
          <input type="text" name="facebook" value="{{old('facebook')}}" class="form-control" id="exampleInputPassword1" placeholder="Facebook">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">linkedin</label>
          @error('linkedin')
            <p style="color: red">{{$message}}</p>
          @enderror
          <input type="text" name="linkedin" value="{{old('linkedin')}}" class="form-control" id="exampleInputPassword1" placeholder="Linkedin">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Github</label>
          @error('github')
            <p style="color: red">{{$message}}</p>
          @enderror
          <input type="text" name="github" value="{{old('github')}}" class="form-control" id="exampleInputPassword1" placeholder="Github">
        </div>
        <div class="form-group">
          <label for="exampleInputFile">File input</label>
          @error('profile_pic')
            <p style="color: red">{{$message}}</p>
          @enderror
          <div class="input-group">
            <div class="custom-file">
              <input type="file" name="profile_pic" class="custom-file-input" id="exampleInputFile">
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
            <div class="input-group-append">
              <span class="input-group-text">Upload</span>
            </div>
          </div>
        </div>
      </div>

      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection
