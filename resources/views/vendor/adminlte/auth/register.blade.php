@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')

<body class="hold-transition register-page"  style ="background-color: #ffffff;"> 
    <div id="app" v-cloak>
        <div class="register-box">
            <div class="register-logo">
            <i style="color: #009688" class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
                <a href="{{ url('/') }}"><font color="#ffa000" face="Arial Black" size=20;>ACME</font></a>
               {{--  <a href="{{ url('/') }}"><b>Registro de Usuario</a> --}}
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="register-box-body" style="background-color: #dcedc8">
                <p class="login-box-msg">{{ trans('adminlte_lang::message.registermember') }}</p>

                <register-form ></register-form>

               {{--  @include('adminlte::auth.partials.social_login') --}}

                <a href="{{ url('/login') }}" class="text-center">{{ trans('adminlte_lang::message.membreship') }}</a>
            </div><!-- /.form-box -->
        </div><!-- /.register-box -->
    </div>

    @include('adminlte::layouts.partials.scripts_auth')

    @include('adminlte::auth.terms')

</body>

@endsection
