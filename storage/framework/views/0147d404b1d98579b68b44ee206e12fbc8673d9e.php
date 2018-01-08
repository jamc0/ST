<?php $__env->startSection('contentheader_title'); ?>
	Categorías 	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('htmlheader_title'); ?>
	Categorías 	
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
	<style>
		.content-wrapper
			{
    			background-color: #ffffff;
			}
		.color-azul
			{
				color: #26a69a;
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

<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
        		<h3 class="text-center color-azul"><strong><i class="fa fa-bars" aria-hidden="true"></i>&nbsp; Categoría&nbsp;<i class="fa fa-bars" aria-hidden="true"></i></strong></h3>  

								<?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                                <div class="form-group row">
	                                    <div class="col-sm-6 col-sm-offset-3">
	                                        <label class="color-azul " style="color: #00bfa5">Nombre de la Categoría:</label>
	                                        <p><?php echo e($categoria->nombre_categoria); ?></p>

	                                        </div>
	                                        
	                                    </div>
	                                  
	                                    <div class="form-group row">
	                                      <div class="col-sm-6 col-sm-offset-3" >
	                                        <label class="color-azul" style="color: #00bfa5">Descripción:</label>
	                                        <p><?php echo e($categoria->descripcion); ?></p>


	                                      </div>
	                                      
	                                    </div>
	                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                                    
	                                    
	                                   
	                                   
        	</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>