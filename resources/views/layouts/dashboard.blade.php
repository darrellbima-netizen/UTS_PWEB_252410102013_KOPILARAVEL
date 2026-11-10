
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') | NgopiDawg</title>

    <!-- CSS Utama -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="dashboard-page">

    <div class="dashboard-layout {{ request()->routeIs('dashboard') ? 'has-right-panel' : 'no-right-panel' }}">

        <!-- SIDEBAR -->
        <aside class="dashboard-sidebar">

            <!-- BRAND -->
            <div class="sidebar-brand">
                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="NgopiDawg Logo"
                >

                <h2>NgopiDawg</h2>
            </div>

            <!-- NAVIGATION -->
    <div class="sidebar-menu">

        <p class="sidebar-label">OVERVIEW</p>

        <a href="{{ route('dashboard', ['username' => request('username')]) }}"
        class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <span>▦</span>
            Dashboard
        </a>

        <a href="{{ route('pengelolaan', ['username' => request('username')]) }}"
        class="sidebar-link {{ request()->routeIs('pengelolaan') ? 'active' : '' }}">
            <span>▤</span>
            Pengelolaan
        </a>

        <a href="{{ route('profile', ['username' => request('username')]) }}"
        class="sidebar-link {{ request()->routeIs('profile') ? 'active' : '' }}">
            <span>♙</span>
            Profile
        </a>

    </div>

            <!-- SIDEBAR BOTTOM -->
            <div class="sidebar-bottom">

                <p class="sidebar-label">SETTINGS</p>

                <a href="{{ route('login') }}" class="sidebar-link logout-link">
                    <span>↪</span>
                    Logout
                </a>

            </div>

        </aside>


        <!-- MAIN AREA -->
        <main class="dashboard-main">

            <!-- TOP HEADER -->
            <header class="dashboard-topbar">

                <div class="dashboard-search">
                    <span>⌕</span>
                    <input
                        type="text"
                        placeholder="Search menu or ingredients..."
                    >
                </div>

                <div class="dashboard-user">

                    <button type="button" class="notification-button"
                            aria-label="Notifications">
                        ♧
                    </button>

                    <div class="user-info">
                        <div class="user-avatar">
                            {{ strtoupper(substr(request('username', 'A'), 0, 1)) }}
                        </div>

                        <span>{{ request('username', 'Admin') }}</span>
                    </div>

                </div>

            </header>


            <!-- PAGE CONTENT -->
            <div class="dashboard-page-content">
                @yield('content')
            </div>

        </main>

    @if (request()->routeIs('dashboard'))
        <!-- RIGHT PANEL -->
        <aside class="dashboard-right-panel">
            @yield('right-panel')
        </aside>
    @endif

    </div> {{-- Penutup dashboard-layout --}}

    <!-- FOOTER -->
    @include('components.footer')

    <!-- JavaScript tambahan -->
    @stack('scripts')

</body>
</html>
