<?php $__env->startSection('title', 'Module Management'); ?>

<?php $__env->startSection('content'); ?>
<section class="mt-2">
	<div class="container">
	    <ol class="breadcrumb font-weight-bolder">
	        <li class="breadcrumb-item">
	        	<img src="<?php echo e(asset('uploads/images/pages/logo.png')); ?>" alt="" width="15"> 
	        	Management Education
	        </li>
	        <li class="breadcrumb-item active">Module Management</li>
	    </ol>
	    <!-- Nav pills -->
		<ul class="nav nav-pills font-weight-bolder">
		    <li class="nav-item">
		        <a class="nav-link active" data-toggle="pill" href="#all_modules">All Modules</a>
		    </li>
		   	<li class="nav-item">
		        <a class="nav-link" data-toggle="pill" href="#modules_registered"><span><i class="fa fa-check"></i></span> Modules Registered</a>
		    </li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content p-3">
			<div class="tab-pane container active" id="all_modules">
		    	<div class="row">
		    		<div class="col-12">
		    			<table class="table table-bordered">
						    <thead>
						        <tr>
						            <th>No.</th>
						            <th>Name</th>
						            <th>Module Code</th>
						            <th>Status</th>
						        </tr>
						    </thead>
						    <tbody>
						    	<?php
					       		$module_id = array();
					       		?>

					       		<?php $__currentLoopData = $student_module; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					       			<?php
					       			$id = $value->Module->id;
					       			array_push($module_id, $id);
					       			?>
					       		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						    	<?php $__currentLoopData = $module; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						        <tr>
						            <td><?php echo e($key + 1); ?></td>
						            <td><?php echo e($value->name); ?></td>
						            <td><?php echo e($value->module_code); ?></td>
						            <td>
										<?php if(in_array($value->id, $module_id)): ?>
											<span class="badge badge-success" data-id="<?php echo e($value->id); ?>" data-status="1" id="status">Registered</span>
										<?php else: ?>
											<span class="badge badge-danger" data-id="<?php echo e($value->id); ?>" data-status="0" id="status">Unregistered</span>
										<?php endif; ?>				
						            </td>
						        </tr>
						        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						    </tbody>
						</table>
						<div><?php echo e($module->links()); ?></div>
		    		</div>
		    	</div>
		    </div>
		    <div class="tab-pane container fade" id="modules_registered">
		    	<div class="row">
		    		<div class="col-12">
		    			<table class="table table-bordered">
						    <thead>
						        <tr>
						            <th>No.</th>
						            <th>Name</th>
						            <th>Module Code</th>
						        </tr>
						        <tr>
						        	
						        </tr>
						    </thead>
						    <tbody>
						    	<?php $__currentLoopData = $student_module; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						        <tr>
						            <td><?php echo e($key+1); ?></td>
						            <td><?php echo e($value->Module->name); ?></td>
						            <td><?php echo e($value->Module->module_code); ?></td>
						        </tr>
						        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						    </tbody>
						</table>
		    		</div>
		    	</div>
		    </div>

		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '#status', function(){
			var module_id = $(this).data('id');
			var status = $(this).data('status');
			$.ajax({
				url : 'student/module-management/create',
				type : 'GET',
				dataType : 'JSON',
				data : {
					module_id : module_id,
					status : status
				},
				success : function(result){
					if(result.res_type == 'success')
					{
						toastr.success(result.response, 'Response');
						setTimeout("location.reload(true);",500);
					}
				}
			});
		});	
	});
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('student.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>