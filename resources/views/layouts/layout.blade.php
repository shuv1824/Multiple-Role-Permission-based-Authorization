<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
	
	<link href="{{ asset('favicon.ico') }}" rel="icon" type="image/png">

    {{-- Main --}}
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/css/tether.min.css"> --}}
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

</head>

<body class="app header-fixed">
    @include('layouts.header')

    <div class="app-body">
        @include('layouts.sidebar')

        <!-- Main content -->
        <main class="main">

            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="panel panel-default"><br>
                                <div class="panel-heading">
                                    @yield('heading')
                                </div><br>
                                    @yield('content')
                                <div class="panel-body">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.conainer-fluid -->
        </main>

    </div>

    <footer class="app-footer">
        <a href="#"></a> © 2018 All rights reserved.
        <span class="float-right">
            
        </span>
    </footer>

    <!-- Bootstrap and necessary plugins -->
    <script src="{{ asset('js/libs/jquery.min.js') }}"></script>
    <script src="{{ asset('js/libs/tether.min.js') }}"></script>
    <script src="{{ asset('js/libs/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ asset('js/libs/dataTab
    les.bootstrap4.min.js') }}"></script> --}}
    <script src="{{ asset('js/libs/select2.min.js') }}"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>


    <!-- GenesisUI main scripts -->

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>
