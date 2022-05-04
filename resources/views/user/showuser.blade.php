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
                    <th>Id</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>IMAGE</th>
                    <th>Showprofile</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td> {{ $user->id }} </td>
                        <td> {{ $user->name }} </td>
                        <td> {{ $user->username }} </td>
                        <td> {{ $user->email }} </td>
                        <td class="image"><div class="usr-img-frame mr-2 rounded-circle"> <img alt="{{ $user->name }}" class="img-fluid rounded-circle" src="{{ asset("storage/user/$user->img") }}"></div></td>
                        <td> <a href="{{ route("show.profile",$user->id) }}"><img alt="Green Find User Male icon" srcset="https://img.icons8.com/ios-glyphs/2x/26e07f/find-user-male.png 2x" style="height: 28px; width: 28px;"></a> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
