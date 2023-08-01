<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
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
						        	<?php if($student->name == ''): ?>
						        		<?php echo e('Student'); ?>

						        	<?php else: ?>
						        		<?php echo e($student->name); ?>	
						        	<?php endif; ?>
						        </h4>
						        <p class="card-text">I'm A Student</p>
						        <a href="<?php echo e(route('student.student-information.index')); ?>" class="btn btn-dark">See More Info</a>
						    </div>
						</div>
    				</div>
    			</div>
    			<div class="col-lg-9">
    				<div class="jumbotron jumbotron-fluid bg-secondary">
					    <div class="container">
					        <h2 class="display-4">Hello - 
					        	<span class="font-weight-bolder">
				        			<?php if($student->name == ''): ?>
						        		<?php echo e('Student'); ?>

						        	<?php else: ?>
						        		<?php echo e($student->name); ?>	
						        	<?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('student.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>