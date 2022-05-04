<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Login Page Register</title>
    <link rel="icon" type="image/x-icon" href=" {{ asset('back/assets/img/favicon.ico')}} " />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href=" {{ asset('back/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet" type="text/css" />
    <link href=" {{ asset('back/assets/css/plugins.css') }} " rel="stylesheet" type="text/css" />
    <link href=" {{ asset('back/assets/css/authentication/form-2.css') }} " rel="stylesheet" type="text/css" />
</head>

<body class="form">
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Register</h1>
                        <p class="signup-link register">Already have an account? <a
                                href=" {{ route('/') }} ">Log in</a></p>
                        <form class="text-left" action="{{ route('register.cerate') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <label for="name">NAME</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input id="name" name="name" type="text" value="{{ old('name') }}"
                                        class="form-control" placeholder="Name">
                                    @error('name')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div id="username-field" class="field-wrapper input">
                                    <label for="username">USERNAME</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input id="username" name="username" type="text" value="{{ old('username') }}"
                                        class="form-control" placeholder="Username">
                                    @error('username')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div id="email-field" class="field-wrapper input">
                                    <label for="email">EMAIL</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-at-sign register">
                                        <circle cx="12" cy="12" r="4"></circle>
                                        <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                    </svg>
                                    <input id="email" name="email" type="text" value="{{ old('email') }}"
                                        class="form-control" placeholder="Email">
                                    @error('email')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <label for="password">PASSWORD</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="password" name="password" type="password" class="form-control"
                                        placeholder="Password">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    @error('password')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <label for="repassword">PASSWORD</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="repassword" name="repassword" type="password" class="form-control"
                                        placeholder="Retype password">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    @error('repassword')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="custom-file mb-4">
                                    <label class="custom-file-label" for="customFile">Upload (Single image)</label>
                                    <input type="file" name="img" class="custom-file-input" id="customFile"
                                        accept="image/*">
                                    @error('img')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Get Started!</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('back/assets/js/authentication/form-2.js') }}"></script>
</body>

</html>
