<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>USER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center mb-5">Menambahkan User </h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('users.store')}}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" id="" placeholder="Name " name="name" value="{{$user->name ?? old('name')}}"> @error('') <span class="text-danger">{{$massage}}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" id="" placeholder="Email" name="email" value="{{$user->email ?? old('email')}}"> @error('') <span class="text-danger">{{$massage}}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="{{$user->password ?? old('password')}}"> @error('') <span class="text-danger">{{$massage}}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="service_id" class="form-label">Jabatan</label>
                        <select class="form-control" name="jabatan" id="jabatan">
                            <option >Admin</option>
                            <option >Staff</option>
                        </select>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary ">Simpan</button>
                        <a href="{{route('users.index')}}" class="btn btn-default">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
