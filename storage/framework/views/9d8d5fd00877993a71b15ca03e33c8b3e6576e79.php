<?php $__env->startSection('title', 'Student Management'); ?>

<?php $__env->startSection('content'); ?>
<section class="mt-2">
	<div class="container">
	    <ol class="breadcrumb font-weight-bolder">
	        <li class="breadcrumb-item">
	        	<img src="<?php echo e(asset('uploads/images/pages/logo.png')); ?>" alt="" width="15"> 
	        	Management Education
	        </li>
	        <li class="breadcrumb-item active">Student Management</li>
	    </ol>
	</div>
	<div class="container">
		<div class="row">
			<table class="table table-bordered">
			    <thead>
			        <tr>
			            <th>No.</th>
			            <th>Student Code</th>
			            <th>Information</th>
			        </tr>
			    </thead>
			    <tbody>
			    	<?php $__currentLoopData = $student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			        <tr>
			            <td><?php echo e($key + 1); ?></td>
			            <td><?php echo e($value->student_code); ?></td>
			            <td class="w-75">
			            	<span class="font-weight-bolder">Name : </span><?php echo e($value->name); ?><br>
			            	<span class="font-weight-bolder">Email : </span><?php echo e($value->User->email); ?><br>
			            	<?php
							if($value->birthday != null)
							{
								$birthday = date_create($value->birthday);
	            	     		$birthday = date_format($birthday,"d/m/Y");
							}
							else
							{
								$birthday = '';
							}
							?>
			            	<span class="font-weight-bolder">Birthdy : </span><?php echo e($birthday); ?><br>
			            	<span class="font-weight-bolder">Sex : </span>
							<?php echo e(($value->sex) ? 'Male' : ''); ?>

							<?php echo e(($value->sex == '0') ? 'Female' : ''); ?>

			            	<br>
			            	<span class="font-weight-bolder">District : </span><?php echo e($value->district); ?><br>
			            	<span class="font-weight-bolder">Province : </span><?php echo e($value->province); ?><br>
			            	<span class="font-weight-bolder">Country : </span><?php echo e($value->country); ?><hr>
			            	<img src="uploads/images/students/<?php echo e($value->image); ?>" alt="" class="img-thumbnail" style="width: 50px">
			            </td>
			        </tr>
			       	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			    </tbody>
			</table>
			<div><?php echo e($student->links()); ?></div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>