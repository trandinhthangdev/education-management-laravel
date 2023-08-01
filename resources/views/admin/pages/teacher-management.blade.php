@extends('admin.layouts.master')

@section('title', 'Teacher Management')

@section('content')
<section class="mt-2">
	<div class="container">
	    <ol class="breadcrumb font-weight-bolder">
	        <li class="breadcrumb-item">
	        	<img src="{{ asset('uploads/images/pages/logo.png') }}" alt="" width="15"> 
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
			    	@foreach($teacher as $key => $value)
			        <tr>
			            <td>{{ $key + 1 }}</td>
			            <td>{{ $value->teacher_code }}</td>
			            <td class="w-75">
			            	<span class="font-weight-bolder">Name : </span>{{ $value->name }}<br>
			            	<span class="font-weight-bolder">Email : </span>{{ $value->User->email }}<br>
			            	@php
							if($value->birthday != null)
							{
								$birthday = date_create($value->birthday);
	            	     		$birthday = date_format($birthday,"d/m/Y");
							}
							else
							{
								$birthday = '';
							}
							@endphp
			            	<span class="font-weight-bolder">Birthday : </span>{{ $birthday }}<br>
			            	<span class="font-weight-bolder">Sex : </span>
							@if($value->sex != null)
								{{ ($value->sex == 1) ? 'Male' : 'Female' }}
							@else
								
							@endif	
			            	<br>
			            	<span class="font-weight-bolder">District : </span>{{ $value->district }}<br>
			            	<span class="font-weight-bolder">Province : </span>{{ $value->province }}<br>
			            	<span class="font-weight-bolder">Country : </span>{{ $value->country }}<hr>
			            	<img src="uploads/images/teachers/{{ $value->image }}" alt="" class="img-thumbnail" style="width: 50px">
			            </td>
			            <td>
			            	<a href="uploads/cvs/{{$value->cv}}" class="badge badge-info" download="cv_{{ $value->teacher_code }}">CV File</a>
			            </td>
			            <td>
			            	@if($value->status == 1)
								<span class="badge badge-success" data-status="1" data-id="{{ $value->id }}" id="status">confirmed</span>
			            	@elseif($value->status == 0)
								<span class="badge badge-danger" data-status="0" data-id="{{ $value->id }}" id="status">unconfimred</span>
			            	@elseif($value->status == -1)
								<span class="badge badge-warning" data-status="-1" data-id="{{ $value->id }}" id="status">waiting</span>
			            	@endif
			            </td>
			        </tr>
			       	@endforeach
			    </tbody>
			</table>
			<div>{{ $teacher->links() }}</div>
		</div>
	</div>
</section>
@endsection

@push('script')
<script type="text/javascript">
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

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
@endpush()