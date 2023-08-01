@extends('admin.layouts.master')

@section('title', 'Student Management')

@section('content')
<section class="mt-2">
	<div class="container">
	    <ol class="breadcrumb font-weight-bolder">
	        <li class="breadcrumb-item">
	        	<img src="{{ asset('uploads/images/pages/logo.png') }}" alt="" width="15"> 
	        	Management Education
	        </li>
	        <li class="breadcrumb-item active">Student Management</li>
	    </ol>
	</div>
	<div class="container">
		<div class="row">
			<table class="table table-bordered">
			    <thead>
			        <tr>
			            <th>No.</th>
			            <th>Student Code</th>
			            <th>Information</th>
			        </tr>
			    </thead>
			    <tbody>
			    	@foreach($student as $key => $value)
			        <tr>
			            <td>{{ $key + 1 }}</td>
			            <td>{{ $value->student_code }}</td>
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
							{{ ($value->sex) ? 'Male' : '' }}
							{{ ($value->sex == '0') ? 'Female' : '' }}
			            	<br>
			            	<span class="font-weight-bolder">District : </span>{{ $value->district }}<br>
			            	<span class="font-weight-bolder">Province : </span>{{ $value->province }}<br>
			            	<span class="font-weight-bolder">Country : </span>{{ $value->country }}<hr>
			            	<img src="uploads/images/students/{{ $value->image }}" alt="" class="img-thumbnail" style="width: 50px">
			            </td>
			        </tr>
			       	@endforeach
			    </tbody>
			</table>
			<div>{{ $student->links() }}</div>
		</div>
	</div>
</section>
@endsection

@push('script')

@endpush()