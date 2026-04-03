<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <x-application-logo style="height: 32px; width:auto;" />
        </a>

        <!-- Toggler (hamburger) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side -->
            @php
                $navs = [
                    ['route' => 'dashboard', 'name' => 'Dashboard'],
                    ['route' => 'barang.index', 'name' => 'Barang'],
                    ['route' => 'lokasi.index', 'name' => 'Lokasi'],
                    ['route' => 'kategori.index', 'name' => 'Kategori'],
                    ['route' => 'peminjaman.index', 'name' => 'Peminjaman'],
                    ['route' => 'user.index', 'name' => 'User', 'role' => 'admin'],
                ];
            @endphp

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @foreach ($navs as $nav)
                    @php extract($nav); @endphp
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs($route) ? 'active' : '' }}"
                           href="{{ route($route) }}">
                            {{ $name }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <!-- Right Side -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                {{ __('Profile') }}
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
