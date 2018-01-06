@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Ver Proveedor
@endsection

@section('contentheader_title')
	Ver Proveedor
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
        		<h3 class="text-center color-azul"><strong><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Proveedor&nbsp;<i class="fa fa-users" aria-hidden="true"></i></strong></h3>  
	        	<form method="POST" action="{{url('admin/PersonaJuridica')}}" accept-charset="UTF-8" class="" id="RegistroFormPersonaJuridica">
	        		<input name="_token" type="hidden" value="{{ csrf_token() }}">
	                                    <div class="form-group row">
	                                        <div class="col-sm-4">
	                                          <label class="color-azul">RUC:</label>
	                                          <input type="text" readonly class="form-control text-center"  id="Ruc" name="Ruc"  required value="{{ $PersonaJuridica['0']->Ruc}}" placeholder="12358132134" maxlength="11">
	                                          <span  id ="ErrorMensaje-Ruc" class="help-block"></span>
	                                        </div>
	                                        <div class="col-sm-4">
	                                          <label class="color-azul">Razon Social:</label>
	                                          <input type="text" readonly class="form-control text-center"  id="RazonSocial" name="RazonSocial"  required value="{{ $PersonaJuridica['0']->RazonSocial}}" placeholder="Ejemplo SAC" maxlength="100">
	                                          <span  id ="ErrorMensaje-RazonSocial" class="help-block"></span>
	                                        </div>
	                                        <div class="col-sm-4">
	                                        	
	                                          <label class="color-azul">Descripción:</label>
	                                           <textarea name="cDescripcionEmpresa" id="cDescripcionEmpresa" cols="10" rows="2" class="form-control" maxlength="1000" placeholder="Empresa Dedicada a ..." >{{ $PersonaJuridica['0']->cDescripcionEmpresa}}</textarea>
	                                          
	                                          <span  id ="ErrorMensaje-cDescripcionEmpresa" class="help-block"></span>
	                                        </div>
	                                    </div>
	                                    
	                                    
	                                    <div class="form-group row">
	                                      <div class="col-sm-4">
	                                        <label class="color-azul">Departamento:</label>
	                                        <select class="form-control text-center" name="departamento_id" id="departamento_id">
				                                    <option value="nn">{{ $PersonaJuridica['0']->nombre_departamento}}</option>
	                            			</select>
	                                        <span  id ="ErrorMensaje-departamento_id" class="help-block"></span>
	                                      </div>
	                                      <div class="col-sm-4">
	                                        <label class="color-azul">Provincia:</label>
											<select class="form-control text-center" name="provincia_id" id="provincia_id">
												<option value="nn">{{ $PersonaJuridica['0']->nombre_provincia}}</option>
											</select>
	                                        <span  id ="ErrorMensaje-provincia_id" class="help-block"></span>
	                                      </div>
	                                      <div class="col-sm-4">
	                                        <label class="color-azul">Distrito:</label>
											<select class="form-control text-center" name="distrito_id" id="distrito_id">
												<option value="nn">{{ $PersonaJuridica['0']->nombre_distrito}}</option>
											</select>
	                                        <span  id ="ErrorMensaje-distrito_id" class="help-block"></span>
	                                      </div>
	                                    </div>
	                                    <div class="form-group row">
	                                      <div class="col-sm-6">
	                                        <label class="color-azul">Dirección de Negocio:</label>
	                                        <input type="text" readonly class="form-control text-center" 
	                                        id="cDireccionNegocio" name="cDireccionNegocio"  required value="{{ $PersonaJuridica['0']->nombre_departamento}}" placeholder="Dirección de Negocio">
	                                        <span  id ="ErrorMensaje-cDireccionNegocio" class="help-block"></span>
	                                      </div>
	                                      <div class="col-sm-6">
	                                        <label class="color-azul">Pagina de Contacto:</label>
	                                        <input type="text" readonly class="form-control text-center"  id="cPaginaContacto" name="cPaginaContacto"  placeholder="www.ejemplo.com" value="{{ $PersonaJuridica['0']->cPaginaContacto}}">
	                                        <span  id ="ErrorMensaje-cPaginaContacto" class="help-block"></span>
	                                      </div>


	                                    </div>

										


	                                    <div class="form-group">
	                                        
	                                    </div>
	                                    <label class="color-azul">Ubicar su Negocio en el Mapa:</label>
	                                    
	                                    <div class="form-group">
	                                      <div class="row">  
	                                        <div class="col-xs-12 col-sm-6">
	                                            <label class="color-azul">Latitud</label>
	                                            <input type="text" readonly name="nLatitudNegocio" id="nLatitudNegocio" class="form-control text-center" value="-12.10113608004072" required value="{{ $PersonaJuridica['0']->nombre_departamento}}" pattern="" title="" readonly>
	                                          </div>
	                                        <div class="col-xs-12 col-sm-6">
	                                          <label class="color-azul">Longitud</label>
	                                          <input type="text" readonly name="nLongitudNegocio" id="nLongitudNegocio" class="form-control text-center" value="-77.03570354187013" required value="{{ $PersonaJuridica['0']->nombre_departamento}}" pattern="" title="" readonly>
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
	                                    
	                                   
	                                    {{-- <div class="row"> 
	                                      <div class="col-xs-6 col-xs-push-3">
	                                      
	                                       <button type="submit" id="btnRegistrarPersonaJuridica" class="btn btn-block pull-left boton-azul"><i class="fa fa-plus fa-3x" aria-hidden="true"></i><span style="font-size:20px;">&nbsp; Registrar Persona Natural</span></button>
	                                       <br>
	                                       <br>
	                                       <br>
	                                       <br>
	                                       <br>
	                                      </div>
	                                      
	                                    </div> --}}
	          </form>
        	</div>
		</div>
	</div>
@endsection

@section('script-fin')
<script>

$(document).ready(function()
{

   initialize();

var map = null;
var infoWindow = null;
 
function openInfoWindow(marker) {
    var markerLatLng = marker.getPosition();
    $('#nLatitudNegocio').val(markerLatLng.lat());
    $('#nLongitudNegocio').val(markerLatLng.lng());
}

function initialize() {
    var myLatlng = new google.maps.LatLng($('#nLatitudNegocio').val(),$('#nLongitudNegocio').val());
    var myOptions = {
      zoom: 12,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
 
    map = new google.maps.Map($('#map_canvas').get(0), myOptions);
    

    infoWindow = new google.maps.InfoWindow({});
 
    var marker = new google.maps.Marker({
        position: myLatlng,
        draggable: false,
        map: map,
        title:'Arrastre el Marcador Hasta Ubicar su Negocio.'
    });
 
    google.maps.event.addListener(marker, 'dragend', function(){ openInfoWindow(marker); });
    google.maps.event.addListener(marker, 'click', function(){ openInfoWindow(marker); });
}
});

</script>
@endsection