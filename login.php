<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Assignment Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background: radial-gradient(circle at top, #0f172a, #020617);
            height: 100vh;
        }
        .login-card {
            background: #020617;
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(99, 102, 241, 0.3);
        }
        .form-control {
            background: #020617;
            border: 1px solid #1e293b;
            color: #fff;
        }
        .form-control:focus {
            background: #020617;
            color: #fff;
            border-color: #6366f1;
            box-shadow: none;
        }
        .btn-primary {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            border: none;
        }
        .btn-primary:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="login-card p-4 text-white">
                <h3 class="text-center mb-4">🔐 Login</h3>

                <form method="POST" action="check_login.php">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text bg-dark text-white border-0">
                                <i class="fa fa-user"></i>
                            </span>
                            <input type="text" name="username" class="form-control" placeholder="Enter username" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-dark text-white border-0">
                                <i class="fa fa-lock"></i>
                            </span>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-3">
                        Login
                    </button>
                </form>

                <p class="text-center text-secondary mt-4" style="font-size: 13px;">
                    Assignment Portal © 2026
                </p>
            </div>
        </div>
    </div>
</div>

</body>
</html>