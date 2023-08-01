@extends('student.layouts.master')

@section('title', 'Home')

@section('content')
<section>
	<div class="container-fluid bg-secondary text-light">
		<div class="container">
    		<div class="row">
    			<div class="col-lg-3">
    				<div class="student-card m-3 text-dark">
    					<div class="card">
						    <img class="card-img-top w-100 h-50" src="uploads/images/students/<?= $student->image ?>">
						    <div class="card-body">
						        <h4 class="card-title">
						        	@if($student->name == '')
						        		{{ 'Student' }}
						        	@else
						        		{{ $student->name }}	
						        	@endif
						        </h4>
						        <p class="card-text">I'm A Student</p>
						        <a href="{{ route('student.student-information.index') }}" class="btn btn-dark">See More Info</a>
						    </div>
						</div>
    				</div>
    			</div>
    			<div class="col-lg-9">
    				<div class="jumbotron jumbotron-fluid bg-secondary">
					    <div class="container">
					        <h2 class="display-4">Hello - 
					        	<span class="font-weight-bolder">
				        			@if($student->name == '')
						        		{{ 'Student' }}
						        	@else
						        		{{ $student->name }}	
						        	@endif
					        	</span>
					        </h2>
					        <p class="lead font-italic">Welcome To Education Management</p>
					    </div>
					</div>
    			</div>
    		</div>
		</div>
	</div>
</section>
@endsection

@push('script')

@endpush()