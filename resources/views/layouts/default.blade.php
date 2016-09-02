<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        Aomguides -
        @section('title')
        @show
    </title>
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="5_mVNYHYQTyHgIExq-y1wwYlEFdoVDYMIvMg1i9qedE" />
    <link rel="icon" type="image/png" href="/apple-touch-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    @include('layouts.css')
    @include('layouts.js_top')
</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Wrapper-->
<div id="wrap">

    <div class="row">

        <!-- Container -->
        <div class="container">
            @include('layouts.navbar')
            @if(Session::has('error'))
                <div clas="row">
                <div class="alert alert-danger">
                    <h2>{{ Session::get('error') }}</h2>
                </div>
                </div>
                @endif
                @if(Session::has('success'))
                <div clas="row">
                    <div class="alert alert-success">
                        <h2>{{ Session::get('success') }}</h2>
                    </div>
                </div>
                    @endif
                @if(Session::has('info'))
                        <div clas="row">
                    <div class="alert alert-info">
                        <h2>{{ Session::get('info') }}</h2>
                    </div>
                        </div>
                    @endif
                @if(Session::has('warning'))
                      <div clas="row">
                    <div class="alert alert-warning">
                        <h2>{{ Session::get('warning') }}</h2>
                    </div>
                      </div>
                    @endif
            <!-- Notifications -->
    {{--        <div class="notifications">
                @include('layouts/notifications')
            </div>--}}
            <!-- Content -->
            <div class="content col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @yield('content')
                <!-- ./ content -->
            </div>

    {{--
            @yield('disqus')
    --}}
        </div>
            <!-- ./ container -->
    </div> 
        <!-- ./ row -->
@include('layouts.footer')
    </div>
@include('layouts.js_foot')

</body>
</html>