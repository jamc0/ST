@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Editar Provedor
@endsection

@section('contentheader_title')
	Editar Proveedor
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
        		<h3 class="text-center color-azul"><strong><i class="fa fa-users" aria-hidden="true"></i>&nbsp; Proveedor&nbsp;<i class="fa fa-users" aria-hidden="true"></i></strong></h3>  
	        	<form method="POST" action="{{url('PersonaJuridica/Editar')}}" accept-charset="UTF-8" class="" id="RegistroFormPersonaJuridica">
	        		<input name="_token" type="hidden" value="{{ csrf_token() }}">
	                                    <div class="form-group row">
	                                        <div class="col-sm-4">
	                                          <label class="color-azul">RUC:</label>
	                                          <input type="text" value="{{ $personajuridica['0']->Ruc }}" class="form-control text-center"  id="Ruc" name="Ruc"  required placeholder="12358132134" maxlength="11">
	                                          <span  id ="ErrorMensaje-Ruc" class="help-block"></span>
	                                        </div>
	                                        <div class="col-sm-4">
	                                          <label class="color-azul">Razon Social:</label>
	                                          <input type="text" value="{{$personajuridica['0']->RazonSocial }}" class="form-control text-center"  id="RazonSocial" name="RazonSocial"  required placeholder="Ejemplo SAC" maxlength="100">
	                                          <span  id ="ErrorMensaje-RazonSocial" class="help-block"></span>
	                                        </div>
	                                        <div class="col-sm-4">
	                                        	
	                                          <label class="color-azul">Descripción:</label>
	                                           <textarea name="cDescripcionEmpresa" id="cDescripcionEmpresa" cols="10" rows="2" class="form-control" maxlength="1000" placeholder="Empresa Dedicada a ...">{{$personajuridica['0']->cDescripcionEmpresa}}</textarea>
	                                          
	                                          <span  id ="ErrorMensaje-cDescripcionEmpresa" class="help-block"></span>
	                                        </div>
	                                    </div>
	                                    
	                                    
	                                    <div class="form-group row">
	                                      <div class="col-sm-4">
	                                        <label class="color-azul">Departamento:</label>
	                                        <select class="form-control text-center" name="departamento_id" id="departamento_id">
		                                         @foreach($departamentos as $departamento)
													@if($departamento->id == $personajuridica[0]->departamento_id)
				                                    <option selected value="{{ $departamento->id }}">{{ $departamento->cNomZona}}</option>
		                              				@else
														<option value="{{ $departamento->id }}">{{ $departamento->cNomZona}}</option>
		                              				@endif
		                              			@endforeach
		                              			
	                            			</select>
	                                        <span  id ="ErrorMensaje-departamento_id" class="help-block"></span>
	                                      </div>
	                                      <div class="col-sm-4">
	                                        <label class="color-azul">Provincia:</label>
											<select class="form-control text-center" name="provincia_id" id="provincia_id">
												@foreach($provincias as $provincia)
													@if($provincia->id == $personajuridica[0]->provincia_id)
				                                    	<option selected value="{{ $provincia->id }}">{{ $provincia->cNomZona}}</option>
		                              				@else
														<option value="{{ $provincia->id }}">{{ $provincia->cNomZona}}</option>
		                              				@endif
		                              			@endforeach
											</select>
	                                        <span  id ="ErrorMensaje-provincia_id" class="help-block"></span>
	                                      </div>
	                                      <div class="col-sm-4">
	                                        <label class="color-azul">Distrito:</label>
											<select class="form-control text-center" name="distrito_id" id="distrito_id">
												@foreach($distritos as $distrito)
													@if($distrito->id == $personajuridica[0]->distrito_id)
				                                    	<option selected value="{{ $distrito->id }}">{{ $distrito->cNomZona}}</option>
		                              				@else
														<option value="{{ $distrito->id }}">{{ $distrito->cNomZona}}</option>
		                              				@endif
		                              			@endforeach
											</select>
	                                        <span  id ="ErrorMensaje-distrito_id" class="help-block"></span>
	                                      </div>
	                                    </div>
	                                    <div class="form-group row">
	                                      <div class="col-sm-6">
	                                        <label class="color-azul">Dirección de Negocio:</label>
	                                        <input type="text" value="{{ $personajuridica['0']->cDireccionNegocio }}" class="form-control text-center" 
	                                        id="cDireccionNegocio" name="cDireccionNegocio"  required placeholder="Dirección de Negocio">
	                                        <span  id ="ErrorMensaje-cDireccionNegocio" class="help-block"></span>
	                                      </div>
	                                      <div class="col-sm-6">
	                                        <label class="color-azul">Pagina de Contacto:</label>
	                                        <input type="text" value="{{ $personajuridica['0']->cPaginaContacto }}" class="form-control text-center"  id="cPaginaContacto" name="cPaginaContacto"  placeholder="www.ejemplo.com">
	                                        <span  id ="ErrorMensaje-cPaginaContacto" class="help-block"></span>
	                                      </div>


	                                    </div>

										
										<div class="form-group">
											<div class="row">
		                                        <div class="col-sm-4">
		                                        	<label class="color-azul">Estado:</label>
													<select class="form-control text-center" name="estado_id" id="estado_id">
														@foreach($estados as $estado)
															@if($estado->id == $personajuridica[0]->estado_id)
						                                    	<option selected value="{{ $estado->id }}">{{ $estado->nombre_estado}}</option>
				                              				@else
																<option value="{{ $estado->id }}">{{ $estado->nombre_estado}}</option>
				                              				@endif
				                              			@endforeach
													</select>
		                                        	<span  id ="ErrorMensaje-estado_id" class="help-block"></span>
		                                      	</div>
											</div>
	                                    </div>

	                                    <div class="form-group">
	                                        <input type="text" name="id" id="id" class="form-control text-center" value="{{$personajuridica[0]->id}}" style="display:none;">
											<input type="text" name="persona_id" id="persona_id" class="form-control text-center" value="{{$personajuridica[0]->persona_id}}" style="display:none;">
	          
	                                    </div>
	                                    <label class="color-azul">Ubicar su Negocio en el Mapa:</label>
	                                    
	                                    <div class="form-group">
	                                      <div class="row">  
	                                        <div class="col-xs-12 col-sm-6">
	                                            <label class="color-azul">Latitud</label>
	                                            <input type="text" value="{{ $personajuridica['0']->nLatitudNegocio }}" name="nLatitudNegocio" id="nLatitudNegocio" class="form-control text-center" required pattern="" title="" readonly>
	                                          </div>
	                                        <div class="col-xs-12 col-sm-6">
	                                          <label class="color-azul">Longitud</label>
	                                          <input type="text" value="{{ $personajuridica['0']->nLongitudNegocio }}" name="nLongitudNegocio" id="nLongitudNegocio" class="form-control text-center"  required pattern="" title="" readonly>
	                                        </div>
	                                      </div>
	                                      <div class="form-group">
	                                      </div>
	                                     <div class="row">  
	                                        <div class="col-xs-12">
	                                        <center><div id='map_canvas' style="background:#f7f7f7;"></div></center>
	                                        </div>
	                                      </div>    
	                                    </div>
	                                    
	                                   
	                                    <div class="row"> 
	                                      <div class="col-xs-6 col-xs-push-3">
	                                       {{-- <a href ="" id="btnContinuarPasoUno" class="btn btn-block pull-left btn-principal btn-continuar"><i class="fa fa-play-circle-o fa-3x" aria-hidden="true"></i><span style="font-size:40px;"> Continuar</span></a> --}}
	                                       <button type="submit" id="btnRegistrarPersonaJuridica" class="btn btn-block pull-left boton-azul"><i class="fa fa-plus fa-3x" aria-hidden="true"></i><span style="font-size:20px;">&nbsp; Registrar Persona Natural</span></button>
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

