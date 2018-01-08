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

				<form method="POST" action="{{url('Boleta/Pedido')}}" accept-charset="UTF-8" class="" id="RegistroFormFactura">
	        		<input name="_token" type="hidden" value="{{ csrf_token() }}">
				

				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="form-group">
							<label class="color-azul">Cliente</label>
							<select name="persona_id"  id="persona_id" class="form-control selectpicker" data-live-search="true">
			            	 	@foreach($personas as $persona)
			            			<option value="{{$persona->id}}">{{$persona->RazonSocial}}</option>
			            		@endforeach
			            	</select>
						</div>
					</div>
					
				</div>
				

				<div class="form-group row">
					<div class="col-sm-12">
						<label  class="color-azul">Fecha de Pedido</label>
					</div>
	                <div class="col-sm-4">
	                    <label class="color-azul">Año:</label>
	                    <select class="form-control text-center" name="anio_pedido" id="anio_pedido">
		                    @foreach($anios as $anio)
				            	<option value="{{ $anio->id }}" >{{ $anio->numero_anio}}</option>
		                    @endforeach
	                    </select>
	                </div>
	                <div class="col-sm-4">
	                    <label class="color-azul">Mes:</label>
	                    <select class="form-control text-center" name="mes_pedido" id="mes_pedido">
		                    @foreach($meses as $mes)
				            	<option value="{{ $mes->id }}" >{{ $mes->nombre_mes}}</option>
		                    @endforeach
	                    </select>
	                </div>
	                <div class="col-sm-4">
	                    <label class="color-azul">Dia</label>
	                    <input type="number" name="dia_pedido" id="dia_pedido" value="7" class="form-control text-center" />
	                </div>
	            </div>                         
					
					


				
				
				<div class="form-group row">
					<div class="col-sm-12">
						<label  class="color-azul">Fecha de Entrega</label>
					</div>
	                <div class="col-sm-4">
	                    <label class="color-azul">Año:</label>
	                    <select class="form-control text-center" name="anio_entrega" id="anio_entrega">
		                    @foreach($anios as $anio)
				            	<option value="{{ $anio->id }}" >{{ $anio->numero_anio}}</option>
		                    @endforeach
	                    </select>
	                </div>
	                <div class="col-sm-4">
	                    <label class="color-azul">Mes:</label>
	                    <select class="form-control text-center" name="mes_entrega" id="mes_entrega">
		                    @foreach($meses as $mes)
				            	<option value="{{ $mes->id }}" >{{ $mes->nombre_mes}}</option>
		                    @endforeach
	                    </select>
	                </div>
	                <div class="col-sm-4">
	                    <label class="color-azul">Dia</label>
	                    <input type="number" name="dia_entrega" id="dia_entrega" value="7" class="form-control text-center" />
	                </div>                          
	            </div>

				<div class="row">

					<div class="panel panel-primary">

						<div class="panel-body">
							<div class="col-lg-4 col-sm-4 col-xs-12">
								<div class="form-group">
								<label class="color-azul">Productos</label>
								<select name="pidarticulo"  id="pidarticulo" class="form-control selectpicker" data-live-search="true">
									 @foreach($articulos as $articulo)
					            	 <option value="{{$articulo->idarticulo}}_{{$articulo->stock}}_{{$articulo->precio}}">{{$articulo->cDescripcionProducto}}</option>
					            	@endforeach
					            	</select>				
								</div>
							</div>
						
						<div class="col-lg-3 col-sm-3 col-xs-12">
							<div class="form-group">
				            	<label class="color-azul">Cantidad</label>
				            	<input type="number" name="pcantidad" id="pcantidad" class="form-control text-center" placeholder="Cantidad">
				            </div>
						</div>

					
							

						<div class="col-lg-3 col-sm-3 col-xs-12">
							<div class="form-group">
				            	<label class="color-azul">Precio</label>
				            	<input type="number"  name="pprecio_venta" id="pprecio_venta" class="form-control text-center" placeholder="Precio Venta ...">
				            </div>
						</div>
					
					 

					 <div class="col-lg-2 col-sm-2 col-xs-12">
					 	<br>
						<div class="form-group">
				            	<button class="btn btn-primary" type="button" id="bt_add">Agregar</button>
				            	<span class="help-block" id="mensaje-validacion"></span>
				            	
				          </div>
						</div>


				 
						<div class="col-lg-12 col-sm-12  col-md-12 col-xs-12 table-responsive">
						 <table id="detalles" class="table table-striped table-bordered table-condensed">
						    <thead  style="background-color:#00a65a; color:#fff;">
						     
						        <th style="vertical-align:middle;text-align:center;">Accion</th>
						        <th style="vertical-align:middle;text-align:center;">Articulo</th>
						        <th style="vertical-align:middle;text-align:center;">Cantidad</th>
						        <th style="vertical-align:middle;text-align:center;">Precio</th>
						        <th style="vertical-align:middle;text-align:center;">Descuento</th>
						        <th style="vertical-align:middle;text-align:center;">Subtotal</th>
						      
						    </thead>
						    <tfoot>
						    	 <th class="color-azul">TOTAL</th>
						        <th></th>
						        <th></th>
						        <th></th>
						        <th></th>
						        <th><h4 class="color-azul" id="total"> s/ 0.00</h4><input type="hidden" name="total_venta" id="total_venta"></th>
						    </tfoot>
						    <tbody>
						    </tbody>
						  </table>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-sm-6 col-xs-12" id="guardar">
						<div class="form-group">
				            	<button class="btn btn-primary" type="submit">Guardar</button>
				        </div>
					</div>
				</div>
				</form>
			</div>
		</div>
