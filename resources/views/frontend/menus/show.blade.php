@extends('frontend.layouts.app')

@section('title', $menu->nama_menu)

@section('content')
<div class="bg-dark text-white py-4">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('frontend.menus.index') }}" class="text-white-50">Menu</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ $menu->nama_menu }}</li>
            </ol>
        </nav>
        <h2 class="mb-0 mt-2">{{ $menu->nama_menu }}</h2>
    </div>
</div>

<div class="container py-4">
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    @if($menu->foto)
                        <img src="{{ asset($menu->foto) }}" class="w-100 rounded" style="max-height: 400px; object-fit: cover;" alt="{{ $menu->nama_menu }}">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center rounded" style="height: 400px;">
                            <i class="fas fa-image fa-5x text-muted"></i>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h3 class="mb-0">{{ $menu->nama_menu }}</h3>
                        {!! $menu->status == 'Ready' ? '<span class="badge-ready">Ready</span>' : '<span class="badge-soldout">Sold Out</span>' !!}
                    </div>

                    <p>
                        <span class="badge bg-secondary me-2">{{ $menu->kategori }}</span>
                    </p>

                    <div class="star-rating mb-3">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= round($menu->rating))
                                <i class="fas fa-star fa-lg"></i>
                            @else
                                <i class="far fa-star fa-lg"></i>
                            @endif
                        @endfor
                        <span class="ms-2 text-muted">({{ number_format($menu->rating, 1) }})</span>
                    </div>

                    <h2 class="text-primary fw-bold mb-4">Rp {{ number_format($menu->harga, 0, ',', '.') }}</h2>

                    @if($menu->deskripsi)
                        <h5>Deskripsi</h5>
                        <p class="text-muted">{{ $menu->deskripsi }}</p>
                    @endif

                    @if($menu->komposisi)
                        <h5>Komposisi</h5>
                        <p class="text-muted">{{ $menu->komposisi }}</p>
                    @endif

                    <div class="row g-2 mb-3">
                        @if($menu->kalori)
                        <div class="col-3">
                            <div class="text-center p-3 bg-light rounded">
                                <small class="text-muted d-block">Kalori</small>
                                <strong>{{ $menu->kalori }}</strong>
                            </div>
                        </div>
                        @endif
                        @if($menu->protein)
                        <div class="col-3">
                            <div class="text-center p-3 bg-light rounded">
                                <small class="text-muted d-block">Protein</small>
                                <strong>{{ $menu->protein }}g</strong>
                            </div>
                        </div>
                        @endif
                        @if($menu->lemak)
                        <div class="col-3">
                            <div class="text-center p-3 bg-light rounded">
                                <small class="text-muted d-block">Lemak</small>
                                <strong>{{ $menu->lemak }}g</strong>
                            </div>
                        </div>
                        @endif
                        @if($menu->karbohidrat)
                        <div class="col-3">
                            <div class="text-center p-3 bg-light rounded">
                                <small class="text-muted d-block">Karbohidrat</small>
                                <strong>{{ $menu->karbohidrat }}g</strong>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm mt-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="fas fa-star me-2"></i>Review ({{ $menu->reviews->count() }})</h5>
                </div>
                <div class="card-body">
                    @forelse($menu->reviews as $review)
                        <div class="border-bottom mb-3 pb-3">
                            <div class="d-flex justify-content-between">
                                <strong>{{ $review->nama }}</strong>
                                <span class="star-rating">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $review->rating)
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </span>
                            </div>
                            @if($review->komentar)
                                <p class="text-muted mb-1 mt-1">{{ $review->komentar }}</p>
                            @endif
                            <small class="text-muted">{{ $review->created_at->format('d M Y') }}</small>
                        </div>
                    @empty
                        <div class="empty-state">
                            <i class="fas fa-star"></i>
                            <p class="text-muted mt-2">Belum ada review untuk menu ini.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    @if($related->count() > 0)
        <div class="mt-5">
            <h4 class="mb-4">Menu Lainnya di Kategori {{ $menu->kategori }}</h4>
            <div class="row g-4">
                @foreach($related as $item)
                    <div class="col-md-3">
                        <div class="card menu-card h-100">
                            <div class="position-relative">
                                @if($item->foto)
                                    <img src="{{ asset($item->foto) }}" class="card-img-top" alt="{{ $item->nama_menu }}" style="height: 150px;">
                                @else
                                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 150px;">
                                        <i class="fas fa-image fa-2x text-muted"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">{{ $item->nama_menu }}</h6>
                                <div class="star-rating small">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= round($item->rating))
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <h6 class="text-primary fw-bold mt-1">Rp {{ number_format($item->harga, 0, ',', '.') }}</h6>
                                <a href="{{ route('frontend.menus.show', $item->slug) }}" class="btn btn-sm btn-outline-primary w-100">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
