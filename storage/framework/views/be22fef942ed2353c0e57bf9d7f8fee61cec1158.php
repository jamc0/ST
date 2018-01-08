<?php $__env->startSection('htmlheader_title'); ?>
	Registrar Facturas
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<style>
	.color-azul {
	    color: #337ab7;
	}
	.content-wrapper
		{
    		background-color: #ffffff;
		}
	.fa-pencil-square
		{
			color: #00a65a;
		}
	.form-control
		{
			border-radius:4px;
		}
	.panel-primary 
		{
    		border-color: #00a65a;
		}
	.btn-primary 
		{
    		background-color: #00a65a;
    		border-color: #00a65a;
		}

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-inicio'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h3 class="text-center color-azul"><strong><i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp; Registrar Facturas&nbsp;<i class="fa fa-pencil-square" aria-hidden="true"></i></strong></h3>  

				<form method="POST" action="<?php echo e(url('Venta/Factura')); ?>" accept-charset="UTF-8" class="" id="RegistroFormFactura">
	        		<input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">

				<div class="row">
					<div class="col-xs-12">
						<div class="form-group">
							<label class="color-azul">Cliente</label>
							<select name="persona_id"  id="persona_id" class="form-control selectpicker" data-live-search="true">
			            	 	<?php $__currentLoopData = $personas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $persona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			            		<option value="<?php echo e($persona->persona_id); ?>"><?php echo e($persona->RazonSocial); ?></option>
			            		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			            	</select>
						</div>
					</div>
				</div>
				<div class="form-group row">
	                <div class="col-sm-4">
	                    <label class="color-azul">Tipo de Documento:</label>
	                    <select class="form-control text-center" name="tipo_documento_id" id="tipo_documento_id">
		                    <?php $__currentLoopData = $tiposdocumentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tiposdocumento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				            <option value="<?php echo e($tiposdocumento->tipo_documento_id); ?>" ><?php echo e($tiposdocumento->descripcion_tipo_documento); ?></option>
		                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                    </select>
	                </div>
	                <div class="col-sm-4">
	                    <label class="color-azul">Tipo de Pago:</label>
	                    <select class="form-control text-center" name="tipo_pago_id" id="tipo_pago_id">
		                    <?php $__currentLoopData = $tipospagos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipospago): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				            <option value="<?php echo e($tipospago->tipo_pago_id); ?>" ><?php echo e($tipospago->nombre_tipo_pago); ?></option>
		                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                    </select>
	                </div>
	                <div class="col-sm-4">
	                    <label class="color-azul">Serie:</label>
	                    <select class="form-control text-center" name="serie_id" id="serie_id">
		                    <?php $__currentLoopData = $series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				            <option value="<?php echo e($serie->serie_id); ?>" ><?php echo e($serie->cDenominacionSerie); ?></option>
		                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                    </select>
	                </div>                          
	            </div>
<div class="form-group row">
	                <div class="col-sm-4">
	                    <label class="color-azul">Año:</label>
	                    <select class="form-control text-center" name="anio_id" id="anio_id">
		                    <?php $__currentLoopData = $anios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				            <option value="<?php echo e($anio->id); ?>" ><?php echo e($anio->numero_anio); ?></option>
		                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                    </select>
	                </div>
	                <div class="col-sm-4">
	                    <label class="color-azul">Mes:</label>
	                    <select class="form-control text-center" name="mes_id" id="mes_id">
		                    <?php $__currentLoopData = $meses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				            <option value="<?php echo e($mes->id); ?>" ><?php echo e($mes->nombre_mes); ?></option>
		                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                    </select>
	                </div>
	                <div class="col-sm-4">
	                    <label class="color-azul">Dia</label>
	                    <input type="number" name="pago_dia" id="pago_dia" value="7" class="form-control text-center" />
	                </div>                          
	            </div>

				<div class="row">

					<div class="panel panel-primary">

						<div class="panel-body">
							<div class="col-lg-4 col-sm-4 col-xs-12">
								<div class="form-group">
								<label class="color-azul">Productos</label>
								<select name="pidarticulo"  id="pidarticulo" class="form-control selectpicker" data-live-search="true">
									 <?php $__currentLoopData = $articulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $articulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					            	 <option value="<?php echo e($articulo->idarticulo); ?>_<?php echo e($articulo->stock); ?>_<?php echo e($articulo->precio); ?>"><?php echo e($articulo->cDescripcionProducto); ?></option>
					            	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					            	</select>				
								</div>
							</div>
						



						<div class="col-lg-2 col-sm-2 col-xs-12">
							<div class="form-group">
				            	<label class="color-azul">Cantidad</label>
				            	<input type="number" name="pcantidad" id="pcantidad" class="form-control text-center" placeholder="Cantidad">
				            </div>
						</div>

						<div class="col-lg-2 col-sm-2 col-xs-12">
							<div class="form-group">
				            	<label class="color-azul">Stock</label>
				            	<input type="number" name="pstock" id="pstock" disabled class="form-control text-center" placeholder="Stock ...">
				            </div>
						</div>
							

						<div class="col-lg-2 col-sm-2 col-xs-12">
							<div class="form-group">
				            	<label class="color-azul">Precio</label>
				            	<input type="number" disabled name="pprecio_venta" id="pprecio_venta" class="form-control text-center" placeholder="Precio Venta ...">
				            </div>
						</div>
					
					 <div class="col-lg-2 col-sm-2 col-xs-12">
							<div class="form-group">
				            	<label class="color-azul">Descuento</label>
				            	<input type="number" name="pdescuento" id="pdescuento" class="form-control text-center"  value="0" readonly placeholder="Descuento">
							</div>
					 </div>

					 <div class="col-lg-2 col-sm-2 col-xs-12">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-fin'); ?>
<script>
	$(document).ready(function(){
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
		if (parseInt(stock)>=parseInt(cantidad)) {
		subtotal[cont]=(cantidad*precio_venta-descuento);
    	total=total+subtotal[cont];
    	var fila='<tr class="selected text-center" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'" class="filaagregada">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'" class="text-center" readonly></td><td><input type="number"  name="precio_venta[]" value="'+precio_venta+'" readonly class="text-center"></td><td><input type="number" name="descuento[]" value="'+descuento+'" readonly class="text-center"></td><td>'+subtotal[cont]+'</td></tr>';
    	cont++;
    	limpiar();
    	$('#total').html("S/."+total);
    	$('#total_venta').val(total);
    	evaluar();
    	$('#detalles').append(fila);
		}else{
			alert("La cantidad supera el stock");
		}
    	
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>