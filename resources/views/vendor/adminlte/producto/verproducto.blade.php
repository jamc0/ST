@extends('adminlte::layouts.app')

@section('contentheader_title')
	Productos
@endsection

@section('htmlheader_title')
	Productos
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
	    	border: 1px solid #f50057 !important;
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
	
		@foreach($productos as $producto)
		<div class="row">

			<!-- <div class="col-sm-12 col-md-3">

				<h2 class="h2 text-left ">
					 
					<i class="fa fa-hand-o-right " aria-hidden="true"></i>&nbsp;
					
				</h2>
					
			</div> -->

			<div class="col-sm-12 col-md-2 ">

				<h4 class="h4 text-center ">

					{{$producto->cDescripcionProducto}}
				</h4>
					
			</div>
			{{-- <div class="col-sm-3 col-sm-push-5 col-md-3 col-md-push-1">
				<img src="{{ asset('/img/productos/' . $producto->ruta_imagen) }}" class="img-fluid img-rounded rounded mx-auto d-block" alt="Sample photo" width="150" height="150">
				
			</div> --}}
			<div class="col-sm-3 col-sm-push-5 col-md-3 col-md-push-1">
				<img src="{{ asset('/img/productos/' . $producto->ruta_imagen) }}" class="img-fluid img-rounded rounded mx-auto d-block" alt="Sample photo" width="90" height="90">
				
			</div>




			<div class="col-sm-12  col-md-2">
				<h4 class="h4 text-center ">
					<strong>Precio:</strong>
					<p>{{$producto->precio}}</p>
				</h4>
				
			</div>
			
			<div class="col-sm-12 col-md-2">
				<h4 class="h4 text-center">
					<strong>En Stock:</strong>
					<p>{{$producto->stock}}</p>
				</h4>
			</div>

			<div class="col-sm-12 col-md-2 ">
				<h4 class="h4 text-center">
					<strong>Categoria:</strong>
					<p>{{$producto->nombre_categoria}}</p>
				</h4>
			</div>
		</div>
		<hr>
		@endforeach
</div>
@endsection





