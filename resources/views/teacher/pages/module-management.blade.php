@extends('teacher.layouts.master')

@section('title', 'Module Management')

@section('content')
<section class="mt-2">
	<div class="container">
	    <ol class="breadcrumb font-weight-bolder">
	        <li class="breadcrumb-item">
	        	<img src="{{ asset('uploads/images/pages/logo.png') }}" alt="" width="15"> 
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
			    	@foreach($teacher_module as $key => $value)
			        <tr>
			            <td>{{ $key + 1 }}</td>
			            <td>{{ $value->Module->name }}</td>
			           	<td>{{ $value->Module->module_code }}</td>
			           	<td class="text-center">
			           		<button type="button" class="badge badge-danger" data-toggle="modal" data-target="#delete-module-modal" data-id="{{ $value->id }}" id="delete-module-btn"><span><i class="fa fa-trash"></i></span></button>
			           	</td>
			        </tr>
			       	@endforeach
			    </tbody>
			</table>
			<div>{{ $teacher_module->links() }}</div>
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
				       		@php
				       		$module_id = array();
				       		@endphp

				       		@foreach ($teacher_module as $key => $value)
				       			@php
				       			$id = $value->Module->id;
				       			array_push($module_id, $id);
				       			@endphp
				       		@endforeach

							
				       		@foreach($module as $mod)
				       		@if(!in_array($mod->id, $module_id))
				       		<option value="{{ $mod->id }}">{{ $mod->name }}</option>
				       		@endif
				       		@endforeach
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

@endsection

@push('script')
<script type="text/javascript">
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	$(document).ready(function(){

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
@endpush()