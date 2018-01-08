@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Inicio de Sesión
@endsection

@section('content')
<body class="hold-transition login-page" style ="background-color: #ffffff;">
    <div id="app" v-cloak>
        <div class="login-box">
            <div class="login-logo">
<i style="color: #009688" class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
                <a href="{{ url('/') }}"><font color="#ffa000" face="Arial Black" size=20;>ACME</font></a>


{{-- <h2 style="color: #ff9800" align="center";><font face="Arial Black" size=10;>ACME</font><i  style="color: #00897b"; class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></h2> --}}


            </div><!-- /.login-logo -->

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

        <div class="login-box-body" style ="background-color: #dcedc8;">
        <p class="login-box-msg"> {{ trans('adminlte_lang::message.siginsession') }} </p>

        <login-form name="{{ config('auth.providers.users.field','email') }}"
                    domain="{{ config('auth.defaults.domain','') }}"></login-form>

       {{--  @include('adminlte::auth.partials.social_login') --}}

        <a href="{{ url('/password/reset') }}">{{ trans('adminlte_lang::message.forgotpassword') }}</a><br>
        <a href="{{ url('/register') }}" class="text-center">{{ trans('adminlte_lang::message.registermember') }}</a>

    </div>

    </div>
    </div>
    @include('adminlte::layouts.partials.scripts_auth')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

@endsection
