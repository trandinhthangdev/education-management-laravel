<?php $__env->startSection('title', 'Class Management'); ?>

<?php $__env->startSection('content'); ?>
<section class="mt-2">
	<div class="container">
	    <ol class="breadcrumb font-weight-bolder">
	        <li class="breadcrumb-item">
	        	<img src="<?php echo e(asset('uploads/images/pages/logo.png')); ?>" alt="" width="15"> 
	        	Management Education
	        </li>
	        <li class="breadcrumb-item active">Class Management</li>
	    </ol>
	    <div class="row m-3">
    		<div class="col-12 text-right">
    			<button class="btn btn-primary" data-toggle="modal" data-target="#add-new-class-modal" id="add-new-class-btn"><span><i class="fa fa-plus"></i></span> Add New Class</button>
    		</div>
    	</div>
    	<div class="row">
    		<div class="col-12">
    			<table class="table table-bordered">
				    <thead>
				        <tr>
				            <th>No.</th>
				            <th>Class Code</th>
				            <th>Module Name</th>
				            <th>Module Code</th>
				            <th class="text-center"><span><i class="fa fa-cog"></i></span></th>
				        </tr>
				    </thead>
				    <tbody>
				    	<?php $__currentLoopData = $student_class; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				        <tr>
				            <td><?php echo e($key+1); ?></td>
				            <td><?php echo e($value->Class->class_code); ?></td>
				            <td><?php echo e($value->Class->Module->name); ?></td>
				            <td><?php echo e($value->Class->Module->module_code); ?></td>
				            <td class="text-center">
				            	<button type="button" class="badge badge-danger" data-toggle="modal" data-target="#delete-class-modal" data-id="<?php echo e($value->id); ?>" id="delete-class-btn"><span><i class="fa fa-trash"></i></span></button>
				            </td>
				        </tr>
				        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    </tbody>
				</table>
    		</div>
    	</div>
	</div>
</section>

<!-- The Modal Add-New-Module -->
<div class="modal font-weight-bolder" id="add-new-class-modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add New Class</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="add-new-class-form">
				     <div class="form-group">
				        <label for="status">Select Module :</label>
				       	<select class="form-control" name="module_id" id="select_module">
				       		<?php
				       		$module_id = array();
				       		?>

				       		<?php $__currentLoopData = $student_class; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				       			<?php
				       			$id = $value->Class->Module->id;
				       			array_push($module_id, $id);
				       			?>
				       		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				       		<?php $__currentLoopData = $student_module; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $std_mod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				       		<?php if(!in_array($std_mod->Module->id, $module_id)): ?>
				       		<option value="<?php echo e($std_mod->module_id); ?>"><?php echo e($std_mod->Module->name); ?></option>
				       		<?php endif; ?>
				       		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				       	</select>
				    </div>		
				    <div class="form-group">
				        <label for="status">Select Class :</label>
				       	<select class="form-control" name="class_id" id="select_class">
				       		
				       	</select>
				    </div>				    
				    <button type="submit" class="btn btn-primary" id="add-new-class-submit">Save</button>
				</form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!-- The Modal Delete-Class -->
<div class="modal font-weight-bolder" id="delete-class-modal">
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
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	$(document).ready(function(){
		
		$('#add-new-class-btn').click(function(){
			let module_id = $('#select_module').val();
			$.ajax({
				url : 'student/get-class-module',
				dataType : 'JSON',
				type : 'GET',
				data : {
					module_id : module_id
				},
				success : function(result){
					console.log(result);
					let html = '';
					$.each(result, function(key, value){
						if(value.name === null)
						{
							value.name = 'Teacher'
						}
						html += '<option value="' + value.id + '">' + value.class_code  + '</option>';
					});
					$('#select_class').html(html);
				}
			});
			$('#select_module').on('change', function(){
				let module_id = $('#select_module').val();
				$.ajax({
					url : 'student/get-class-module',
					dataType : 'JSON',
					type : 'GET',
					data : {
						module_id : module_id
					},
					success : function(result){
						console.log(result);
						let html = '';
						$.each(result, function(key, value){
							html += '<option value="' + value.id + '">' + value.class_code  + '</option>';
						});
						$('#select_class').html(html);
					}
				});		
			});

			$('#add-new-class-form').on('submit', function(event){
				event.preventDefault();
				$.ajax({
					url : 'student/class-management/create',
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

		$(document).on('click', '#delete-class-btn', function(){
			var id = $(this).data('id');
			$('.delete-yes').click(function(){
				$.ajax({
					url : 'student/class-management/' + id,
					dataType : 'JSON',
					type : 'DELETE',
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


<?php echo $__env->make('student.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>