@endsection

@section('script-fin')
<script>
	$(document).ready(function(){
		$('#RegistroFormFactura').submit( function() 
		{
			if(total <= 0)
			{
				alert('Para realizar una orden de pedido necesita haber seleccionado algun producto');
				return false;
			}
		});

		$('#mes_pedido').change( function()
		{
			var numero_mes = $('#mes_pedido').val();
			$('#dia_pedido').val('1');
			switch(numero_mes)
			{
				case '2':
					$('#dia_pedido').attr("max", 29);
					break;
				case '1':
				case '3':
				case '5':
				case '7':
				case '8':
				case '10':
				case '12':
					$('#dia_pedido').attr("max", 31);
					break;
				default:
					$('#dia_pedido').attr("max", 30);
				
			}
			numero_mes = null;
		});
		$('#dia_pedido').change( function()
		{
			var dia = $('#dia_pedido').val();
			var max = $('#dia_pedido').attr("max");
			var min = $('#dia_pedido').attr("min");
			if( parseInt(dia) > parseInt(max) )
			{
				$('#dia_pedido').val(max);
			}else if( parseInt(dia) < parseInt(min)){
				$('#dia_pedido').val(min);
			}
			dia = null;
			max = null;
			min = null;
		});

		$('#mes_entrega').change( function()
		{
			var numero_mes = $('#mes_entrega').val();
			$('#dia_entrega').val('1');
			switch(numero_mes)
			{
				case '2':
					$('#dia_entrega').attr("max", 29);
					break;
				case '1':
				case '3':
				case '5':
				case '7':
				case '8':
				case '10':
				case '12':
					$('#dia_entrega').attr("max", 31);
					break;
				default:
					$('#dia_entrega').attr("max", 30);
				
			}
			numero_mes = null;
		});
		$('#dia_entrega').change( function()
		{
			var dia = $('#dia_entrega').val();
			var max = $('#dia_entrega').attr("max");
			var min = $('#dia_entrega').attr("min");
			if( parseInt(dia) > parseInt(max) )
			{
				$('#dia_entrega').val(max);
			}else if( parseInt(dia) < parseInt(min)){
				$('#dia_entrega').val(min);
			}
			dia = null;
			max = null;
			min = null;
		});



	    $('#bt_add').click(function(){
	    	data=document.getElementById('pidarticulo').value.split('_');
	    	
	    	var repetidos = document.querySelectorAll(".filaagregada");
                repetidos = [].slice.call(repetidos);

			repetido = false;     
		      $.each(repetidos, function( index, value ) {

		                    if (parseInt(repetidos[index].value) == data[0]) {
		                        repetidos = null;                       
		                        repetido = true;
		                    };

		                });




	    	if (repetido) {
	    		alert('No se puede ingresar articulos repetidos');
	    	}
	    	else
	    	{
	    		agregar();	
	    	}

	    	
	    	 
	    	});

	    limpiar()
	    mostrarValores();


  });
  var cont=0;
  total=0;
  subtotal=[];
  $("#guardar").hide();
  $("#pidarticulo").change(mostrarValores);
  function mostrarValores(){
  	datosArticulo=document.getElementById('pidarticulo').value.split('_');
  	$("#pprecio_venta").val(datosArticulo[2]);
  	$("#pstock").val(datosArticulo[1]);
  }
function agregar(){
	datosArticulo=document.getElementById('pidarticulo').value.split('_');
	idarticulo=datosArticulo[0];
	articulo=$("#pidarticulo option:selected").text();
	cantidad=$('#pcantidad').val();
	descuento=$('#pdescuento').val();
	precio_venta=$('#pprecio_venta').val();
	stock=$('#pstock').val();

	

	if (idarticulo!="" && cantidad != "" && cantidad>0 && descuento!="" && precio_venta!="") {
		
		subtotal[cont]=(cantidad*precio_venta);
    	total=total+subtotal[cont];
    	var fila='<tr class="selected text-center" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'" class="filaagregada">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'" class="text-center" readonly></td><td><input type="number"  name="precio_venta[]" value="'+precio_venta+'" readonly class="text-center"></td><td><input type="number" name="descuento[]" value="'+descuento+'" readonly class="text-center"></td><td>'+subtotal[cont]+'</td></tr>';
    	cont++;
    	limpiar();
    	$('#total').html("S/."+total);
    	$('#total_venta').val(total);
    	evaluar();
    	$('#detalles').append(fila);
		
    	
    }else{
    	alert('Error al Ingresar Datos');
    }
}
  
function limpiar(){
    $("#pcantidad").val("0");
    $("#pdescuento").val("0"); 
}
function evaluar()
  {
    if (total>0)
    {
      $("#guardar").show();
    }
    else
    {
      $("#guardar").hide(); 
    }
}
function eliminar(index){
    total=total-subtotal[index]; 
    $("#total").html("S/. " + total); 
    $("#total_venta").val(total);   
    $("#fila" + index).remove();
    evaluar();
}
</script>
@endsection