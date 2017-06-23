<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

    <title>Laravel Ticket Application</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">--}}
    <link href="{{ asset('css/mix.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @stack('styles')

</head>

<body>
<div id="wrapper">
    @include('partials/navigation')

    <div id="page-wrapper">
        <div class="row" id="notificationsBox">
            <div class="col-md-12 alertBox">
                <div class="row">
                    @unless(isset($noNotifications))
                        @include('partials.notifications')
                    @endif
                </div>
            </div>
        </div>

        @yield('content')
    </div>
</div>
<!-- /.navbar-header -->


<!-- JavaScripts -->
<script src="{{ asset('js/mix.js') }}"></script>
@stack('scripts')

</body>

</html>
