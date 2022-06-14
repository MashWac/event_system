<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Event_system') }}</title>
    <!----fonts---->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

   
    <!-- Styles -->
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css')}}" rel="stylesheet">
</head>
<body>
@include('layouts.inc.nav')
        <main class="py-4">
            <div class="content">
                @yield('content')
            </div>
        </div>
        </main>

    <!----Scripts--->
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('frontend/js/formdisplay.js') }}" defer></script>
    @if(session('status'))
    <script>
        swal("{{session('status')}}")
    </script>
    @endif
    @yield('Scripts')

</body>
</html>
