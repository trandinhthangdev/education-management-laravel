<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	    <a class="navbar-brand" href="{{ route('teacher.home') }}">
	    	<img src="{{ asset('uploads/images/pages/logo.png') }}" alt="" width="30">
	    	<span>MANAGEMENT EDUCATION</span>
		</a>
	    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
	        <span class="navbar-toggler-icon"></span>
	    </button>

	    <div class="collapse navbar-collapse" id="navb">
	        <ul class="navbar-nav mr-auto">
	            <li class="nav-item">
	                <a class="nav-link {{(Request::is('teacher/teacher-information')) ? 'active' : ''}}" href="{{ route('teacher.teacher-information.index') }}">TEACHER INFORMATION</a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link {{(Request::is('teacher/module-management')) ? 'active' : ''}}" href="{{ route('teacher.module-management.index') }}">MODULE MANAGEMENT</a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link {{(Request::is('teacher/class-management')) ? 'active' : ''}}" href="{{ route('teacher.class-management.index') }}">CLASS MANAGEMENT</a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link" href="{{ route('logout') }}"><span><i class="fa fa-sign-out"></i></span> LOGOUT</a>
	            </li>
	        </ul>
	    </div>
	</nav>
</header>