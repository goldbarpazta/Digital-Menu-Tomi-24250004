<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #343a40;">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="fas fa-utensils me-2"></i>{{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="fas fa-home me-1"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('frontend.menus.*') ? 'active' : '' }}" href="{{ route('frontend.menus.index') }}">
                        <i class="fas fa-list me-1"></i>Menu
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tentang">
                        <i class="fas fa-info-circle me-1"></i>Tentang
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
