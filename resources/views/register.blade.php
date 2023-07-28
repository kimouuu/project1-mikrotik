<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
                <div class="col-md-6">
                <h1>Register</h1>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="register-name">Name:</label>
                        <input type="text" class="form-control" id="register-name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="register-email">Email:</label>
                        <input type="email" class="form-control" id="register-email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="register-password">Password:</label>
                        <input type="password" class="form-control" id="register-password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="register-password-confirm">Confirm Password:</label>
                        <input type="password" class="form-control" id="register-password-confirm" name="password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Place at the end of the body for faster loading) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
