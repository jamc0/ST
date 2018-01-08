<?php $__env->startSection('contentheader_title'); ?>
	Categorías 	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('htmlheader_title'); ?>
	Categorías 	
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
	<style>
		.sidebar-mostrar
		        {
		            color: #f39c12;
		        }
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
	    	border: 1px solid #337ab7 !important;
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
		<?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="row">

			<div class="col-sm-12 col-md-3 ">

				<h4 class="h4 text-center ">
					<strong>Nombre:</strong>
					<p><?php echo e($categoria->nombre_categoria); ?></p>
				</h4>
					
			</div>
			



			<div class="col-sm-12  col-md-6">
				<h4 class="h4 text-center ">
					<strong>Descripción:</strong>
					<p><?php echo e($categoria->descripcion); ?></p>
				</h4>
				
			</div>
			
		</div>
		<br>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>



<?php $__env->stopSection(); ?>



<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>