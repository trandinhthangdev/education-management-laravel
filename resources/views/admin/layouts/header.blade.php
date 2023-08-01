<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	    <a class="navbar-brand" href="{{ route('admin.home') }}">
	    	<img src="{{ asset('uploads/images/pages/logo.png') }}" alt="" width="30">
	    	<span>MANAGEMENT EDUCATION</span>
		</a>
	    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
	        <span class="navbar-toggler-icon"></span>
	    </button>

	    <div class="collapse navbar-collapse" id="navb">
	        <ul class="navbar-nav mr-auto">
	            <li class="nav-item">
	                <a class="nav-link {{(Request::is('admin/student-management')) ? 'active' : ''}}" href="{{ route('admin.student-management.index') }}">STUDENT MANAGEMENT</a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link {{(Request::is('admin/teacher-management')) ? 'active' : ''}}" href="{{ route('admin.teacher-management.index') }}">TEACHER MANAGEMENT</a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link {{(Request::is('admin/module-management')) ? 'active' : ''}}" href="{{ route('admin.module-management.index') }}">MODULE MANAGEMENT</a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link {{(Request::is('admin/class-management')) ? 'active' : ''}}" href="{{ route('admin.class-management.index') }}">CLASS MANAGEMENT</a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link" href="{{route('logout')}}"><span><i class="fa fa-sign-out"></i></span> LOGOUT</a>
	            </li>
	        </ul>
	    </div>
	</nav>
</header>