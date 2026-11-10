
<nav class="navbar">

    <div class="navbar-brand">
        ☕ NgopiDawg
    </div>

    <div class="navbar-menu">

        <a href="{{ route('dashboard', ['username' => request('username')]) }}">
            Dashboard
        </a>

        <a href="{{ route('pengelolaan', ['username' => request('username')]) }}">
            Pengelolaan
        </a>

        <a href="{{ route('profile', ['username' => request('username')]) }}">
            Profile
        </a>

    </div>

</nav>
