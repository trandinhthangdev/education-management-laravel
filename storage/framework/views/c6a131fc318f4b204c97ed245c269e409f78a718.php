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
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12 text-right m-2">
				<button class="btn btn-info" data-toggle="modal" data-target="#add-new-module-modal" id="add-new-module-btn"><span><i class="fa fa-plus"></i></span> Add New Module</button>
			</div>
		</div>
		<div class="row">
			<table class="table table-bordered">
			    <thead>
			        <tr>
			            <th>No.</th>
			            <th>Name</th>
			            <th>Module Code</th>
			            <th class="text-center"><span><i class="fa fa-cog"></i></span></th>
			        </tr>
			    </thead>
			    <tbody>
			    	<?php $__currentLoopData = $teacher_module; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			        <tr>
			            <td><?php echo e($key + 1); ?></td>
			            <td><?php echo e($value->Module->name); ?></td>
			           	<td><?php echo e($value->Module->module_code); ?></td>
			           	<td class="text-center">
			           		<button type="button" class="badge badge-danger" data-toggle="modal" data-target="#delete-module-modal" data-id="<?php echo e($value->id); ?>" id="delete-module-btn"><span><i class="fa fa-trash"></i></span></button>
			           	</td>
			        </tr>
			       	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			    </tbody>
			</table>
			<div><?php echo e($teacher_module->links()); ?></div>
		</div>
	</div>
</section>

<!-- The Modal Add-New-Module -->
<div class="modal font-weight-bolder" id="add-new-module-modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add New Module</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="add-new-module-form">
				    <div class="form-group">
				        <label for="status">Select Module :</label>
				       	<select class="form-control" name="module_id">
				       		<?php
				       		$module_id = array();
				       		?>

				       		<?php $__currentLoopData = $teacher_module; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				       			<?php
				       			$id = $value->Module->id;
				       			array_push($module_id, $id);
				       			?>
				       		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

							
				       		<?php $__currentLoopData = $module; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				       		<?php if(!in_array($mod->id, $module_id)): ?>
				       		<option value="<?php echo e($mod->id); ?>"><?php echo e($mod->name); ?></option>
				       		<?php endif; ?>
				       		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				       	</select>
				    </div>
				    <button type="submit" class="btn btn-primary" id="add-new-module-submit">Save</button>
				</form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!-- The Modal Delete-Module -->
<div class="modal font-weight-bolder" id="delete-module-modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Are you sure to delete this module ?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            	<button type="button" class="btn btn-success delete-yes">Yes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
	$(document).ready(function(){

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$('#add-new-module-btn').click(function(){
			$('#add-new-module-form').on('submit', function(event){
				event.preventDefault();
				$.ajax({
					url : 'teacher/module-management/create',
					type : 'GET',
					data : $(this).serialize(),
					dataType : 'JSON',
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

		$(document).on('click', '#delete-module-btn', function(){
			var id = $(this).data('id');
			$('.delete-yes').click(function(){
				$.ajax({
					url : 'teacher/module-management/' + id,
					type : 'DELETE',
					dataType : 'JSON',
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
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('teacher.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>