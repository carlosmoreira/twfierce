<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" ng-app="teamwork">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="/libs/template/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/libs/template/css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="/libs/template/css/plugins/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="/libs/template/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body ng-cloak="">

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target=".navbar-ex1-collapse">
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

        <!-- Top Menu Items -->
        <ul class="nav navbar-left top-nav">
            <li>
                <form action="/search">
                    <div class="input-group" style="max-width: 250px; margin:8px;">
                        <input name="q" type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </li>
        </ul>
        <ul class="nav navbar-right top-nav">

            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        <li>
                            <a href="/projects/create"><i class="fa fa-plus"></i> Add Project</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            @include('partials.sidebar')
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Dashboard
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> @yield('breadcrumb')
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            @yield('content')

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>


<!-- jQuery -->
<script src="/libs/template/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="/libs/template/js/bootstrap.min.js"></script>
<!-- Morris Charts JavaScript -->
<script src="/libs/template/js/plugins/morris/raphael.min.js"></script>
<script src="/libs/template/js/plugins/morris/morris.min.js"></script>
<script src="/libs/template/js/plugins/morris/morris-data.js"></script>


<!-- Scripts -->
<script src="/libs/jquery/dist/jquery.min.js"></script>
<script src="/libs/tinymce/js/tinymce/tinymce.min.js"></script>
<script src="/libs/angularjs/angular.js"></script>

<script>
    var app = angular.module('teamwork', []);
</script>

@yield('footer')
</body>
</html>
