<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - Management Education</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/toastr.min.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="bg-dark h-100">
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-6 text-center mt-5 border rounded-circle p-5">
				<div class="row mb-5">
					<div class="col-12">
						<img src="<?php echo e(asset('uploads/images/pages/logo.png')); ?>" alt="" class="w-75">				
					</div>
				</div>
				<span class="text-light font-weight-bolder h5">Management Education System</span>
			</div>
			<div class="col-md-6 text-light font-weight-bolder mt-5">
				<h2 class="text-center mb-3">Login System</h2>
				<div class="dropdown-divider mb-5"></div>
				<form action="<?php echo e(route('post-login')); ?>" method="POST">
					<?php echo csrf_field(); ?>
				    <div class="form-group">
				        <label for="email">Email :</label>
				        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email ..." required>
				    </div>
				    <div class="form-group">
				        <label for="password">Password :</label>
				        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password ..." required>
				    </div>
				    <div class="form-group form-check">
				        <label class="form-check-label">
				            <input class="form-check-input" type="checkbox" name="remember"> Remember me
				        </label>
				    </div>
				    <button type="submit" class="btn btn-light">LOGIN</button>
				    <p class="font-italic font-weight-normal mt-3">Do not have an account? <a href="<?php echo e(route('register')); ?>"><button type="button" class="badge badge-light">REGISTER</button></a></p>
				</form>
			</div>
		</div>
	</div>
	<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/toastr.min.js')); ?>"></script>
    <script type="text/javascript">
    	<?php if(session('response')): ?>
		    toastr.error('<?php echo e(session('response')); ?>', 'Response')
		<?php endif; ?>
    </script>
</body>
</html>