@extends('layout.blank')

@section('title')
    Home Profile
@endsection
@section('addlink')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Responsive Hover Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap text-center">
                        <thead>
                            <tr>
                                <th>profile_name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Facebook</th>
                                <th>linkedin</th>
                                <th>github</th>
                                <th>Image</th>
                                <th>Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profiles as $profile)
                                <tr>
                                    <td>{{ $profile->profile_name }}</td>
                                    <td><a href="tel:{{ $profile->phone }}" target="blank">{{ $profile->phone }}</a>
                                    </td>
                                    <td><a href="mailto:{{ $profile->email }}" target="blank"><i
                                                class="fas fa-envelope fa-2x"></i></a></td>
                                    <td><a href="{{ $profile->fb }}" target="blank"><i style="color: black"
                                                class="fab fa-facebook fa-2x"></i></a></td>
                                    <td><a href="{{ $profile->linkedin }}" target="blank"><i
                                                class="fab fa-linkedin fa-2x"></i></a></td>
                                    <td><a href="{{ $profile->github }}" target="blank"><i
                                                class="fab fa-github fa-2x"></i></a></td>
                                    <td><img src="{{ asset("storage/profileimage/$profile->profile_pic") }}" alt="image"
                                            style="width: 50px"></td>
                                    <td><a href="{{ url('edit/' . $profile->id) }}" class="btn btn-info toastrDefaultSuccess"
                                            target="blank">Show OR Update</a></td>
                                    <td>
                                        <form action="{{ url('destroy/' . $profile->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure?')">Delet</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
