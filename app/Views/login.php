<!DOCTYPE html>
<html>
<head>
    <title>Login SB Admin 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {background-color: #4e73df; height: 100vh; display: flex; align-items: center; justify-content: center;}
        .card { width: 400px; border-radius: 1rem; overflow: hidden; border:none; }
        .btn-primary { background-color: #4e73df; border-radius: 10rem; }
    </style>
</head>
<body>
    <div class="card shadow-lg">
        <div class="card-body p-5">
            <div class="text-center mb-4">
                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
            </div>
            <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
            <?php endif;?>
            <form action="/login/auth" method="post">
                <div class="mb-3">
                    <input type="text" name="username" class="form-control form-control-lg fs-6" placeholder="Enter Username..." required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control form-control-lg fs-6" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
            </form>
        </div>
    </div>
</body>
</html>