<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>USER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
{{-- <style>
    h1 {
      border: 1px solid grey ;
      border-radius: 20px;
      color: black;
      padding: 5px;
    }

    .btn {
      opacity: 20%;
    }

    .btn:hover{
      background-color:grey;
      border: 1px solid grey;
      opacity: 100%;
      transition-duration: 0.3s;
    }
  </style> --}}

<body>

    <div class="container mt-5">
        <h1 class="text-center mb-5">User</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">TAMBAH USER</a>
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Jabatan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->password}}</td>
                            <td>{{$user->jabatan}}</td>
                            <td class="d-flex">
                                <a href="{{route('users.edit', $user->id)}}" class="btn btn-sm btn-primary">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('users.destroy', $user->id) }}" class="ms-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger sm-1">
                                        Hapus
                                    </button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
