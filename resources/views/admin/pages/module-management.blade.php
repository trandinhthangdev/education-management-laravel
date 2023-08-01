@extends('admin.layouts.master')

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
			    	@foreach($module as $key => $value)
			        <tr>
			            <td>{{ $key + 1 }}</td>
			            <td>{{ $value->name }}</td>
			           	<td>{{ $value->module_code }}</td>
			           	<td class="text-center">
			           		<button type="button" class="badge badge-success" data-toggle="modal" data-target="#edit-module-modal" data-id="{{ $value->id }}" id="edit-module-btn"><span><i class="fa fa-edit"></i></span></button>
			           		<button type="button" class="badge badge-danger" data-toggle="modal" data-target="#delete-module-modal" data-id="{{ $value->id }}" id="delete-module-btn"><span><i class="fa fa-trash"></i></span></button>
			           	</td>
			        </tr>
			       	@endforeach
			    </tbody>
			</table>
			<div>{{ $module->links() }}</div>
		</div>
	</div>
</section>
@endsection

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
				        <label for="name">Name :</label>
				        <input type="text" class="form-control" name="name" placeholder="Enter name ..." required>
						<div id="add-name-error-alert"></div>
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

<!-- The Modal Edit-Module -->
<div class="modal font-weight-bolder" id="edit-module-modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Module</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="edit-module-form">
				    <div class="form-group">
				        <label for="name">Name :</label>
				        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name ..." required>
				        <div id="edit-name-error-alert"></div>
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
					url : 'admin/module-management/create',
					type : 'GET',
					data : $(this).serialize(),
					dataType : 'JSON',
					success : function(result){
						if(result.res_type == 'success')
						{
							toastr.success(result.response, 'Response');
							setTimeout("location.reload(true);",500);
						}
						else
						{
							var html = '';
							if(result.response.name[0])
							{
								html += '<div class="alert alert-danger" role="alert">';
									html += result.response.name[0];
								html += '</div>';
							}
							$('#add-name-error-alert').html(html);
						}
					}
				});
			});
		});

		$(document).on('click', '#edit-module-btn', function(){
			var id = $(this).data('id');
			$.ajax({
				url : 'admin/module-management/' + id + '/edit',
				type : 'GET',
				dataType : 'JSON',
				success : function(result){
					$('#name').val(result.name);
					$('#status').val(result.status);

					$('#edit-module-form').on('submit', function(){
						event.preventDefault();
						$.ajax({
							url : 'admin/module-management/' + id,
							type : 'PUT',
							data : $(this).serialize(),
							dataType : 'JSON',
							success : function(result){
								if(result.res_type == 'success')
								{
									toastr.success(result.response, 'Response');
									setTimeout("location.reload(true);",500);
								}
								else
								{
									var html = '';
									if(result.response.name[0])
									{
										html += '<div class="alert alert-danger" role="alert">';
											html += result.response.name[0];
										html += '</div>';
									}
									$('#edit-name-error-alert').html(html);
								}
							}
						});
					});
				}
			});
		});

		$(document).on('click', '#delete-module-btn', function(){
			var id = $(this).data('id');
			$('.delete-yes').click(function(){
				$.ajax({
					url : 'admin/module-management/' + id,
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