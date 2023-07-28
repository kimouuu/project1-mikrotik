<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Dashboard</title>
</head>

<body>
        
    <div class="container">

        <h4 class="mt-5">
            @if(isset($entity))
                {!! $entity[0]['name'] !!}
            @endif
        </h4>
        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="w" class="form-label">Command</label>
                <input type="text" id="w" class="form-control" name="comm">
            </div>
            <button type="submit" class="btn btn-primary">Execute</button>
            <a href= "{{route('login') }}" class="btn btn-danger">Logout</a>
        </form>
       
        <textarea class="form-control mt-3" rows="15">
            @if(isset($result))
                {!! json_encode($result) !!}
            @endif
        </textarea>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    
</body>

</html>
