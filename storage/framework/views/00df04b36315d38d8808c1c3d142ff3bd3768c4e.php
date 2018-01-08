<?php $__env->startSection('contentheader_title'); ?>
	Productos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('htmlheader_title'); ?>
	Productos
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
	<style>
		.content-wrapper
			{
    			background-color: #ffffff;
			}
		.color-azul
			{
				color: #337ab7;
			}
		.fa-pencil-square
			{
				color: #00a65a;
			}
		.form-control
			{
				border-radius:4px;
			}
		.fa-product-hunt
	    {
			color: #3c8dbc;
	    }
	    .boton-azul
		{
			background-color: #3c8dbc;
			color: #ffffff;
		}
		.form-control[readonly]{
		    background-color: #ffffff;
		    opacity: 1;
		    }
		#map_canvas
	  	{
	    	width:600px; 
	    	height:400px;
	    	border: 1px solid #f50057 !important;
	  	}
		.help-block
		{
	  	    color: red;
		}
	 @media(max-width: 768px) 
	 	{
			#map_canvas
		  	{
		    	width:320px;
		  	}

		}
	</style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script-inicio'); ?>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBC-ueG56d4pm8xrNLlPssupxlCCuwWIOo&libraries=adsense&language=es"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>

<div class="container">
	
		<?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="row">

			<!-- <div class="col-sm-12 col-md-3">

				<h2 class="h2 text-left ">
					 
					<i class="fa fa-hand-o-right " aria-hidden="true"></i>&nbsp;
					
				</h2>
					
			</div> -->

			<div class="col-sm-12 col-md-2 ">

				<h4 class="h4 text-center ">
					<?php echo e($producto->cDescripcionProducto); ?>

				</h4>
					
			</div>
			<div class="col-sm-3 col-sm-push-5 col-md-3 col-md-push-1">
				<img src="<?php echo e(asset('/img/productos/' . $producto->ruta_imagen)); ?>" class="img-fluid img-rounded rounded mx-auto d-block" alt="Sample photo" width="50" height="50">
				
			</div>


			<div class="col-sm-12  col-md-2">
				<h4 class="h4 text-center ">
					<strong>Precio:</strong>
					<p><?php echo e($producto->precio); ?></p>
				</h4>
				
			</div>
			
			<div class="col-sm-12 col-md-2">
				<h4 class="h4 text-center">
					<strong>En Stock:</strong>
					<p><?php echo e($producto->stock); ?></p>
				</h4>
			</div>

			<div class="col-sm-12 col-md-2 ">
				<h4 class="h4 text-center">
					<strong>Categoria:</strong>
					<p><?php echo e($producto->nombre_categoria); ?></p>
				</h4>
			</div>
		</div>
		<hr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>