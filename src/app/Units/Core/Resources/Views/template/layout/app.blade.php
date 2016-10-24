<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Stackhub</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<!-- Scripts -->
	 <script>
			 window.Laravel = <?php echo json_encode([
							 'csrfToken' => csrf_token(),
			 ]); ?>
	 </script>
</head>
<body>
<div class="wrapper">
	 @unless (request()->is('login'))
		@include('core::template.snippets.sidebar')
    <div class="main-panel">
			@endunless
			@include('core::template.snippets.navbar')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
									@yield('content')
                </div>
            </div>
        </div>
				@include('core::template.snippets.footer')
				@unless (request()->is('login'))
    </div>
		@endunless
</div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>
