@extends("layout.blank")

@section("addlink")
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
                <th>Id</th>
                <th>Name</th>
                <th>User Name</th>
                <th>Email</th>
                <th>profile_count</th>
                <th>Img</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <td> {{ $user->id }} </td>
                <td> {{ $user->name }} </td>
                <td> {{ $user->username }} </td>
                <td> {{ $user->email }} </td>
                <td> {{ $user->profile_count }} </td>
                <td><img src="{{ asset("storage/user/$user->img") }}" alt="image" style="width: 50px"></td>
                <td><a href="{{url('edit/'.$user->id)}}" class="btn btn-info toastrDefaultSuccess" target="blank">Show OR Update</a></td>
                <td>
                  <form action="{{url('destroy/'.$user->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')" >Delet</button>
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
