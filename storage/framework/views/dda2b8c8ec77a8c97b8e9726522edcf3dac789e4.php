<?php $__env->startSection('htmlheader_title'); ?>
	Listado de Transportes 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
	
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="/css/jquery.bootgrid.min.css" type="text/css"> 
	<style>
	.sidebar-cruds
	        {
	            color: #f39c12;
	        }
		.fa-list
		{
			color: #009688; 
		}

		/*verde*/
		.fa-eye,.fa-pencil
		{
			color: #fff;
		}
		.active>span,.active>
		{
			color: #fff  !important;
			background-color: #009688  !important;
			border-color: #009688  !important;
		}
		.content-wrapper
		{
    		background-color: #ffffff;
		}
		.color-azul
		{
			color: #337ab7;
		}

		thead>tr
		{
			color: #337ab7;
		}

		thead>tr
		{
			background-color: #009688 !important;
    		color: #fff !important;	
		}

		tr:hover
		{
    		background-color: #009688 !important;
    		color: #fff !important;
		}
		
		.bootgrid-table th:hover {
    		 background: #009688; 
		}
		.color-white
		{
			color: #fff !important;
		}

	</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-inicio'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
        		<h3 class="text-center color-azul"><strong><i class="fa fa-list" aria-hidden="true"></i>&nbsp; Listado de Transportes&nbsp;<i class="fa fa-list" aria-hidden="true"></i></strong></h3>  
					
                    <div class="table-responsive" id="lista-personanatural">
                        <table class="table table-hover" id="tlb-transportes">
						  <thead>
						     <tr>
						      <th class="text-center" style="vertical-align:middle;" data-column-id="id" data-type="numeric">ID</th>
						      <th class="text-center" style="vertical-align:middle;" data-column-id="nombre_transporte" data-type="numeric">Nombre</th>
						      <th class="text-center" style="vertical-align:middle;" data-column-id="demora">Demora:</th>
						      <th class="text-center" style="vertical-align:middle;" data-column-id="precio">Precio:</th>
						      <th class="text-center" style="vertical-align: :middle;" data-column-id="nombre_estado" >Estado</th>
						      
						      
						      <th class="text-center" style="vertical-align:middle;" data-column-id="commands" data-formatter="commands" data-sortable="false">Acciones</th>
						    </tr>
						  </thead>
						  </table>
                    </div>

        	</div>
		</div>
	</div>
	
	

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script-fin'); ?>
<script src="/js/jquery.bootgrid.min.js"></script>
<script>

$(document).ready(function()
{
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	var gridtable= $('#tlb-transportes').bootgrid({
			
			ajax:true,
			labels: {
		        noResults: "No Existen Resultados",
		        loading: "Cargando . . . ",
		    	all: "Todos",
		    	refresh: "Cargar",
		    	search:"Buscar"
		    },
			rowSelected:true,
			post:function(){
				 return {
				            id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
				        };
			},
			url:"../Transporte/Listar",

			formatters: {

		        "commands": function(column, row)
		        {

		        	// return  "<button type=\"button\" class=\"btn btn-mensaje btn-block btn-flat\" data-toggle=\"modal\" data-target=\"#MensajeModal\"></button>";
		        	//el de abajo es el comentario que debes descomentar :v 
		            // return  "<a  class=\"btn btn-default btn-mensaje btn-info\" href=\"../Mensaje/Ver/" +   row.id + "\"><i class=\"fa fa-eye\" aria-hidden=\"true\"></i>&nbsp;</a>";
		            //el de arriba es el comentario que debes descomentar

		            // return  "<a  class=\"btn btn-default btn-info\" href=\"../PersonaJuridica/Ver/" +   row.id + "\"><i class=\"fa fa-eye\" aria-hidden=\"true\"></i>&nbsp;</a><a  class=\"btn btn-default btn-danger\" href=\"../PersonaJuridica/Editar/" +   row.id + "\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>&nbsp;</a>";

	           		
		        }
    		}
	})

});



</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>