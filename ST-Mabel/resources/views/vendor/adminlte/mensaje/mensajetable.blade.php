<table class="table table-hover" id="#tbl-personanatural">
  <thead>
     <tr>
      <th class="text-center" style="vertical-align:middle;">Nombres</th>
      <th class="text-center" style="vertical-align:middle;">Correo</th>
      <th class="text-center" style="vertical-align:middle;">Mensaje</th>
      <th class="text-center" style="vertical-align:middle;">Telefono</th>
      <th class="text-center" style="vertical-align:middle;">Estado</th>
      <th class="text-center" style="vertical-align:middle;">Acciones</th>
    </tr>
  </thead>
  <tbody>

  @foreach($mensajes as $mensaje)
    <tr>
      <td class="color-negro text-center" style="font-weight:300; vertical-align:middle;">{{$mensaje->id}}</td>
      <td class="color-negro text-center" style="font-weight:300; vertical-align:middle;">{{$mensaje->nombres}}</td>
      <td class="color-negro text-center" style="font-weight:300; vertical-align:middle;">{{$mensaje->correo_electronico }}</td>
      <td class="color-negro text-center" style="font-weight:300; vertical-align:middle;">{{$mensaje->mensaje}}</td>
      <td class="color-negro text-center" style="font-weight:300; vertical-align:middle;">{{$mensaje->telefono}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$mensaje->nombre_estado}}</td>

      <td class="color-negro text-center" style="font-weight:300; vertical-align:middle;">
       		<div>
            <a href="{{url('PersonaNatural/Ver') . '/' . $mensaje->id }}" class="btn btn-default btn-info"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;</a>
            <a href="{{url('PersonaNatural/Editar') . '/' . $mensaje->id }}" class="btn btn-danger"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;</a>
          <div>
      </td> 
    </tr>
  @endforeach
  </tbody>  
</table>