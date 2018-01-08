 <?php $__env->startSection('htmlheader_title'); ?> Reportes Graficos <?php $__env->stopSection(); ?> <?php $__env->startSection('css'); ?>
<style>
    .color-azul {
        color: #337ab7;
    }
    .sidebar-reportes
        {
            color: #f39c12;
        }
    .content-wrapper {
        background-color: #ffffff;
    }

    .fa-bar-chart {
        color: #00a65a;
    }

    .form-control {
        border-radius: 4px;
    }

    .panel-primary {
        border-color: #00a65a;
    }
</style>
<?php $__env->stopSection(); ?> <?php $__env->startSection('script-inicio'); ?> <?php $__env->stopSection(); ?> <?php $__env->startSection('main-content'); ?>
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3 class="text-center color-azul">
                <strong>
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp; Reportes Graficos del Sistema&nbsp;
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                </strong>
            </h3>

            <div class="row">
                 <div class="col-md-4">
                    <label class="color-azul">Grafica</label>
                    <select class="form-control" id="grafica_sel" onchange="cambiar_fecha_grafica();">

                        <option value="personas">Personas</option>
                        <option value="ventas">Ventas</option>
                    </select>

                </div>



                <div class="col-md-4">
                    <label class="color-azul">Año</label>
                    <select class="form-control" id="anio_sel" onchange="cambiar_fecha_grafica();">

                        <?php $__currentLoopData = $anios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($anio->id); ?>"><?php echo e($anio->numero_anio); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                </div>


                <div class="col-md-4">
                    <label class="color-azul">Mes</label>
                    <select class="form-control" id="mes_sel" onchange="cambiar_fecha_grafica();">
                        <?php $__currentLoopData = $meses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($mes->id); ?>"><?php echo e($mes->nombre_mes); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                </div>
            </div>

            <div class="row">
                <br/>
                <div class="box box-primary">
                    <div class="box-header">
                    </div>

                    <div class="box-body" id="div_grafica_barras">
                    </div>

                    <div class="box-footer">
                    </div>
                </div>



                <br/>
                <div class="box box-primary">
                    <div class="box-header">
                    </div>

                    <div class="box-body" id="div_grafica_lineas">
                    </div>

                    <div class="box-footer">
                    </div>
                </div>

            </div>





        </div>
    </div>
</div>
<?php $__env->stopSection(); ?> <?php $__env->startSection('script-fin'); ?>
<script type="text/javascript" src="/js/highcharts.js"></script>
<script type="text/javascript" src="/js/graficas.js"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>