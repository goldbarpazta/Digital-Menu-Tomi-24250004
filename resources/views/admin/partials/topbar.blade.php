<nav class="topbar navbar navbar-expand navbar-light px-4">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h5">
            <i class="fas fa-utensils text-primary me-2"></i>
            {{ config('app.name') }}
        </span>

        <div class="d-flex align-items-center ms-auto">
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                    <i class="fas fa-user-circle fa-lg me-2 text-primary"></i>
                    <span>{{ Auth::user()->name }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
