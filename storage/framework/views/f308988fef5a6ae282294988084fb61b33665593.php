<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register - Management Education</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
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
				<h2 class="text-center mb-3">Register System</h2>
				<div class="dropdown-divider mb-5"></div>
				<form action="<?php echo e(route('post-register')); ?>" method="POST" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
				    <div class="form-group">
				        <label for="username">Email :</label>
				        <input type="email" class="form-control" name="email" placeholder="Enter email ..." required>
				        <?php if($errors->has('email')): ?>
				        <div class="alert alert-danger">
						  	<?php echo e($errors->first('email')); ?>

						</div>
				        <?php endif; ?>
				    </div>
				    <div class="form-group">
				        <label for="password">Password :</label>
				        <input type="password" class="form-control" name="password" placeholder="Enter password ..." required>
				        <?php if($errors->has('password')): ?>
				        <div class="alert alert-danger">
						  	<?php echo e($errors->first('password')); ?>

						</div>
				        <?php endif; ?>
				    </div>
				    <div class="form-group">
				        <label for="repeat_password">Repeat Password :</label>
				        <input type="password" class="form-control" name="repeat_password" placeholder="Enter repeat password ..." required>
				        <?php if($errors->has('repeat_password')): ?>
				        <div class="alert alert-danger">
						  	<?php echo e($errors->first('repeat_password')); ?>

						</div>
				        <?php endif; ?>
				    </div>
				    <div class="form-group">
				    	<label for="role">Role :</label>
				    	<select name="role_id" id="role" class="form-control">
				    		<option value="2">Teacher</option>
				    		<option value="3" selected>Student</option>
				    	</select>
				    </div>
				    <div class="form-group" id="cv-form-group">
				    	
				    </div>
				    <button type="submit" class="btn btn-light font-weight-bolder">REGISTER</button>
				    <p class="font-italic font-weight-normal mt-3">Do you already have an account? <a href="<?php echo e(route('login')); ?>"><button type="button" class="badge badge-light">LOGIN</button></a></p>
				</form>
			</div>
		</div>
	</div>
	<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript">
    	$('#role').change(function(){
    		var role = $(this).val();
    		console.log(role);
    		var html = '';
    		html += '<label for="">Upload CV :</label>';
    		html += '<input type="file" name="cv" class="form-control-file" required>';
    		if(role == 2)
    		{
    			$('#cv-form-group').html(html);
    		}
    		else if(role == 3)
    		{
    			$('#cv-form-group').html('');
    		}
    	});
    </script>
</body>
</html>