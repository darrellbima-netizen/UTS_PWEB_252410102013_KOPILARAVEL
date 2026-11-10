
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') | NgopiDawg</title>

    <!-- CSS Utama -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Navbar -->
        @if (!request()->routeIs('login'))
        <x-navbar />
    @endif

    <!-- Konten Halaman -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
        @if (!request()->routeIs('login'))
        @include('components.footer')
    @endif

    <!-- Tempat JavaScript tambahan -->
    @stack('scripts')

</body>
</html>
