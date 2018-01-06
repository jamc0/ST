@extends('adminlte::layouts.app')

@section('contentheader_title')
	Mensaje
@endsection

@section('htmlheader_title')
	Mensajes
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


<div class="container">
	
		<div class="row">

			<div class="col-sm-12 col-md-3 col-md-offset-2" >
				<h3 class="h3 text-left"><strong>Nombre:</strong></h3>
			</div>

			<div class="col-sm-12 col-md-3 ">

				<h3 class="h3 text-justify ">
					{{$mensaje[0]->nombres}}
				</h3>
			</div>
			
		</div>
		 
		<div class="row">

			<div class="col-sm-12 col-md-3 col-md-offset-2" >
				<h3 class="h3"><strong>Correo Electronico:</strong></h3>
			</div>

			<div class="col-sm-12 col-md-3 ">

				<h3 class="h3 text-justify ">
					{{$mensaje[0]->correo_electronico}}
				</h3>
					
			</div>
			
		</div>


		 
		<div class="row">

			<div class="col-sm-12 col-md-3 col-md-offset-2" >
				<h3 class="h3"><strong>Teléfono:</strong></h3>
			</div>

			<div class="col-sm-12 col-md-3 ">

				<h3 class="h3 text-justify ">
					{{$mensaje[0]->telefono}}
				</h3>
					
			</div>
		</div>
		 
		<div class="row">
			<div class="col-sm-12 col-md-3 col-md-offset-2" >
				<h3 class="h3"><strong>Mensaje:</strong></h3>
			</div>

			<div class="col-sm-12 col-md-6 ">
				<h3 class="h3 text-justify ">
					{{$mensaje[0]->mensaje}}
				</h3>
			</div>

			
		</div>
		 
		<div class="row">
			<div class="col-sm-12 col-md-3 col-md-offset-2" >
				<h3 class="h3 text-left"><strong>Fecha:</strong></h3>
			</div>

			<div class="col-sm-12 col-md-3 ">

				<h3 class="h3 text-justify ">
					{{$mensaje[0]->created_at}}
				</h3>
					
			</div>
		</div>
		

		<div class="row">
			<div class="col-xs-6 col-xs-offset-3">
				{{-- Cuando habilites los mensajes, cambiar la etiqueta P por una etiqueta A --}}
				<p href="" class="btn btn-block pull-left boton-azul" role="button" onclick="alert('Esta funcionalidad estará implementada pronto');"><i class="fa fa-send fa-3x" aria-hidden="true"></i><span style="font-size:20px;">&nbsp; Responder Mensaje</span></p>
	         
	          
	          </div>
	          
          
        </div>

		
</div>



@endsection


