<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Stackhub</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

<!-- Side -->
<div class="wrapper">
    @if (Request::is('login'))
        @include('core::template.snippets.navbar')
        @yield('content')
        @include('core::template.snippets.footer')
    @else
        @include('core::template.snippets.sidebar')
        <div class="main-panel">
            @include('core::template.snippets.navbar')
            @yield('content')
            @include('core::template.snippets.footer')
        </div>
    @endif
</div>
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>
