<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Multi ROUTER</title>
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-end " >

        <ul class="nav nav-tabs">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Menu</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/profile">Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/users">User</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/nservice">Service</a></li>
            </ul>
          </li>
        </ul>
        <div class="p-2">
           <a href= "{{route('loginin') }}"  class="btn btn-danger mb-1" >Logout</a>
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
        @endif
        </div>

    </nav>


    <div class="container mt-5">
        <h1 class="text-center mb-5">DATA Router</h1>
        @can('admin')
            <a href="{{ route('multiro.create') }}" class="btn btn-primary mb-3">TAMBAH DATA</a>
        @endcan
        @can('staff')
             <a href="nservice" class="btn btn-primary mb-3">TAMBAH SERVICE</a>
        @endcan

   <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger mb-3">Logout</button>
        </form>
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
        @endif --}}
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>HOST</th>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
                        <th>ROUTER</th>
                        <th>SERVICE</th>
                        <th>Opsi</th>
                    </thead>
                    <tbody>
                        @foreach ($multiro as $key => $mltr)
                        <tr>
                            <th>{{ $mltr->id }}</th>
                            <td>{{ $mltr->host }}</td>
                            <td>{{ $mltr->username }}</td>
                            <td>{{ $mltr->password }}</td>
                            <td>{{ $mltr->router }}</td>
                            <td>{{ $mltr->service?->service}}</td>
                            <td class="d-flex">{{ $mltr->opsi}}
<<<<<<< HEAD
                                <a href="{{route( 'home', ['multiro'=> $mltr->id]) }}" class="btn btn-success btn-sm me-2">Connect</a> 
                                <!-- <a href="{{route( 'multiro.connect', ['multiro'=> $mltr->id, 'service'=>$mltr->service]) }}" class="btn btn-success btn-sm me-2">Connect</a>  -->
=======
                                <a href="{{route( 'multiro.connect', ['multiro'=> $mltr->id, 'service'=>$mltr->service]) }}" class="btn btn-success btn-sm">Connect</a>
>>>>>>> f6c1740053c505df368966ca23097105cfc2c623


                                <a href="{{route('multiro.edit', $mltr->id)}}" class="btn btn-primary btn-sm ms-2">
                                    Edit
                                </a>
                                <form method="POSt" action="{{ route('multiro.destroy', $mltr->id) }}" class="ms-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-md btn-danger sm-1">
                                        Hapus
                                    </button>
                                </form>

                            </td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
@push('js')
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
