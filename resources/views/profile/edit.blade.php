@extends('layout.layout')
@section('title')
    Add Profile
@endsection
@section('title_page')
    Add Profile
@endsection
@section('css')
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{ asset('back/assets/css/apps/invoice-add.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('back/plugins/dropify/dropify.min.css') }}">
    <!--  END CUSTOM STYLE FILE  -->
@endsection
@section('add-content')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

        <div class="doc-container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="invoice-content">
                        <div class="invoice-detail-body">

                            <form action=" {{ route('update.profile',$profile->id) }} " method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="invoice-detail-title">
                                    <div class="invoice-logo">
                                        <div class="upload">
                                            <div class="dropify-wrapper">
                                                <div class="dropify-message"><span class="file-icon"></span>
                                                    <p>Click to Upload Picture/Logo</p>
                                                </div>
                                                <input type="file" name="profile_pic" id="input-file-max-fs"
                                                    class="dropify" data-max-file-size="2M">
                                            </div>
                                            @error('profile_pic')
                                                <p style="color: red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="invoice-detail-header">
                                    <div class="row justify-content-between">
                                        <div class="col-xl-6 invoice-address-company">
                                            <h4>From:-</h4>
                                            <div class="invoice-address-company-fields">
                                                <div class="form-group row">
                                                    <label for="profile_name"
                                                        class="col-sm-2 col-form-label col-form-label-sm">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="profile_name"
                                                            value="{{ $profile->profile_name }}"
                                                            class="form-control form-control-sm @error('profile_name') is-invalid @enderror"
                                                            id="profile_name" placeholder="Business Name">
                                                        @error('profile_name')
                                                            <p style="color: red">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="company-email"
                                                        class="col-sm-2 col-form-label col-form-label-sm">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" name="email" value="{{ $profile->email }}"
                                                            class="form-control form-control-sm @error('email') is-invalid @enderror"
                                                            id="company-email" placeholder="name@company.com">
                                                        @error('email')
                                                            <p style="color: red">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="company-phone"
                                                        class="col-sm-2 col-form-label col-form-label-sm">Phone</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="phone" value="{{ $profile->phone }}"
                                                            class="form-control form-control-sm @error('phone') is-invalid @enderror"
                                                            id="company-phone" placeholder="(123) 456 789">
                                                        @error('phone')
                                                            <p style="color: red">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-xl-6 invoice-address-client">
                                            <h4>Bill To:-</h4>
                                            <div class="invoice-address-client-fields">
                                                <div class="form-group row">
                                                    <label for="facebook"
                                                        class="col-sm-2 col-form-label col-form-label-sm">facebook</label>
                                                    <div class="col-sm-10">
                                                        <input type="url" name="fb" value="{{ $profile->fb }}"
                                                            class="form-control form-control-sm @error('fb') is-invalid @enderror"
                                                            id="facebook" placeholder="Url facebook">
                                                        @error('fb')
                                                            <p style="color: red">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="linkedin"
                                                        class="col-sm-2 col-form-label col-form-label-sm">linkedin</label>
                                                    <div class="col-sm-10">
                                                        <input type="url" name="linkedin" value="{{ $profile->linkedin }}"
                                                            class="form-control form-control-sm @error('linkedin') is-invalid @enderror"
                                                            id="linkedin" placeholder="Url linkedin">
                                                        @error('linkedin')
                                                            <p style="color: red">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="github"
                                                        class="col-sm-2 col-form-label col-form-label-sm">Github</label>
                                                    <div class="col-sm-10">
                                                        <input type="url" name="github" value="{{ $profile->github }}"
                                                            class="form-control form-control-sm @error('github') is-invalid @enderror"
                                                            id="github" placeholder="Url Github">
                                                        @error('github')
                                                            <p style="color: red">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
