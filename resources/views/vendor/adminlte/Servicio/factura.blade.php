@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Nueva Boleta
@endsection

@section('contentheader_title')
	
@endsection

@section('css')
	<style>
	.sidebar-reportes
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
		.fa-pencil-square
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
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h3 class="text-center color-azul"><strong><i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp; Registrar Factura&nbsp;<i class="fa fa-pencil-square" aria-hidden="true"></i></strong></h3>  

				<form method="POST" action="{{url('Servicio/Factura')}}" accept-charset="UTF-8" class="" id="RegistroFormFactura">
	        		<input name="_token" type="hidden" value="{{ csrf_token() }}">
				

				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="form-group">
							<label class="color-azul">Cliente</label>
							<select name="ruc"  id="ruc" class="form-control selectpicker" data-live-search="true">
			            	 	@foreach($clientes as $cliente)
			            			<option value="{{$cliente->RUC}}">{{$cliente->RUC}}</option>
			            		@endforeach
			            	</select>
						</div>
					</div>
				
					<div class="col-md-6 col-sm-12">
						<div class="form-group">
							<label class="color-azul">guia</label>
							<select name="guia"  id="id" class="form-control selectpicker" data-live-search="true">
			            	 	@foreach($guia_remision as $guia)
			            			<option value="{{$guia->id}}">{{$guia->id}}</option>
			            		@endforeach
			            	</select>
						</div>
					</div>
					
				</div>


				<div class="form-group row">
					<div class="col-sm-12">
						<label  class="color-azul">Fecha </label>
					</div>

					<div class="col-sm-4">
	                    <label class="color-azul">Día:</label>
	                   <input type="text" class="form-control text-left"  id="dia_factura" name="dia_factura"  required placeholder="Día" maxlength="50" >
	                </div>
	                 <div class="col-sm-4">
	                    <label class="color-azul">Mes:</label>
	                    <select class="form-control text-center" name="mes_factura" id="mes_factura">
				            	<option value="1">Enero</option>
				            	<option value="2">Febrero</option>
				            	<option value="3">Marzo</option>
				            	<option value="4">Abril</option>
				            	<option value="4">Mayo</option>
				            	<option value="5">Junio</option>
				            	<option value="6">Julio</option>
				            	<option value="7">Agosto</option>
				            	<option value="8">Septiembre</option>
				            	<option value="9">Octubre</option>
				            	<option value="10">Noviembre</option>
				            	<option value="11">Diciembre</option>
	                    </select>
	                </div>
	                <div class="col-sm-4">
	                    <label class="color-azul">Año:</label>
	                    <select class="form-control text-center" name="anio_factura" id="anio_factura">
				            	<option value="2017">2017</option>
				            	<option value="2018">2018</option>
				            	<option value="2019">2019</option>			            	
	                    </select>
	                </div>
	                </div>
	               						                
	                <div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="form-group">
						   <div class="col-sm-6.sm-12">
                                      <label class="color-azul ">Total:</label>
                                      <input type="text" class="form-control text-left"  id="total_factura" name="total_factura"  required placeholder="Total" maxlength="50" >
                                      <span  id ="ErrorMensaje-TotalFactura" class="help-block"></span>
                                    </div>
                                </div>  

       		                    <div class="col-sm-6-sm-12">
                                      <label class="color-azul ">Descripción:</label>
                                      <input type="text" class="form-control text-left"  id="descripcion" name="descripcion"  required placeholder="Total" maxlength="50" >
                                      <span  id ="ErrorMensaje-DescripcionFactura" class="help-block"></span>
                                    </div>
                                </div>  

               <div class="row">
				<div class="col-lg-3 col-sm-3 col-xs-12">
						<div class="form-group">
				            	<label class="color-azul">Estado</label>
				            	{{-- <input type="text"  name="estado" id="estado" class="form-control text-center" placeholder="Precio Venta ..."> --}}
								<select class="form-control text-center" name="estado" id="estado">
				            	<option value="registrado">registrado</option>
				            	<option value="cancelado">cancelado</option>
				            	<option value="anulado">anulado</option>			            	
	                    </select>

				        </div>
				</div>
					<div class="row">
					<div class="col-lg-6 col-sm-6 col-xs-12" id="guardar">
						<div class="form-group">
						<br>
				            	<button class="btn btn-primary" type="submit">Guardar</button>
				        </div>
					</div>
				</div>
				</form>
			</div>
		</div>
@endsection
