@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Añadir Producto
@endsection

@section('htmlheader_title')
	Añadir Producto
@endsection

@section('contentheader_title')
	Nuevo Producto
@endsection

@section('css')
	<style>
		.sidebar-añadir
		{
			color: #f39c12;
		}
		.content-wrapper
			{
    			background-color: #ffffff;
			}
		.color-azul
			{
				color: #009688;
			}
		.fa-pencil-square
			{
				color: #00a65a;
			}
		.form-control
			{
				border-radius:4px;
			}
		.fa-bars
	    {
			color: #009688;
	    }
	    .boton-azul
		{
			background-color: #E64A19;
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
@endsection

@section('script-inicio')
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBC-ueG56d4pm8xrNLlPssupxlCCuwWIOo&libraries=adsense&language=es"></script>
@endsection


@section('main-content')

<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
        		<h3 class="text-center color-azul"><strong><i class="fa fa-product-hunt" aria-hidden="true"></i>&nbsp; Nuevo Producto&nbsp;<i class="fa fa-product-hunt" aria-hidden="true"></i></strong></h3>  
	        	<form method="POST" action="{{url('admin/Producto')}}" accept-charset="UTF-8" class="" id="RegistroFormCategoria" enctype="multipart/form-data">
	        		<input name="_token" type="hidden" value="{{ csrf_token() }}">
	                                    <div class="form-group row">
	                                        <div class="col-sm-6 ">
	                                          <label class="color-azul ">Nombre del Producto</label>

	                                          <input type="text" class="form-control text-left"  id="cDescripcionProducto" name="cDescripcionProducto"  required placeholder="Nombre del Producto" maxlength="100" >
	                                          <span  id ="ErrorMensaje-Nombre" class="help-block"></span>
	                                        </div>

	                                        <div class="col-sm-6">
		                                        <label class="color-azul">Categoria:</label>
		                                        <select class="form-control text-center" name="categoria_id" id="categoria_id">
			                                        @foreach($categorias as $categoria)
					                                    <option value="{{ $categoria->id }}" >{{ $categoria->nombre_categoria}}</option>
			                              			@endforeach
		                            			</select>
		                                        <span  id ="ErrorMensaje-categoria" class="help-block"></span>
		                                    </div>

	                                        
	                                        
	                                    </div>
	                                    
										<div class="form-group row">
											<div class="col-sm-6">
	                                        	<lbl class="color-azul">Precio</lbl>
	                                        	<input type="text" class="form-control text-left" id="precio" name="precio" placeholder="Precio del Producto">
	                                        	<span class="help-block" id="ErrorMensaje-precio" class="help-block"></span>
	                                        </div>
	                                    	
											
											<div class="col-sm-6">
												<label class="color-azul">Stock:</label>
												<input type="text" class="form-control text-left" id="stock" name="stock" placeholder="Stock">
												<span  id ="ErrorMensaje-stock" class="help-block"></span>
											</div>
	                                    	
	                                    </div>

	                                    <div class="form-group row">
	                                    	<div class="col-sm-6 col-sm-push-4">
												<label class="color-azul">Imagen:</label>
												<input type="file" name="image" id="image" accept="image/*">
												<span  id ="ErrorMensaje-imagen" class="help-block"></span>
											</div>

	                                    </div>
	                                   
	                                    
	                                    
	                                   
	                                    <div class="row"> 
	                                      <div class="col-xs-6 col-xs-push-3">
	                                       {{-- <a href ="" id="btnContinuarPasoUno" class="btn btn-block pull-left btn-principal btn-continuar"><i class="fa fa-play-circle-o fa-3x" aria-hidden="true"></i><span style="font-size:40px;"> Continuar</span></a> --}}
	                                       <button type="submit" id="btnAñadirProducto" class="btn btn-block pull-left boton-azul"><i class="fa fa-plus fa-2x" aria-hidden="true"></i><span style="font-size:20px;">&nbsp; Añadir Producto</span></button>
	                                       <br>
	                                       <br>
	                                       <br>

	                                       <br>
	                                       <br>
	                                      </div>
	                                      
	                                    </div>
	          </form>
        	</div>
		</div>
		
	</div>

@endsection


@section('script-fin')
<script>
	$('#cDescripcionProducto').on("keypress", function(){
		$("#ErrorMensaje-Nombre").hide();
	})

	$('#precio').on("keypress", function(){
		$("#ErrorMensaje-precio").hide();
	})
	
	$('#stock').on("keypress", function(){
		$("#ErrorMensaje-stock").hide();
	})
	$('#image').on("keypress", function(){
		$("#ErrorMensaje-imagen").hide();
	})

	$('#btnAñadirProducto').on("click", function(evt)
	{

		var cDescripcionProducto = $('#cDescripcionProducto').val().trim();

		if(cDescripcionProducto == null || cDescripcionProducto.length == 0)
		{
			$("#ErrorMensaje-Nombre").text("Este campo no puede estar vacio.");
			$("#ErrorMensaje-Nombre").show();
			$("#cDescripcionProducto").focus();
			return false;
		}

		var precio = $("#precio").val().trim();
		if(precio == null || precio.length == 0)
		{
			$("#ErrorMensaje-precio").text("Este campo no puede estar vacio.");
			$("#ErrorMensaje-precio").show();
			$("#precio").focus();
			
			return false;
		}else{
			if(isNaN($('#precio').val()))
			{

				$("#ErrorMensaje-precio").text("Usted debe ingresar un numero.");
				$("#ErrorMensaje-precio").show();
				$("#precio").text();
				$("#precio").focus();
				return false;
			}
			if(Number(precio) <= 0)
				{
					$("#ErrorMensaje-precio").text("Usted debe ingresar un numero valido.");
					$("#ErrorMensaje-precio").show();
					$("#precio").text();
					$("#precio").focus();
					return false;
				}
		}

		var stock = $("#stock").val().trim();
		if(stock == null || stock.length == 0)
		{
			$("#ErrorMensaje-stock").text("Este campo no puede estar vacio.");
			$("#ErrorMensaje-stock").show();
			$("#stock").focus();
			
			return false;
		}else{
			if(isNaN($('#stock').val()))
			{
				$("#ErrorMensaje-stock").text("Usted debe ingresar un numero.");
				$("#ErrorMensaje-stock").show();
				$("#stock").text();
				$("#stock").focus();
				return false;
			}
			if(Number(stock) < 0)
				{
					$("#ErrorMensaje-stock").text("Usted debe ingresar un numero valido.");
					$("#ErrorMensaje-stock").show();
					$("#stock").text();
					$("#stock").focus();
					return false;
				}
		}
		

		var ruta = $("#image").val().trim();

		if( ruta == null || ruta.length == 0 )
		{
			$("#ErrorMensaje-imagen").text("Usted debe añadir una imagen.");
			$("#ErrorMensaje-imagen").show();
			$("#image").focus();
			return false;
		}
	});

</script>
@endsection