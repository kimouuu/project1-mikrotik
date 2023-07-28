<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="row justify-content-center mt-5">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
               <center><h1 class="card-title">Login</h1></center>
            </div>
           <div class="card-body">
        <form action="{{ route('loginin') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is invalid @enderror" name="name" aria-describedby="emailHelp">
                @error('name')
                <div id="name" class="form-text alert alert-danger">{{$message}}</div>
                @enderror
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="text" class="form-control @error('ip') is invalid @enderror" name="email" aria-describedby="emailHelp">
                @error('email')
                <div id="email" class="form-text alert alert-danger">{{$message}}</div>
                @enderror
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="pass">
            </div>
            <div class="mb-3">
                <div class="d-grid">
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                    {{-- <a href="{{route('users.index')}}" class="btn btn-default"> --}}
                </form>
                <p>Belum punya akun? <a href="register">Daftar di sini</a></p>

                </div>
            </div>
        </form>
   </div>
</div>
</div>
</div>
</body>
</html>
