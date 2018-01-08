@extends(Config::get('entrust-gui.layout'))

@section('heading', 'Users')

@section('css')
<link rel="stylesheet" href="/css/jquery.bootgrid.min.css" type="text/css"> 
  <style>


    .fa-list
    {
      color: #bf9d11;
    }
    .fa-eye,.fa-pencil
    {
      color: #fff;
    }
    .active>span,.active>
    {
      color: #fff  !important;
      background-color: #bf9d11  !important;
      border-color: #bf9d11  !important;
    }
    .content-wrapper
    {
        background-color: #ffffff;
    }
    .color-azul
    {
      color: #bf9d11;   
    }

    thead>tr
    {
      color: #259f0a;
    }

    thead>tr
    {
      background-color: #bf9d11 !important;
        color: #fff !important; 
    }

    tr:hover
    {
        background-color: #bf9d11 !important;
        color: #fff !important;
    }
    
    .bootgrid-table th:hover {
         background: #bf9d11; 
    }
    .color-white
    {
      color: #fff !important;
    }

  </style>
@endsection

@section('main-content')

<h3 class="text-center color-azul"><strong><i class="fa fa-lock" aria-hidden="true"></i>&nbsp; Seguridad de Usuarios&nbsp;<i class="fa fa-lock" aria-hidden="true"></i></strong></h3>  

<div class="models--actions">
    <a class="btn btn-labeled btn-success" href="{{ route('entrust-gui::users.create') }}"><span class="btn-label"><i class="fa fa-plus"></i></span>{{ trans('entrust-gui::button.create-user') }}</a>
</div>
<div class="table-responsive">
<table class="table table-hover">
 <thead>
  <tr>
    <th class="text-center">Email</th>
    <th >Acciones</th>
  </tr>
     </thead>

  @foreach($users as $user)
    <tr>
      <td>{{ $user->email }}</th>
      <td class="col-xs-3">
        <form action="{{ route('entrust-gui::users.destroy', $user->id) }}" method="post">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <a class="btn btn-labeled btn-info" href="{{ route('entrust-gui::users.edit', $user->id) }}"><span class="btn-label"><i class="fa fa-pencil"></i></span> {{ trans('entrust-gui::button.edit') }}</a>
          <button type="submit" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i></span>{{ trans('entrust-gui::button.delete') }}</button>
        </form>
      </td>
    </tr>
  @endforeach
</table>
</div>
<div class="text-center">
  {!! $users->render() !!}
</div>
@endsection
