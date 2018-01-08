<?php $__env->startSection('htmlheader_title'); ?>
	Reportes por PDF
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<style>
	.sidebar-reportes
        {
            color: #f39c12;
        }
	.color-azul {
	    color: #337ab7;
	}
	.content-wrapper
		{
    		background-color: #ffffff;
		}
	.fa-bar-chart
		{
			color: #00a65a;
		}
	.form-control
		{
			border-radius:4px;
		}
	.panel-primary 
		{
    		border-color: #00a65a;
		}
	.btn-primary 
		{
    		background-color: #00a65a;
    		border-color: #00a65a;
		}

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-inicio'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h3 class="text-center color-azul"><strong><i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp; Reportes del Sistema&nbsp;<i class="fa fa-bar-chart" aria-hidden="true"></i></strong></h3>  
				<?php if(count($reportes)>0): ?>
				<div class="table-responsive">
                  <table class="table table-hover">
                   
                    <thead><tr>
                      <th class="text-center" style="vertical-align:middle;">Reporte</th>
                      <th class="text-center" style="vertical-align:middle;" colspan="2">Acciones</th>
                    </tr></thead>
                    <tbody>
                    
                    
	                    <?php $__currentLoopData = $reportes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reporte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                    <tr>
	                      <td  class="color-negro text-center" style="font-weight:300; vertical-align:middle;"><?php echo e($reporte->nombre_reporte); ?></td>
	                      <td  class="color-negro text-center" style="font-weight:300; vertical-align:middle;"><a href="<?php echo e(url('reporte_usuarios'). '/1'); ?>" target="_blank" ><button class="btn btn-block btn-primary btn-xs">Ver</button></a></td>
	                      <td  class="color-negro text-center" style="font-weight:300; vertical-align:middle;"><a href="<?php echo e(url('reporte_usuarios'). '/2'); ?>" target="_blank" ><button class="btn btn-block btn-danger btn-xs">Descargar</button></a></td>
	                    
	                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					

                   
                  </tbody></table>
                </div>
				<?php else: ?>
						<center>
                                <img src="/img/cero.png" title="0 reportes" style="width:150px;height:150px;"/>
                                <p class="color-azul">No se encontraron Opciones de Reportes</p>
                                <p class="color-azul">Cuando se le asignen los reportes estos apareceran aqui</p>
                            </center>
				<?php endif; ?>
			</div>
		</div>
	</div>		
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-fin'); ?>
<script>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>