$(document).ready(function()
{
	$('#provincia_id option').remove();
	jQuery.ajax({
				  url: '../../Zona/Listar_Provincias_x_Departamento/' + $('select[name=departamento_id]').val(),
				  type: 'POST',
				  data: {id: $('select[name=departamento_id]').val(),
						 "_token": "{{ csrf_token() }}",},
				  success: function(respuesta){

				  		$.each(respuesta, function(index, val) {

		                            $('#provincia_id').append($('<option>', { 
		                                value:respuesta[index].id,
		                                text : respuesta[index].cNomZona
		                            }));
		                        });
				  		respuesta = null;
				  		
				  		$('#provincia_id').show();
				  		$('#distrito_id option').remove();
							jQuery.ajax({
										  url: '../../Zona/Listar_Distritos_x_Provincia/' + $('select[name=provincia_id]').val(),
										  type: 'POST',
										  data: {id: $('select[name=provincia_id]').val(),
												 "_token": "{{ csrf_token() }}",},
										  success: function(respuesta){

										  		$.each(respuesta, function(index, val) {

								                            $('#distrito_id').append($('<option>', { 
								                                value:respuesta[index].id,
								                                text : respuesta[index].cNomZona
								                            }));
								                        });
										  		respuesta = null;
										  		
										  		$('#distrito_id').fadeIn("slow");
										  		//$('#provincia_id').show();
										  }
										})

				  }
				});

	// Llamada a Ajax para Carga de Provincias

	$("select[name=departamento_id]").change(function(){

		$('#provincia_id option').remove();
		jQuery.ajax({
				  url: '../../Zona/Listar_Provincias_x_Departamento/' + $('select[name=departamento_id]').val(),
				  type: 'POST',
				  data: {id: $('select[name=departamento_id]').val(),
						 "_token": "{{ csrf_token() }}",},
				  success: function(respuesta){

				  		$.each(respuesta, function(index, val) {

		                            $('#provincia_id').append($('<option>', { 
		                                value:respuesta[index].id,
		                                text : respuesta[index].cNomZona
		                            }));
		                        });
				  		respuesta = null;
				  		
				  		$('#provincia_id').show();

				  		$('#distrito_id option').remove();
						jQuery.ajax({
								  url: '../../Zona/Listar_Distritos_x_Provincia/' + $('select[name=provincia_id]').val(),
								  type: 'POST',
								  data: {id: $('select[name=provincia_id]').val(),
										 "_token": "{{ csrf_token() }}",},
								  success: function(respuesta){

								  		$.each(respuesta, function(index, val) {

						                            $('#distrito_id').append($('<option>', { 
						                                value:respuesta[index].id,
						                                text : respuesta[index].cNomZona
						                            }));
						                        });
								  		respuesta = null;
								  		
								  		$('#distrito_id').show();
								  		//$('#provincia_id').show();
								  }
								})
				  }
				})
				.fail(function() {
		          //console.log("error");
		    })

		      event.preventDefault();
	});

	$("select[name=provincia_id]").change(function(){

		$('#distrito_id option').remove();
		jQuery.ajax({
				  url: '../../Zona/Listar_Distritos_x_Provincia/' + $('select[name=provincia_id]').val(),
				  type: 'POST',
				  data: {id: $('select[name=provincia_id]').val(),
						 "_token": "{{ csrf_token() }}",},
				  success: function(respuesta){

				  		$.each(respuesta, function(index, val) {

		                            $('#distrito_id').append($('<option>', { 
		                                value:respuesta[index].id,
		                                text : respuesta[index].cNomZona
		                            }));
		                        });
				  		respuesta = null;
				  		
				  		$('#distrito_id').show();
				  		//$('#provincia_id').show();
				  }
				})
				.fail(function() {
		          //console.log("error");
		    })

		      event.preventDefault();
	});


	// Fin de Llamada a AJax para Carga de Provincias


	// Llamada a Ajax para Carga de Distritos

	// Fin de Llamada a AJax para Carga de Distritos

   initialize();

    $('#Ruc').on("keypress",function (){
		$("#ErrorMensaje-Ruc").hide();
	})

    $('#RazonSocial').on("keypress",function (){
		$("#ErrorMensaje-RazonSocial").hide();
	})

	$('#cDescripcionEmpresa').on("keypress",function (){
		$("#ErrorMensaje-cDescripcionEmpresa").hide();
	})


	$('#cCorreoElectronico').on("keypress",function (){
		$("#ErrorMensaje-cCorreoElectronico").hide();
	})

	$('#cDireccionNegocio').on("keypress",function (){
		$("#ErrorMensaje-cDireccionNegocio").hide();
	})
	$('#cPaginaContacto').on("keypress",function (){
		$("#ErrorMensaje-cPaginaContacto").hide();
	})




    $("#btnRegistrarPersonaJuridica").on("click", function(evt) 
    {
    
	    var Ruc = $('#Ruc').val().trim();

	    if( Ruc == null || Ruc.length == 0  ) {
	       Ruc = null;
	       $("#ErrorMensaje-Ruc").text('El RUC no puede ser vacio.');
	         $("#ErrorMensaje-Ruc").show();
	         $("#Ruc").focus();
	         return false;
	    }else{
			if(isNaN($('#Ruc').val()))
			{
				$("#ErrorMensaje-Ruc").text("Usted debe ingresar un numero.");
				$("#ErrorMensaje-Ruc").show();
				$("#Ruc").text();
				$("#Ruc").focus();
				return false;
			}
		}

	    var RazonSocial = $('#RazonSocial').val().trim();

	    if( RazonSocial == null || RazonSocial.length == 0  ) {
	       RazonSocial = null;
	       $("#ErrorMensaje-RazonSocial").text('La Razon Social no puede ser vacío.');
	         $("#ErrorMensaje-RazonSocial").show();
	         $("#RazonSocial").focus();
	         return false;
	       }

	    var cDescripcionEmpresa = $('#cDescripcionEmpresa').val().trim();

	    if( cDescripcionEmpresa == null || cDescripcionEmpresa.length == 0  ) {
	       cDescripcionEmpresa = null;
	       $("#ErrorMensaje-cDescripcionEmpresa").text('La Descripción de la Empresa no puede ser vacío.');
	         $("#ErrorMensaje-cDescripcionEmpresa").show();
	         $("#cDescripcionEmpresa").focus();
	         return false;
	    }


	    


		var cDireccionNegocio = $('#cDireccionNegocio').val().trim();

	    if( cDireccionNegocio == null || cDireccionNegocio.length == 0  ) {
	       cDireccionNegocio = null;
	       $("#ErrorMensaje-cDireccionNegocio").text('La Direccion de Negocio no puede ser vacío.');
	         $("#ErrorMensaje-cDireccionNegocio").show();
	         $("#cDireccionNegocio").focus();
	         return false;
	       }   

	    var cPaginaContacto = $('#cPaginaContacto').val().trim();

	    if( cPaginaContacto == null || cPaginaContacto.length == 0  ) {
	       cPaginaContacto = null;
	       $("#ErrorMensaje-cPaginaContacto").text('La Pagina de Contacto no puede ser vacío.');
	         $("#ErrorMensaje-cPaginaContacto").show();
	         $("#cPaginaContacto").focus();
	         return false;
	    }
    $('RegistroFormPersonaNatural').submit();
  });

var map = null;
var infoWindow = null;
 
function openInfoWindow(marker) {
    var markerLatLng = marker.getPosition();
    $('#nLatitudNegocio').val(markerLatLng.lat());
    $('#nLongitudNegocio').val(markerLatLng.lng());
}

function ValidarEmail(email){
		var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
		 if (!regex.test(email)) {
		 	return false; //email incorrecto
		 }
		 else
		 {
		 	return true; // email correcto
		 }
}

function initialize() {
    var myLatlng = new google.maps.LatLng( $('#nLatitudNegocio').val(), $('#nLongitudNegocio').val());
    var myOptions = {
      zoom: 12,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
 
    map = new google.maps.Map($('#map_canvas').get(0), myOptions);
    

    infoWindow = new google.maps.InfoWindow({});
 
    var marker = new google.maps.Marker({
        position: myLatlng,
        draggable: true,
        map: map,
        title:'Arrastre el Marcador Hasta Ubicar su Negocio.'
    });
 
    google.maps.event.addListener(marker, 'dragend', function(){ openInfoWindow(marker); });
    google.maps.event.addListener(marker, 'click', function(){ openInfoWindow(marker); });
}
});


</script>
@endsection