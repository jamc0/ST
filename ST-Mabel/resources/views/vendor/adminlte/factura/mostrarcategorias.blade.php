@extends('adminlte::layouts.app')

@section('contentheader_title')
	Categorías 	
@endsection

@section('htmlheader_title')
	Categorías 	
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

<div class="container">
		@foreach($categorias as $categoria)
		<div class="row">

			<div class="col-sm-12 col-md-3 ">

				<h4 class="h4 text-center ">
					<strong>Nombre:</strong>
					<p>{{$categoria->nombre_categoria}}</p>
				</h4>
					
			</div>
			



			<div class="col-sm-12  col-md-6">
				<h4 class="h4 text-center ">
					<strong>Descripción:</strong>
					<p>{{$categoria->descripcion}}</p>
				</h4>
				
			</div>
			
		</div>
		<br>
		@endforeach
</div>



@endsection


