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
        <ul class="nav navbar-right top-nav">
            {{--<li class="dropdown">--}}
                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b--}}
                            {{--class="caret"></b></a>--}}
                {{--<ul class="dropdown-menu message-dropdown">--}}
                    {{--<li class="message-preview">--}}
                        {{--<a href="#">--}}
                            {{--<div class="media">--}}
                                    {{--<span class="pull-left">--}}
                                        {{--<img class="media-object" src="http://placehold.it/50x50" alt="">--}}
                                    {{--</span>--}}
                                {{--<div class="media-body">--}}
                                    {{--<h5 class="media-heading"><strong>John Smith</strong>--}}
                                    {{--</h5>--}}
                                    {{--<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>--}}
                                    {{--<p>Lorem ipsum dolor sit amet, consectetur...</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="message-preview">--}}
                        {{--<a href="#">--}}
                            {{--<div class="media">--}}
                                    {{--<span class="pull-left">--}}
                                        {{--<img class="media-object" src="http://placehold.it/50x50" alt="">--}}
                                    {{--</span>--}}
                                {{--<div class="media-body">--}}
                                    {{--<h5 class="media-heading"><strong>John Smith</strong>--}}
                                    {{--</h5>--}}
                                    {{--<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>--}}
                                    {{--<p>Lorem ipsum dolor sit amet, consectetur...</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="message-preview">--}}
                        {{--<a href="#">--}}
                            {{--<div class="media">--}}
                                    {{--<span class="pull-left">--}}
                                        {{--<img class="media-object" src="http://placehold.it/50x50" alt="">--}}
                                    {{--</span>--}}
                                {{--<div class="media-body">--}}
                                    {{--<h5 class="media-heading"><strong>John Smith</strong>--}}
                                    {{--</h5>--}}
                                    {{--<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>--}}
                                    {{--<p>Lorem ipsum dolor sit amet, consectetur...</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="message-footer">--}}
                        {{--<a href="#">Read All New Messages</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="dropdown">--}}
                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b--}}
                            {{--class="caret"></b></a>--}}
                {{--<ul class="dropdown-menu alert-dropdown">--}}
                    {{--<li>--}}
                        {{--<a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">View All</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
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
