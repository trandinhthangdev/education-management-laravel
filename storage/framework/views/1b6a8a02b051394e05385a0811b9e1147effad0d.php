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
	</div>
	<div class="container">
		<div class="row">
    		<div class="col-12 text-right m-2">
    			<button class="btn btn-info" id="add-new-class-btn" data-toggle="modal" data-target="#add-new-class-modal"><span><i class="fa fa-plus"></i></span> Add New Class</button>
    		</div>
    	</div>
		<div class="row">
			<table class="table table-bordered">
			    <thead>
			        <tr>
			            <th>No.</th>
			            <th>Class Code</th>
			            <th>Module</th>
			            <th>Module Code</th>
			            <th>Teacher</th>
			            <th class="text-center"><span><i class="fa fa-cog"></i></span></th>
			        </tr>
			    </thead>
			    <tbody>
			    	<?php $__currentLoopData = $class; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			        <tr>
			            <td><?php echo e($key + 1); ?></td>
			            <td><?php echo e($value->class_code); ?></td>
			            <td><?php echo e($value->Module->name); ?></td>
			           	<td><?php echo e($value->Module->module_code); ?></td>
			           	<?php	
			           	$name = ($value->Teacher->name == '') ? 'Teacher' : $value->Teacher->name;
			           	?>
			           	<td><?php echo e($name); ?></td>
			           	<td class="text-center">
			           		<button type="button" class="badge badge-success view-student-class-btn" data-toggle="modal" data-target="#view-student-class-modal" data-code="<?php echo e($value->class_code); ?>" data-id="<?php echo e($value->id); ?>" ><span><i class="fa fa-eye"></i></span></button>
			           		<button type="button" class="badge badge-danger" data-toggle="modal" data-target="#delete-class-modal" data-id="<?php echo e($value->id); ?>" id="delete-class-btn"><span><i class="fa fa-trash"></i></span></button>
			           	</td>
			        </tr>
			       	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			    </tbody>
			</table>
			<div><?php echo e($class->links()); ?></div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

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
				       		<?php $__currentLoopData = $module; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				       		<option value="<?php echo e($mod->id); ?>"><?php echo e($mod->name); ?></option>
				       		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				       	</select>
				    </div>		
				    <div class="form-group">
				        <label for="status">Select Teacher :</label>
				       	<select class="form-control" name="teacher_id" id="select_teacher">
				       		
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

<!-- The Modal View-Student-Class-Modal -->
<div class="modal font-weight-bolder" id="view-student-class-modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">View All Students Class - <span id="class_code"></span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
	            <table class="table table-bordered">
				    <thead>
				        <tr>
				            <th>No.</th>
				            <th>Name</th>
				            <th>Student Code</th>
				        </tr>
				    </thead>
				    <tbody id="view-student-class-table">

				    </tbody>
				</table>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

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
				url : 'admin/get-teacher-module',
				dataType : 'JSON',
				type : 'GET',
				data : {
					module_id : module_id
				},
				success : function(result){
					let html = '';
					$.each(result, function(key, value){
						if(value.name === null)
						{
							value.name = 'Teacher'
						}
						html += '<option value="' + value.id + '">' + value.name + ' - ' + value.teacher_code + '</option>';
					});
					$('#select_teacher').html(html);
				}
			});
			$('#select_module').on('change', function(){
				let module_id = $('#select_module').val();
				$.ajax({
					url : 'admin/get-teacher-module',
					dataType : 'JSON',
					type : 'GET',
					data : {
						module_id : module_id
					},
					success : function(result){
						let html = '';
						$.each(result, function(key, value){
						if(value.name === null)
						{
							value.name = 'Teacher'
						}
						html += '<option value="' + value.id + '">' + value.name + ' - ' + value.teacher_code + '</option>';
					});
					$('#select_teacher').html(html);
					}
				});		
			});

			$('#add-new-class-form').on('submit', function(event){
				event.preventDefault();
				$.ajax({
					url : 'admin/class-management/create',
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
					url : 'admin/class-management/' + id,
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

		$(document).on('click', '.view-student-class-btn', function(){
			class_id = $(this).data('id');
			class_code = $(this).data('code');
			$('#class_code').html(class_code);
			$.ajax({
				url : 'admin/view-student-class',
				type : 'GET',
				dataType : 'JSON',
				data : {
					class_id : class_id
				},
				success : function(result){
					var html = '';
					$.each(result, function(key, value){
						html += '<tr>';
							html += '<td>' + (key+1) + '</td>';
							html += '<td>' + value.name + '</td>';
							html += '<td>' + value.student_code + '</td>';
						html += '</tr>';
					});
					$('#view-student-class-table').html(html);
				}
			});
		});

	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>