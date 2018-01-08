@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Listado de Productos
@endsection

@section('css')
<link rel="stylesheet" href="/css/jquery.bootgrid.min.css" type="text/css"> 
	<style>
	.sidebar-cruds
	        {
	            color: #f39c12;
	        }
		.fa-list
		{
			color: #26a69a;
		}
		.fa-eye,.fa-pencil
		{
			color: #fff;
		}
		.active>span,.active>a
		{
			color: #fff  !important;
			background-color: #00a65a  !important;
			border-color: #00a65a  !important;
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
			background-color: #00a65a !important;
    		color: #fff !important;	
		}

		tr:hover
		{
    		background-color: #e0e0e0 !important;
    		color: #fff !important;
		}
		
		.bootgrid-table th:hover {
    		 background: #00a65a; 
		}
		.color-white
		{
			color: #000 !important;
		}

	</style>
@endsection

@section('script-inicio')
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
        		<h3 class="text-center color-azul"><strong><i class="fa fa-list" aria-hidden="true"></i>&nbsp; Listado de Productos&nbsp;<i class="fa fa-list" aria-hidden="true"></i></strong></h3>  

                    <div class="table-responsive" id="lista-producto">
                        <table class="table table-hover" id="tbl-producto">
						  <thead>
						     <tr>
						     <th class="text-center" style="vertical-align:middle;" data-column-id="id" data-type="numeric">id</th>
						      <th class="text-center" style="vertical-align:middle;" data-column-id="cDescripcionProducto" data-type="numeric">Descripcion</th>
						      <th class="text-center" style="vertical-align:middle;" data-column-id="precio">precio</th>
						      <th class="text-center" style="vertical-align:middle;" data-column-id="stock">stock</th>
						      <th class="text-center" style="vertical-align:middle;" data-column-id="nombre_categoria">categoria</th>
						      <th class="text-center" style="vertical-align:middle;" data-column-id="nombre_estado">estado</th>
						    <th class="text-center" style="vertical-align:middle;" data-column-id="commands" data-formatter="commands" data-sortable="false">Acciones</th>
						    </tr>
						  </thead>
						  </table  >  
                    </div> 
        	</div>
		</div>
	</div>
@endsection

@section('script-fin')
<script src="/js/jquery.bootgrid.min.js"></script>
<script>

$(document).ready(function()
{
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	var gridtable= $('#tbl-producto').bootgrid({
			
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
			url:"../Productos/Listar",

			formatters: {

		        "commands": function(column, row)
		        {

		            return  "<div class =\"row\"><a  class=\"btn btn-default btn-info\" href=\"../Productos/Ver/" +   row.id + "\"><i class=\"fa fa-eye\" aria-hidden=\"true\"></i>&nbsp;</a><a  class=\"btn btn-default btn-danger\" href=\"../Productos/Editar/" +   row.id + "\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>&nbsp;</a><a  class=\"btn btn-default btn-danger\" href=\"../admin/Producto" + "\"><i class=\"fa fa-plus\" aria-hidden=\"true\"></i>&nbsp;</a></div>";

	           		    
		        }
    		}
	});

});

</script>
@endsection