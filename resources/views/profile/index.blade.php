<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-12">
            <div class="d-flex flex-row-reverse">
                <div class="p-2">
                    <a href="{{route('profile.edit', auth()->user()->id)}}" method="POST" class="btn btn-primary mb-2">
                        Edit Profil
                    </a>
                </div>
            </div>
            <div class="card mb-3">
                <div class="row g-0">

                    <div class="col-md-8">
                        <div class="card-body">
                            <table class="table mb-3">
                                <tbody>

                                    <tr>
                                        <th scope="row">Nama user</th>
                                        <td>:</td>
                                        <td >{{ auth()->user()?->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>:</td>
                                        <td >{{ auth()->user()?->email }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jabatan</th>
                                        <td>:</td>
                                        <td >{{ auth()->user()?->jabatan }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Password</th>
                                        <td>:</td>
                                        <td >{{ auth()->user()?->password}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
