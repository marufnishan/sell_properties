<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> --}}

    @yield('styles')
    @stack('styles')
</head>

<body>
    @include('frontend.layouts.includes.navbar')
    @include('frontend.layouts.includes.header')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>


    <!-- Common Footer -->
    @include('frontend.layouts.includes.footer')

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Include additional JS files -->
    @yield('scripts')
    @stack('scripts')
</body>

</html>
