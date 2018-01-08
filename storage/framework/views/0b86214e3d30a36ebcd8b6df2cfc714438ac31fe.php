   <div class="container">
        <?php if(Session::has('errors')): ?>
        	<div class="row">
				<div class="col-md-10 col-md-offset-1">
				    <div class="alert alert-warning alert-dismissible" role="alert">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<ul>
				            <strong>!!! Atencion, Mensaje Importante !!!</strong>
						    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li><?php echo e($error); ?></li>
					        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					    </ul>
				    </div>
				</div>
			</div>
		<?php endif; ?>
        <?php if(Session::has('status')): ?>
        	<div class="row">
				<div class="col-md-10 col-md-offset-1">
				    <div class="alert alert-success alert-dismissible alert-ok" role="alert">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<ul>
				            <strong>!!! Atencion, Mensaje Importante !!!</strong>
							<li><?php echo e(Session::get('status')); ?></li>
				        </ul>
				    </div>
				</div>
			</div>
		<?php endif; ?>		
    </div>