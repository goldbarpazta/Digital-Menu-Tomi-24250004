@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')
<section class="hero-section text-center">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">Restaurant Digital Menu</h1>
        <p class="lead mb-4">Temukan berbagai pilihan makanan dan minuman lezat untuk Anda</p>
        <a href="{{ route('frontend.menus.index') }}" class="btn btn-primary btn-lg px-5">
            <i class="fas fa-utensils me-2"></i>Lihat Menu
        </a>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-4">
                    <div class="card-icon bg-success text-white mx-auto mb-3" style="width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                        <i class="fas fa-hamburger"></i>
                    </div>
                    <h5>Food</h5>
                    <h3 class="text-success fw-bold">{{ $totalFood }}</h3>
                    <small class="text-muted">Menu Makanan</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-4">
                    <div class="card-icon bg-info text-white mx-auto mb-3" style="width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                        <i class="fas fa-coffee"></i>
                    </div>
                    <h5>Beverage</h5>
                    <h3 class="text-info fw-bold">{{ $totalBeverage }}</h3>
                    <small class="text-muted">Menu Minuman</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-4">
                    <div class="card-icon mx-auto mb-3" style="width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; background-color: #ffc107; color: #fff;">
                        <i class="fas fa-ice-cream"></i>
                    </div>
                    <h5>Dessert</h5>
                    <h3 class="fw-bold" style="color: #ffc107;">{{ $totalDessert }}</h3>
                    <small class="text-muted">Menu Dessert</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-4">
                    <div class="card-icon bg-primary text-white mx-auto mb-3" style="width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h5>Total Menu</h5>
                    <h3 class="text-primary fw-bold">{{ $totalMenu }}</h3>
                    <small class="text-muted">Semua Menu</small>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2>Menu Pilihan</h2>
            <p class="text-muted">Beberapa menu terbaik dari restoran kami</p>
        </div>
        <div class="row g-4">
            @forelse($menus as $menu)
                <div class="col-md-4">
                    <div class="card menu-card h-100">
                        <div class="position-relative">
                            @if($menu->foto)
                                <img src="{{ asset($menu->foto) }}" class="card-img-top" alt="{{ $menu->nama_menu }}">
                            @else
                                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-image fa-3x text-muted"></i>
                                </div>
                            @endif
                            <span class="position-absolute top-0 end-0 m-2">
                                {!! $menu->status == 'Ready' ? '<span class="badge-ready">Ready</span>' : '<span class="badge-soldout">Sold Out</span>' !!}
                            </span>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $menu->nama_menu }}</h5>
                            <p class="card-text">
                                <small class="text-muted">
                                    <span class="badge bg-secondary">{{ $menu->kategori }}</span>
                                </small>
                            </p>
                            <div class="star-rating mb-2">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= round($menu->rating))
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                                <small class="text-muted ms-1">({{ number_format($menu->rating, 1) }})</small>
                            </div>
                            <h5 class="text-primary fw-bold mt-auto">Rp {{ number_format($menu->harga, 0, ',', '.') }}</h5>
                            <a href="{{ route('frontend.menus.show', $menu->slug) }}" class="btn btn-outline-primary w-100 mt-2">
                                <i class="fas fa-info-circle me-1"></i> Detail
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="empty-state">
                        <i class="fas fa-utensils"></i>
                        <h5 class="mt-3">Belum ada menu</h5>
                        <p class="text-muted">Menu akan segera tersedia.</p>
                    </div>
                </div>
            @endforelse
        </div>
        @if($menus->count() > 0)
            <div class="text-center mt-4">
                <a href="{{ route('frontend.menus.index') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-utensils me-2"></i>Lihat Semua Menu
                </a>
            </div>
        @endif
    </div>
</section>

<section id="tentang" class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>Tentang Kami</h2>
                <p class="text-muted">Restaurant Digital Menu menyajikan berbagai hidangan lezat dengan bahan-bahan berkualitas terbaik. Kami berkomitmen untuk memberikan pengalaman bersantap yang tak terlupakan bagi setiap pelanggan.</p>
                <p class="text-muted">Dengan menu digital yang interaktif, Anda dapat dengan mudah melihat daftar menu, mempelajari komposisi, dan mengetahui informasi gizi dari setiap hidangan.</p>
            </div>
            <div class="col-md-6">
                <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=600" alt="Restaurant" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>
@endsection
