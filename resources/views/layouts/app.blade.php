<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title', 'WebTechID')</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    
<body>
    <header>
        <!-- Navigation bar -->
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Footer content -->
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
