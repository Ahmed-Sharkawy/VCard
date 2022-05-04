@extends('layout.layout')

@section('title')
    Home Profile
@endsection
@section('title_page')
    Home Page
@endsection
@section('add-content')
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4 text-center">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>profile_name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Facebook</th>
                    <th>linkedin</th>
                    <th>github</th>
                    <th colspan="3">Link</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profiles as $profile)
                    <tr>
                        <td class="image">
                            <div class="usr-img-frame mr-2 rounded-circle"> <img alt="{{ $profile->profile_name }}"
                                    class="img-fluid rounded-circle"
                                    src="{{ asset("storage/profileimage/$profile->profile_pic") }}"></div>
                        </td>
                        <td>{{ $profile->profile_name }}</td>
                        <td><a href="tel:{{ $profile->phone }}" target="blank">{{ $profile->phone }}</a>
                        </td>
                        <td><a href="mailto:{{ $profile->email }}" target="blank"><img alt="Email Open icon"
                                    srcset="https://img.icons8.com/fluency/2x/email-open.png 2x"
                                    style="height: 48px; width: 48px;"></a></td>
                        <td><a href="{{ $profile->fb }}" target="blank"><svg xmlns="http://www.w3.org/2000/svg" x="0px"
                                    y="0px" width="48" height="48" viewBox="0 0 48 48" style=" fill:#000000;">
                                    <linearGradient id="Ld6sqrtcxMyckEl6xeDdMa_uLWV5A9vXIPu_gr1" x1="9.993" x2="40.615"
                                        y1="9.993" y2="40.615" gradientUnits="userSpaceOnUse">
                                        <stop offset="0" stop-color="#2aa4f4"></stop>
                                        <stop offset="1" stop-color="#007ad9"></stop>
                                    </linearGradient>
                                    <path fill="url(#Ld6sqrtcxMyckEl6xeDdMa_uLWV5A9vXIPu_gr1)"
                                        d="M24,4C12.954,4,4,12.954,4,24s8.954,20,20,20s20-8.954,20-20S35.046,4,24,4z">
                                    </path>
                                    <path fill="#fff"
                                        d="M26.707,29.301h5.176l0.813-5.258h-5.989v-2.874c0-2.184,0.714-4.121,2.757-4.121h3.283V12.46 c-0.577-0.078-1.797-0.248-4.102-0.248c-4.814,0-7.636,2.542-7.636,8.334v3.498H16.06v5.258h4.948v14.452 C21.988,43.9,22.981,44,24,44c0.921,0,1.82-0.084,2.707-0.204V29.301z">
                                    </path>
                                </svg></a>
                        </td>
                        <td><a href="{{ $profile->linkedin }}" target="blank"><svg xmlns="http://www.w3.org/2000/svg"
                                    x="0px" y="0px" width="48" height="48" viewBox="0 0 48 48" style=" fill:#000000;">
                                    <path fill="#0288d1" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"></path>
                                    <path fill="#fff"
                                        d="M14 19H18V34H14zM15.988 17h-.022C14.772 17 14 16.11 14 14.999 14 13.864 14.796 13 16.011 13c1.217 0 1.966.864 1.989 1.999C18 16.11 17.228 17 15.988 17zM35 24.5c0-3.038-2.462-5.5-5.5-5.5-1.862 0-3.505.928-4.5 2.344V19h-4v15h4v-8c0-1.657 1.343-3 3-3s3 1.343 3 3v8h4C35 34 35 24.921 35 24.5z">
                                    </path>
                                </svg></a></td>
                        <td><a href="{{ $profile->github }}" target="blank"><svg xmlns="http://www.w3.org/2000/svg"
                                    x="0px" y="0px" width="48" height="48" viewBox="0 0 48 48" style=" fill:#000000;">
                                    <path fill="#fff" d="M41,24c0,9.4-7.6,17-17,17S7,33.4,7,24S14.6,7,24,7S41,14.6,41,24z">
                                    </path>
                                    <path fill="#455a64"
                                        d="M21 41v-5.5c0-.3.2-.5.5-.5s.5.2.5.5V41h2v-6.5c0-.3.2-.5.5-.5s.5.2.5.5V41h2v-5.5c0-.3.2-.5.5-.5s.5.2.5.5V41h1.8c.2-.3.2-.6.2-1.1V36c0-2.2-1.9-5.2-4.3-5.2h-2.5c-2.3 0-4.3 3.1-4.3 5.2v3.9c0 .4.1.8.2 1.1L21 41 21 41zM40.1 26.4C40.1 26.4 40.1 26.4 40.1 26.4c0 0-1.3-.4-2.4-.4 0 0-.1 0-.1 0-1.1 0-2.9.3-2.9.3-.1 0-.1 0-.1-.1 0-.1 0-.1.1-.1.1 0 2-.3 3.1-.3 1.1 0 2.4.4 2.5.4.1 0 .1.1.1.2C40.2 26.3 40.2 26.4 40.1 26.4zM39.8 27.2C39.8 27.2 39.8 27.2 39.8 27.2c0 0-1.4-.4-2.6-.4-.9 0-3 .2-3.1.2-.1 0-.1 0-.1-.1 0-.1 0-.1.1-.1.1 0 2.2-.2 3.1-.2 1.3 0 2.6.4 2.6.4.1 0 .1.1.1.2C39.9 27.1 39.9 27.2 39.8 27.2zM7.8 26.4c-.1 0-.1 0-.1-.1 0-.1 0-.1.1-.2.8-.2 2.4-.5 3.3-.5.8 0 3.5.2 3.6.2.1 0 .1.1.1.1 0 .1-.1.1-.1.1 0 0-2.7-.2-3.5-.2C10.1 26 8.6 26.2 7.8 26.4 7.8 26.4 7.8 26.4 7.8 26.4zM8.2 27.9c0 0-.1 0-.1-.1 0-.1 0-.1 0-.2.1 0 1.4-.8 2.9-1 1.3-.2 4 .1 4.2.1.1 0 .1.1.1.1 0 .1-.1.1-.1.1 0 0 0 0 0 0 0 0-2.8-.3-4.1-.1C9.6 27.1 8.2 27.9 8.2 27.9 8.2 27.9 8.2 27.9 8.2 27.9z">
                                    </path>
                                    <path fill="#455a64"
                                        d="M14.2,23.5c0-4.4,4.6-8.5,10.3-8.5c5.7,0,10.3,4,10.3,8.5S31.5,31,24.5,31S14.2,27.9,14.2,23.5z">
                                    </path>
                                    <path fill="#455a64"
                                        d="M28.6 16.3c0 0 1.7-2.3 4.8-2.3 1.2 1.2.4 4.8 0 5.8L28.6 16.3zM20.4 16.3c0 0-1.7-2.3-4.8-2.3-1.2 1.2-.4 4.8 0 5.8L20.4 16.3zM20.1 35.9c0 0-2.3 0-2.8 0-1.2 0-2.3-.5-2.8-1.5-.6-1.1-1.1-2.3-2.6-3.3-.3-.2-.1-.4.4-.4.5.1 1.4.2 2.1 1.1.7.9 1.5 2 2.8 2 1.3 0 2.7 0 3.5-.9L20.1 35.9z">
                                    </path>
                                    <path fill="#00bcd4"
                                        d="M24,4C13,4,4,13,4,24s9,20,20,20s20-9,20-20S35,4,24,4z M24,40c-8.8,0-16-7.2-16-16S15.2,8,24,8 s16,7.2,16,16S32.8,40,24,40z">
                                    </path>
                                </svg></a>
                        </td>
                        <td>
                            <form action="{{ route("view.edit.profile" , $profile->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </td>
                        <td><a href=" {{ url('profile/' . Auth::user()->username . '/' . $profile->profile_name) }} "
                                class="btn btn-success" target="_blank" rel="noopener noreferrer">Show</a></td>
                        <td>
                            <form action="{{ route('destroy.profile', $profile->id) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')">Delet</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
