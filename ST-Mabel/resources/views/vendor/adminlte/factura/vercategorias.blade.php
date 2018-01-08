@extends('adminlte::layouts.app')

@section('contentheader_title')
	Categorías 	
@endsection

@section('htmlheader_title')
	Categorías 	
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
@endsection


@section('script-inicio')
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBC-ueG56d4pm8xrNLlPssupxlCCuwWIOo&libraries=adsense&language=es"></script>
@endsection



@section('main-content')

<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
        		<h3 class="text-center color-azul"><strong><i class="fa fa-bars" aria-hidden="true"></i>&nbsp; Categoría&nbsp;<i class="fa fa-bars" aria-hidden="true"></i></strong></h3>  

								@foreach($categorias as $categoria)
	                                <div class="form-group row">
	                                    <div class="col-sm-6 col-sm-offset-3">
	                                        <label class="color-azul " style="color: #00bfa5">Nombre de la Categoría:</label>
{{-- 	                                        <input type="text" class="form-control text-left"  id="nombre_categoria" name="nombre_categoria"  required placeholder={{$categoria->nombre_categoria}} maxlength="50" >
 --}}	                                        <p>{{$categoria->nombre_categoria}}</p>

	                                        </div>
	                                        
	                                    </div>
	                                  
	                                    <div class="form-group row">
	                                      <div class="col-sm-6 col-sm-offset-3" >
	                                        <label class="color-azul" style="color: #00bfa5">Descripción:</label>
{{-- 	                                        <textarea name="descripcion" id="descripcion" cols="5" rows="6" class="form-control" placeholder={{$categoria->descripcion}}></textarea>
 --}}	                                        <p>{{$categoria->descripcion}}</p>


	                                      </div>
	                                      
	                                    </div>
	                            @endforeach
	                                    
	                                    
	                                   
	                                   
        	</div>
		</div>
	</div>

@endsection
