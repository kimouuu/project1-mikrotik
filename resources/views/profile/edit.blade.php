<!-- resources/views/profile/edit.blade.php -->

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <div class="row g-0">

                    <div class="col-md-8">
                        <div class="card-body">
                            <form action="{{ route('profile.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama User</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" value="{{ $user->password }}">
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <select class="form-control" id="jabatan" name="jabatan" value="{{ $user->jabatan }}">
                                        <option >Admin</option>
                                        <option >Staff</option>
                                    </select>
                                </div> --}}


                                <!-- Add more input fields for other profile information -->
                                <div>
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                                <a href="{{route('profile.index')}}" class="btn btn-default">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
