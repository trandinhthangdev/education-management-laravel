<?php $__env->startSection('title', 'Teacher Management'); ?>

<?php $__env->startSection('content'); ?>
<section class="mt-2">
	<div class="container">
	    <ol class="breadcrumb font-weight-bolder">
	        <li class="breadcrumb-item">
	        	<img src="<?php echo e(asset('uploads/images/pages/logo.png')); ?>" alt="" width="15"> 
	        	Management Education
	        </li>
	        <li class="breadcrumb-item active">Teacher Management</li>
	    </ol>
	</div>
	<div class="container">
		<div class="row">
			<table class="table table-bordered">
			    <thead>
			        <tr>
			            <th>No.</th>
			            <th>Teacher Code</th>
			            <th>Information</th>
			            <th>CV</th>
			            <th>Status</th>
			        </tr>
			    </thead>
			    <tbody>
			    	<?php $__currentLoopData = $teacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			        <tr>
			            <td><?php echo e($key + 1); ?></td>
			            <td><?php echo e($value->teacher_code); ?></td>
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
							<?php if($value->sex != null): ?>
								<?php echo e(($value->sex == 1) ? 'Male' : 'Female'); ?>

							<?php else: ?>
								
							<?php endif; ?>	
			            	<br>
			            	<span class="font-weight-bolder">District : </span><?php echo e($value->district); ?><br>
			            	<span class="font-weight-bolder">Province : </span><?php echo e($value->province); ?><br>
			            	<span class="font-weight-bolder">Country : </span><?php echo e($value->country); ?><hr>
			            	<img src="uploads/images/teachers/<?php echo e($value->image); ?>" alt="" class="img-thumbnail" style="width: 50px">
			            </td>
			            <td>
			            	<a href="uploads/cvs/<?php echo e($value->cv); ?>" class="badge badge-info" download="cv_<?php echo e($value->teacher_code); ?>">CV File</a>
			            </td>
			            <td>
			            	<?php if($value->status == 1): ?>
								<span class="badge badge-success" data-status="1" data-id="<?php echo e($value->id); ?>" id="status">confirmed</span>
			            	<?php elseif($value->status == 0): ?>
								<span class="badge badge-danger" data-status="0" data-id="<?php echo e($value->id); ?>" id="status">unconfimred</span>
			            	<?php elseif($value->status == -1): ?>
								<span class="badge badge-warning" data-status="-1" data-id="<?php echo e($value->id); ?>" id="status">waiting</span>
			            	<?php endif; ?>
			            </td>
			        </tr>
			       	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			    </tbody>
			</table>
			<div><?php echo e($teacher->links()); ?></div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
	$(document).ready(function(){

		$(document).on('click', '#status', function(){
			var status = $(this).data('status');
			var id = $(this).data('id');
			if(status === 0)
			{
				$.ajax({
					url : 'admin/send-mail-to-teacher/' + id,
					type : 'GET',
					dataType :'JSON',
					success : function(result){
						if(result.res_type == 'success')
						{
							toastr.success(result.response, 'Response');
							setTimeout("location.reload(true);",500);
						}
					}
				});
			}
		});
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>