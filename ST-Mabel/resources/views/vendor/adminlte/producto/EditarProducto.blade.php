@extends('adminlte::layouts.app')

@section('htmlheader_title')
  Editar Producto
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
            <h3 class="text-center color-azul"><strong><i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp; Editar Producto&nbsp;<i class="fa fa-pencil-square" aria-hidden="true"></i></strong></h3>  
            <form method="POST" action="{{url('Productos/Editar')}}" accept-charset="UTF-8" class="" id="EditarFormProducto">
              <input name="_token" type="hidden" value="{{ csrf_token() }}">
                               <div class="form-group row">


                                        <div class="col-sm-4">
                                              <label class="color-azul">Descripcion:</label>
                                            <input type="text" class="form-control text-center"  id="cDescripcionProducto" name="cDescripcionProducto"  required placeholder="cDescripcionProducto" maxlength="20" value="{{ $productos[0]->cDescripcionProducto}}">
                                            <span  id ="ErrorMensaje-cDescripcionProducto" class="help-block"></span>
                                          </div>


                                          <div class="col-sm-4">
                                            <label class="color-azul">Precio:</label>
                                            <input type="text" class="form-control text-center"  id="precio" name="precio"  required placeholder="Precio" maxlength="40" value="{{ $productos[0]->precio}}">
                                            <span  id ="ErrorMensaje-precio" class="help-block"></span>
                                          </div>

                                          <div class="col-sm-4">
                                            <label class="color-azul">Stock:</label>
                                            <input type="text" class="form-control text-center"  id="stock" name="stock"  required placeholder="Stcok" maxlength="40" value="{{ $productos[0]->stock}}">
                                            <span  id ="ErrorMensaje-stock" class="help-block"></span>
                                          </div>

                                      </div>


                                      <div class="form-group row">
                                        <div class="col-sm-4">
                                          <label class="color-azul">Categoria:</label>
                                          <select class="form-control text-center" name="categoria_id" id="categoria_id">
                                            @foreach($categorias as $categoria)
                                              @if($categoria->id == $productos[0]->categoria_id)
                                                <option selected value="{{ $categoria->id }}" >{{ $categoria->nombre_categoria}}</option>
                                              @else
                                                <option value="{{ $categoria->id }}" >{{ $categoria->nombre_categoria}}</option>
                                              @endif
                                            @endforeach
                                    </select>          
                                          {{-- <span  id ="ErrorMensaje-departamento_id" class="help-block"></span> --}}
                                        </div>
                                        
                                     
                                      <div class="row"> 
                                        <div class="col-xs-6">
                                           <button type="submit" id="btnEditarProducto" class="btn btn-block pull-left btn-success"><i class="fa fa-play-circle-o fa-3x" aria-hidden="true"></i><span style="font-size:20px;">&nbsp; Editar Producto</span></button>
                                         <input type="text" name="" id ="" style="display:none;">
                                         <br>
                                         <br>
                                         <br>
                                         <br>
                                         <br>
                                        </div>
                                        
                                      </div>

    <input type="text" name="id" id="id" class="form-control text-center" value="{{ $productos[0]->id}}" style="display:none;">
    {{-- <input type="text" name="producto_id" id="producto_id" class="form-control text-center" value="{{ $productos[0]->producto_id}}" style="display:none;"> --}}
            </form>
          </div>
      </div>
  </div>

@endsection
@section('script-fin')
<script>


   initialize();

    $('#cDescripcionProducto').on("keypress",function (){
    $("#ErrorMensaje-cDescripcionProducto").hide();
  })

    $('#precio').on("keypress",function (){
    $("#ErrorMensaje-precio").hide();
  })

      $('#stock').on("keypress",function (){
    $("#ErrorMensaje-stock").hide();
  })
        $('#nombre_categoria').on("keypress",function (){
    $("#ErrorMensaje-nombre_categoria").hide();
  })

  
    $("#btnEditarProducto").on("click", function(evt) 
    {
    
      var cDescripcionProducto = $('#cDescripcionProducto').val().trim();

      if( cDescripcionProducto == null || cDescripcionProducto.length == 0  ) {
         cDescripcionProducto = null;
         $("#ErrorMensaje-cDescripcionProducto").text('El Nombre de Producto no puede ser vacio.');
           $("#ErrorMensaje-cDescripcionProducto").show();
           $("#cDescripcionProducto").focus();
           return false;
         }

      var precio = $('#precio').val().trim();

      if( precio == null || precio.length == 0  ) {
         precio = null;
         $("#ErrorMensaje-precio").text('El precio del Productos no puede ser vacío.');
           $("#ErrorMensaje-precio").show();
           $("#precio").focus();
           return false;
         }



 var stock = $('#stock').val().trim();

      if( stock == null || stock.length == 0  ) {
         stock = null;
         $("#ErrorMensaje-stock").text('El stock del Productos no puede ser vacío.');
           $("#ErrorMensaje-stock").show();
           $("#stock").focus();
           return false;
         }


          var nombre_categoria = $('#nombre_categoria').val().trim();

      if( nombre_categoria == null || nombre_categoria.length == 0  ) {
         nombre_categoria = null;
         $("#ErrorMensaje-nombre_categoria").text('El  del Productos no puede ser vacío.');
           $("#ErrorMensaje-nombre_categoria").show();
           $("#nombre_categoria").focus();
           return false;
         }


    $('EditarFormProducto').submit();
  });

});

</script>
@endsection