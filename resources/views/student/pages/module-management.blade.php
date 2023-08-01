@extends('student.layouts.master')

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
						    	@php
					       		$module_id = array();
					       		@endphp

					       		@foreach ($student_module as $key => $value)
					       			@php
					       			$id = $value->Module->id;
					       			array_push($module_id, $id);
					       			@endphp
					       		@endforeach

						    	@foreach($module as $key => $value)
						        <tr>
						            <td>{{ $key + 1 }}</td>
						            <td>{{ $value->name }}</td>
						            <td>{{ $value->module_code }}</td>
						            <td>
										@if(in_array($value->id, $module_id))
											<span class="badge badge-success" data-id="{{ $value->id }}" data-status="1" id="status">Registered</span>
										@else
											<span class="badge badge-danger" data-id="{{ $value->id }}" data-status="0" id="status">Unregistered</span>
										@endif				
						            </td>
						        </tr>
						        @endforeach
						    </tbody>
						</table>
						<div>{{ $module->links() }}</div>
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
						    	@foreach($student_module as $key => $value)
						        <tr>
						            <td>{{ $key+1 }}</td>
						            <td>{{ $value->Module->name }}</td>
						            <td>{{ $value->Module->module_code }}</td>
						        </tr>
						        @endforeach
						    </tbody>
						</table>
		    		</div>
		    	</div>
		    </div>

		</div>
	</div>
</section>
@endsection

@push('script')
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
@endpush()

