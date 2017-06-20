<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
@section('incCss')
    <!-- Styles -->
        {{ Html::style('bower_components/font-awesome/css/font-awesome.min.css') }}
        {{ Html::style('css/app.css') }}
        {{ Html::style('css/common.css') }}
        {{ Html::style('bower_components/alertifyjs/dist/css/alertify.css') }}
    @show
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if (request()->is('admin*'))
                        @include ('menu.admin')
                    @else
                        @include ('menu.left')
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                @if (!request()->is('admin*'))
                    @include('menu.right')
                @endif
                <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">{{ trans('layout.user.t-login') }}</a></li>
                        <li><a href="{{ route('register') }}">{{ trans('layout.user.t-register') }}</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @include ('menu.user')
                                <li>
                                    <a href="{{ route('logout') }}" id="logout">
                                        {{ trans('layout.user.b-logout') }}
                                    </a>

                                    {{ Form::open(['id' => 'logout-form', 'method' => 'POST', 'route' => 'logout', 'style' => 'display: none;']) }}
                                    {{ Form::close() }}
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>
<!-- Scripts -->
@section('incJs')
    {{ Html::script('js/app.js') }}
    {{ Html::script('js/common.js') }}
    {{ Html::script('bower_components/ckeditor/ckeditor.js') }}
    {{ Html::script('bower_components/alertifyjs/dist/js/alertify.js') }}
@show
</body>
</html>
