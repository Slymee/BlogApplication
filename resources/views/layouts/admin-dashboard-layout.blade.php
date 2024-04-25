<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title')</title>
    @stack('styles')
</head>
<body>
    <header>
        @include('common-components.admin-navbar')
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        
    </footer>
</body>
</html>