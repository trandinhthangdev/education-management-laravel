<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
<section>
	<div class="jumbotron jumbotron-fluid bg-secondary text-light">
	    <div class="container">
	        <h3 class="display-4">Hello - <span class="font-weight-bolder font-italic">Admin</span></h3>
	        <p class="lead">Welcome To Education Management</p>
	    </div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>