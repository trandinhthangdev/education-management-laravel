<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	    <a class="navbar-brand" href="<?php echo e(route('student.home')); ?>">
	    	<img src="<?php echo e(asset('uploads/images/pages/logo.png')); ?>" alt="" width="30">
	    	<span>MANAGEMENT EDUCATION</span>
		</a>
	    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
	        <span class="navbar-toggler-icon"></span>
	    </button>

	    <div class="collapse navbar-collapse" id="navb">
	        <ul class="navbar-nav mr-auto">
	            <li class="nav-item">
	                <a class="nav-link <?php echo e((Request::is('student/student-information')) ? 'active' : ''); ?>" href="<?php echo e(route('student.student-information.index')); ?>">STUDENT INFORMATION</a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link <?php echo e((Request::is('student/module-management')) ? 'active' : ''); ?>" href="<?php echo e(route('student.module-management.index')); ?>">MODULE MANAGEMENT</a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link <?php echo e((Request::is('student/class-management')) ? 'active' : ''); ?>" href="<?php echo e(route('student.class-management.index')); ?>">CLASS MANAGEMENT</a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link" href="<?php echo e(route('logout')); ?>"><span><i class="fa fa-sign-out"></i></span> LOGOUT</a>
	            </li>
	        </ul>
	    </div>
	</nav>
</header>