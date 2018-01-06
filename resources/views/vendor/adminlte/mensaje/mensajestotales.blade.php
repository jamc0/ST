@extends('adminlte::layouts.app')

@section('contentheader_title')
	Mensajes
@endsection

@section('htmlheader_title')
	Mensajes
@endsection


@section('css')
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
@endsection


@section('script-inicio')
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBC-ueG56d4pm8xrNLlPssupxlCCuwWIOo&libraries=adsense&language=es"></script>
@endsection


@section('main-content')

@foreach($mensajes as $mensaje)
<div class="container">
	
		<div class="row">

			<div class="col-sm-12 col-md-3 col-md-offset-2" >
				<h3 class="h3 text-left"><strong>Nombre:</strong></h3>
			</div>

			<div class="col-sm-12 col-md-3 ">

				<h3 class="h3 text-justify ">
					{{$mensaje->nombres}}
				</h3>
			</div>
			
		</div>
		 
		<div class="row">

			<div class="col-sm-12 col-md-3 col-md-offset-2" >
				<h3 class="h3"><strong>Correo Electronico:</strong></h3>
			</div>

			<div class="col-sm-12 col-md-3 ">

				<h3 class="h3 text-justify ">
					{{$mensaje->correo_electronico}}
				</h3>
					
			</div>
			
		</div>


		 
		<div class="row">

			<div class="col-sm-12 col-md-3 col-md-offset-2" >
				<h3 class="h3"><strong>Teléfono:</strong></h3>
			</div>

			<div class="col-sm-12 col-md-3 ">

				<h3 class="h3 text-justify ">
					{{$mensaje->telefono}}
				</h3>
					
			</div>
		</div>
		 
		<div class="row">
			<div class="col-sm-12 col-md-3 col-md-offset-2" >
				<h3 class="h3"><strong>Mensaje:</strong></h3>
			</div>

			<div class="col-sm-12 col-md-6 ">
				<h3 class="h3 text-justify ">
					{{$mensaje->mensaje}}
				</h3>
			</div>

			
		</div>
		 
		<div class="row">
			<div class="col-sm-12 col-md-3 col-md-offset-2" >
				<h3 class="h3 text-left"><strong>Fecha:</strong></h3>
			</div>

			<div class="col-sm-12 col-md-3 ">

				<h3 class="h3 text-justify ">
					{{$mensaje->created_at}}
				</h3>
					
			</div>
		</div>
		

		

		
</div>
<hr>
<hr>
@endforeach



@endsection


