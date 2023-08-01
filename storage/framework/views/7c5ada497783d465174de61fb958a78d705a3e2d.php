<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome To Management Education</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="bg-dark h-100">
    <div class="jumbotron bg-dark text-light">
        <h1 class="display-4">Welcome To Management Education</h1>
        <br>
        <div class="row">
            <div class="col-lg-6">
                <p class="lead">
                    <a class="btn btn-light btn-lg" href="<?php echo e(route('login')); ?>" role="button">Login To Management Education</a>
                </p>
            </div>
            <div class="col-lg-6">
                <p>I'm A Student ! Or I'm A Teacher ! <a class="btn btn-light btn-lg" href="<?php echo e(route('register')); ?>" role="button">Register</a></p>
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
</body>
</html>