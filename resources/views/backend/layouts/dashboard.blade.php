<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
    <link href="{{ asset('backend/dashboard.css') }}" rel="stylesheet" />
	<title>Sell Property</title>
	@stack('styles')
</head>
<body>


	<!-- SIDEBAR -->
    @include('backend.layouts.includes.sidebar')
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
        @include('backend.layouts.includes.navbar')
		<!-- NAVBAR -->
        <!-- MAIN -->
		@yield('content')
        <!-- MAIN -->

	</section>
	<!-- CONTENT -->
	

	<script src="{{ asset('backend/dashboard.js') }}"></script>
	@stack('scripts')
</body>
</html>