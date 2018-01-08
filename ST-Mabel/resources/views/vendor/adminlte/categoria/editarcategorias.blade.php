@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Editar Categorías
@endsection

@section('css')
	<style>
	.sidebar-cruds
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
	 
	</style>
@endsection

@section('script-inicio')
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBC-ueG56d4pm8xrNLlPssupxlCCuwWIOo&libraries=adsense&language=es"></script>
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
        		<h3 class="text-center color-azul"><strong><i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp; Editar Persona Natural&nbsp;<i class="fa fa-pencil-square" aria-hidden="true"></i></strong></h3>  
	        	<form method="POST" action="{{url('Categoria/Editar')}}" accept-charset="UTF-8" class="" id="EditarFormCategorias">
	        		<input name="_token" type="hidden" value="{{ csrf_token() }}">
	                                    <div class="form-group row">
	                                        <div class="col-sm-4">
	                                          <label class="color-azul">Nombre Categoría:</label>
	                                          <input type="text" class="form-control text-center"  id="nombre_categoria" name="nombre_categoria"  required placeholder="nombre_categoria" maxlength="20" value="{{ $categorias[0]->nombre_categoria}}">
	                                          <span  id ="ErrorMensaje-nombre_categoria" class="help-block"></span>
	                                        </div>
	                                        <div class="col-sm-4">
	                                          <label class="color-azul">Descripción:</label>
	                                          <input type="text" class="form-control text-center"  id="descripcion" name="descripcion"  required placeholder="Descripcion" maxlength="50" value="{{ $categorias[0]->descripcion}}">
	                                          <span  id ="ErrorMensaje-descripcion" class="help-block"></span>
	                                        </div>
	                                       
	                                    </div>



	                                    <div class="row"> 
	                                      <div class="col-xs-6 col-xs-push-3">
	                                       <button type="submit" id="btnEditarCategoria" class="btn btn-block pull-left btn-success"><span style="font-size:20px;">&nbsp; Editar Categoria </span><i class="fa fa-refresh" aria-hidden="true"></i></button>
	                                      <input type="text" name="" id ="" style="display:none;">
	                                      </div>
	                                      
	                                    </div>





		<input type="text" name="id" id="id" class="form-control text-center" value="{{ $categorias[0]->id}}" style="display:none;">
	          </form>
        	</div>
		</div>
	</div>
@endsection

@section('script-fin')
<script>


   initialize();

    $('#nombre_categoria').on("keypress",function (){
		$("#ErrorMensaje-nombre_categoria").hide();
	})

    $('#descripcion').on("keypress",function (){
		$("#ErrorMensaje-descripcion").hide();
	})

	
    $("#btnEditarCategoria").on("click", function(evt) 
    {
    
	    var nombre_categoria = $('#nombre_categoria').val().trim();

	    if( nombre_categoria == null || nombre_categoria.length == 0  ) {
	       nombre_categoria = null;
	       $("#ErrorMensaje-nombre_categoria").text('El Nombre de categoria no puede ser vacio.');
	         $("#ErrorMensaje-nombre_categoria").show();
	         $("#nombre_categoria").focus();
	         return false;
	       }

	    var descripcion = $('#descripcion').val().trim();

	    if( descripcion == null || descripcion.length == 0  ) {
	       descripcion = null;
	       $("#ErrorMensaje-descripcion").text('La descripcion de categorias no puede ser vacío.');
	         $("#ErrorMensaje-descripcion").show();
	         $("#descripcion").focus();
	         return false;
	       }

    $('EditarFormCategorias').submit();
  });

});

</script>
@endsection