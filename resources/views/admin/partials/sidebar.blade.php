<div class="sidebar d-flex flex-column p-3 text-white" style="width: 250px;">
    <a href="{{ route('admin.dashboard') }}" class="text-white text-decoration-none mb-4">
        <h5 class="mb-0"><i class="fas fa-utensils me-2"></i>Admin Panel</h5>
    </a>
    <hr class="text-white-50">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.menus.index') }}" class="nav-link {{ request()->routeIs('admin.menus.*') ? 'active' : '' }}">
                <i class="fas fa-list"></i> Daftar Menu
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.menus.create') }}" class="nav-link {{ request()->routeIs('admin.menus.create') ? 'active' : '' }}">
                <i class="fas fa-plus-circle"></i> Tambah Menu
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.reviews.index') }}" class="nav-link {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
                <i class="fas fa-star"></i> Review
            </a>
        </li>
    </ul>
    <hr class="text-white-50 mt-auto">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link" target="_blank">
                <i class="fas fa-external-link-alt"></i> Lihat Website
            </a>
        </li>
        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link w-100 text-start border-0 bg-transparent">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </li>
    </ul>
</div>
