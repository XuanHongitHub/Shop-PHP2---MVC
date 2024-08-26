<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../mvc/admin/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../mvc/admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../mvc/admin/assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="index.php?controller=home&action=index"><b>Home</b></a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Create a new password for your account.</p>

                <form action="index.php?controller=auth&action=create" method="post">
                    <div class="input-group mb-3">
                        <input type="hidden" name="email" value="<?php echo htmlspecialchars($_GET['email'] ?? ''); ?>">
                        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token'] ?? ''); ?>">
                        <input type="password" id="newPassword" name="newPassword" class="form-control"
                            placeholder="New Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="confirmPassword" name="confirmPassword" class="form-control"
                            placeholder="Confirm New Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Change password</button>
                        </div>
                    </div>
                </form>
                <p class="mt-3 mb-1">
                    <a href="index.php?controller=auth&action=login">Login</a>
                </p>
                <p class="mb-0">
                    <a href="index.php?controller=auth&action=register" class="text-center">Register a new
                        membership</a>
                </p>
            </div>
        </div>
    </div>

    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>