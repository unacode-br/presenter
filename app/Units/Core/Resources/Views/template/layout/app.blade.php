<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <link rel="icon" href="img/favicon.png" type="image/x-icon"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - StackHub</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <link href="{{ asset('css/app.css', request()->secure()) }}" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div class="wrapper">
    @include('core::template.snippets.sidebar')
    <div class="main-panel" git is>
        @include('core::template.snippets.navbar')
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        @include('core::template.snippets.footer')
    </div>
</div>
</body>
<script src="{{ asset('js/app.js', request()->secure()) }}"></script>
@yield('scripts')
</html>
