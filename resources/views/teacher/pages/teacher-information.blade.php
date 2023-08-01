@extends('teacher.layouts.master')

@section('title', 'Teacher Information')

@section('content')
<section class="mt-2">
	<div class="container">
	    <ol class="breadcrumb font-weight-bolder">
	        <li class="breadcrumb-item">
	        	<img src="{{ asset('uploads/images/pages/logo.png') }}" alt="" width="15"> 
	        	Management Education
	        </li>
	        <li class="breadcrumb-item active">Teacher Information</li>
	    </ol>
	</div>
	<div class="container bg-dark">
    	<div class="teacher-card m-3 text-dark text-light">
    		<div class="row">
    			<div class="col-12">
    				<button class="btn btn-success m-2 float-right" data-toggle="modal" data-target="#update-info" data-id="{{ $teacher->id }}" id="update-info-btn"><span><i class="fa fa-edit"></i></span> Update Info</button>	
    			</div>
    		</div>
			<div class="card bg-dark">
			    <img class="card-img-top w-25 h-50 m-3 img-thumbnail" src="uploads/images/teachers/{{ $teacher->image }}">
			    <div class="dropdown-divider"></div>
			    <div class="card-body text-light">
			        <h4 class="font-weight-bolder">Name : <span class="font-weight-normal font-italic">{{ $teacher->name }}</span></h4>
			        <h4 class="font-weight-bolder">Email : <span class="font-weight-normal font-italic">{{ Auth::user()->email }}</span></h4>
					<h4 class="font-weight-bolder">Birthday : 
						@php
						if($teacher->birthday != null)
						{
							$birthday = date_create($teacher->birthday);
            	     		$birthday = date_format($birthday,"d/m/Y");
						}
						else
						{
							$birthday = '';
						}
						@endphp
						<span class="font-weight-normal font-italic">{{ $birthday }}</span>
					</h4>
					<h4 class="font-weight-bolder">Teacher Code  : <span class="font-weight-normal font-italic">{{ $teacher->teacher_code }}</span></h4>
					<h4 class="font-weight-bolder">Sex : 
						<span class="font-weight-normal font-italic">
						{{ ($teacher->sex) ? 'Male' : '' }}
						{{ ($teacher->sex == '0') ? 'Female' : '' }}					
						</span>
					</h4>
					<h4 class="font-weight-bolder">District : <span class="font-weight-normal font-italic">{{ $teacher->district }}</span></h4>
					<h4 class="font-weight-bolder">Province : <span class="font-weight-normal font-italic">{{ $teacher->province }}</span></h4>
					<h4 class="font-weight-bolder">Country : <span class="font-weight-normal font-italic">{{ $teacher->country }}</span></h4>
			    </div>
			</div>
		</div>
	</div>
</section>

<!-- The Modal Update-Info -->
<div class="modal font-weight-bolder" id="update-info">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Infomation Teacher</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="update-info-form">
				    <div class="form-group">
				        <label for="name">Name :</label>
				        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name ...">
				    </div>
				    <div class="form-group">
				        <label for="image">Image :</label>
				        <input type="file" class="form-control-file" id="image" accept="image/*" name="image">
				        <img class="img-thumbnail mt-2" style="width: 50px;" src="uploads/images/teachers/<?= $teacher->image ?>">
				    </div>
				    <div class="form-group">
				        <label for="email">Email :</label>
				        <input type="email" class="form-control" id="email" readonly>
				    </div>
				    <div class="form-group">
				        <label for="name">Birthday :</label>
				        <input type="date" class="form-control" name="birthday" id="birthday">
				    </div>
				    <div class="form-group">
				        <label for="email">teacher Code :</label>
				        <input type="text" class="form-control" id="teacher_code" readonly>
				    </div>
				    <div class="form-group">
				        <label for="name">Sex :</label>
				       	<select class="form-control" name="sex" id="sex">
				       		<option value="">Sex ...</option>
				       		<option value="1">Male</option>
				       		<option value="0">Female</option>
				       	</select>
				    </div>
				    <div class="form-group">
				        <label for="district">District :</label>
				        <input type="text" class="form-control" name="district" id="district" placeholder="Enter district ...">
				    </div>
				    <div class="form-group">
				        <label for="province">Province :</label>
				        <input type="text" class="form-control" name="province" id="province" placeholder="Enter province ...">
				    </div>
				    <div class="form-group">
				        <label for="country">Country :</label>
				        <input type="text" class="form-control" name="country" id="country" placeholder="Enter country ...">
				    </div>
				    <button type="submit" class="btn btn-primary" id="update-info-submit">Save</button>
				</form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
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
			$(document).on('click', '#update-info-btn', function(){
				var id = $('#update-info-btn').data('id');
				console.log(id);
				$.ajax({
					url : 'teacher/teacher-information/' + id + '/edit',
					dataType : 'json',
					type : 'GET',
					success : function(result){
						console.log(result);
						$('#name').val(result.name);
						$('#email').val(result.email);
						$('#birthday').val(result.birthday);
						$('#teacher_code').val(result.teacher_code);
						$('#sex').val(result.sex);
						$('#district').val(result.district);
						$('#province').val(result.province);
						$('#country').val(result.country);

						$('#update-info-form').on('submit', function(event){
							event.preventDefault();
							$.ajax({
								url : 'teacher/update-teacher-information/' + id,
								data: new FormData(this),
								type: 'POST',
					            dataType: 'json',
					            contentType: false,
					            cache: false,
					            processData:false,
								success : function(result){
									toastr.success(result.response, 'Response');
									setTimeout("location.reload(true);",500);
								} 
							});
						});
					}
				});
			});
		});
	</script>
@endpush()