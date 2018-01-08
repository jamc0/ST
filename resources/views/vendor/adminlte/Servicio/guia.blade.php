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
				<h3 class="text-center color-azul"><strong><i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp; Registrar Orden de Pedido&nbsp;<i class="fa fa-pencil-square" aria-hidden="true"></i></strong></h3>  

				<form method="POST" action="{{url('Factura/GuiaRemision')}}" accept-charset="UTF-8" class="" id="RegistroFormFactura">
	        		<input name="_token" type="hidden" value="{{ csrf_token() }}">
				

				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="form-group">
							<label class="color-azul">Cliente</label>
							<select name="placa"  id="placa" class="form-control selectpicker" data-live-search="true">
			            	 	@foreach($vehiculos as $vehiculo)
			            			<option value="{{$vehiculo->placa}}">{{$vehiculo->placa}}</option>
			            		@endforeach
			            	</select>
						</div>
					</div>
					
				</div>
				

				<div class="form-group row">
					<div class="col-sm-12">
						<label  class="color-azul">Fecha de Remision</label>
					</div>

					<div class="col-sm-4">
	                    <label class="color-azul">Día:</label>
	                    <select class="form-control text-center" name="dia_remision" id="dia_remision">
				            	<option value="1">1</option>
				            	<option value="2">2</option>
				            	<option value="3">3</option>
				            	<option value="4">4</option>
				            	<option value="5">5</option>
				            	<option value="6">6</option>
				            	<option value="7">7</option>
				            	<option value="8">8</option>
				            	<option value="9">9</option>
				            	<option value="10">10</option>
				            	<option value="11">11</option>
				            	<option value="12">12</option>
				            	<option value="13">13</option>
				            	<option value="14">14</option>
				            	<option value="15">15</option>
				            	<option value="16">16</option>
				            	<option value="17">17</option>
				            	<option value="18">18</option>
				            	<option value="19">19</option>
				            	<option value="20">20</option>
				            	<option value="21">21</option>
				            	<option value="22">22</option>
				            	<option value="23">23</option>
				            	<option value="24">24</option>
				            	<option value="25">25</option>
				            	<option value="26">26</option>
				            	<option value="27">27</option>
				            	<option value="28">28</option>
				            	<option value="29">29</option>
				            	<option value="30">30</option>
				            	<option value="31">31</option>
				        </select>
	                </div>
	                 <div class="col-sm-4">
	                    <label class="color-azul">Mes:</label>
	                    <select class="form-control text-center" name="mes_remision" id="mes_remision">
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
	                    <select class="form-control text-center" name="anio_remision" id="anio_remision">
				            	<option value="2017">2017</option>
				            	<option value="2018">2018</option>
				            	<option value="2019">2019</option>			            	
	                    </select>
	                </div>
	               
					<div class="form-group row">
					<div class="col-sm-12">
						<label  class="color-azul">Fecha de Traslado</label>
					</div>

					<div class="col-sm-4">
	                    <label class="color-azul">Día:</label>
	                    <select class="form-control text-center" name="dia_traslado" id="dia_traslado">
				            	<option value="1">1</option>
				            	<option value="2">2</option>
				            	<option value="3">3</option>
				            	<option value="4">4</option>
				            	<option value="5">5</option>
				            	<option value="6">6</option>
				            	<option value="7">7</option>
				            	<option value="8">8</option>
				            	<option value="9">9</option>
				            	<option value="10">10</option>
				            	<option value="11">11</option>
				            	<option value="12">12</option>
				            	<option value="13">13</option>
				            	<option value="14">14</option>
				            	<option value="15">15</option>
				            	<option value="16">16</option>
				            	<option value="17">17</option>
				            	<option value="18">18</option>
				            	<option value="19">19</option>
				            	<option value="20">20</option>
				            	<option value="21">21</option>
				            	<option value="22">22</option>
				            	<option value="23">23</option>
				            	<option value="24">24</option>
				            	<option value="25">25</option>
				            	<option value="26">26</option>
				            	<option value="27">27</option>
				            	<option value="28">28</option>
				            	<option value="29">29</option>
				            	<option value="30">30</option>
				            	<option value="31">31</option>
				        </select>
	                </div>
	                <div class="col-sm-4">
	                    <label class="color-azul">Año:</label>
	                    <select class="form-control text-center" name="anio_traslado" id="anio_traslado">
				            	<option value="2017">2017</option>
				            	<option value="2018">2018</option>
				            	<option value="2019">2019</option>			            	
	                    </select>
	                </div>
	                <div class="col-sm-4">
	                    <label class="color-azul">Mes:</label>
	                    <select class="form-control text-center" name="mes_traslado" id="mes_traslado">
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
	                <div class="form-group row">
                                    <div class="col-sm-6">
                                    <br>
                                      <label class="color-azul ">Punto de partida:</label>
                                      <input type="text" class="form-control text-left"  id="punto_partida" name="punto_partida"  required placeholder="Punto de partida" maxlength="50" >
                                      <span  id ="ErrorMensaje-PuntoPartida" class="help-block"></span>
                                    </div>

                                    <div class="col-sm-6 ">
                                    <br>
                                      <label class="color-azul ">Punto de llegada:</label>
                                      <input type="text" class="form-control text-left"  id="punto_llegada" name="punto_llegada"  required placeholder="Punto de llegada" maxlength="50" >
                                      <span  id ="ErrorMensaje-PuntoLlegada" class="help-block"></span>
                                    </div>
                                 </div>           
    				<div class="row">
									
				<div class="form-group row">
					<div class="col-sm-12">
						<label  class="color-azul">Hora de llegada</label>
					</div>

					<div class="col-sm-4">
	                    <label class="color-azul">Hora:</label>
	                   	<input type="number"  name="hora_llegada" id="hora_llegada" class="form-control text-center" placeholder="Hora ...">
				         </div>
					<div class="col-sm-4">
	                    <label class="color-azul">Minutos:</label>
	                    	<input type="number"  name="minuto_llegada" id="minuto_llegada" class="form-control text-center" placeholder="Minutos ...">
	                    	</div>
	                <div class="col-sm-4">
	                    <label class="color-azul">Segundos:</label>
	                     <input type="number"  name="segundo_llegada" id="segundo_llegada" class="form-control text-center" placeholder="Segundos ...">   	
	                </div>
				<div class="col-lg-3 col-sm-3 col-xs-12">
						<div class="form-group">
				            	<label class="color-azul">Estado</label>
				            	<input type="text"  name="estado" id="estado" class="form-control text-center" placeholder="Precio Venta ...">
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
