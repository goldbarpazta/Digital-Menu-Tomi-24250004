@extends('admin.layouts.app')

@section('title', $menu->nama_menu)

@section('content')
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.menus.index') }}">Menu</a></li>
        <li class="breadcrumb-item active">{{ $menu->nama_menu }}</li>
    </ol>
</nav>

<div class="row g-4">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body text-center">
                @if($menu->foto)
                    <img src="{{ asset($menu->foto) }}" class="img-fluid rounded" style="max-height: 350px; object-fit: cover;">
                @else
                    <div class="p-5 bg-light rounded">
                        <i class="fas fa-image fa-5x text-muted"></i>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <h4 class="mb-0">{{ $menu->nama_menu }}</h4>
                    {!! $menu->status == 'Ready' ? '<span class="badge-ready">Ready</span>' : '<span class="badge-soldout">Sold Out</span>' !!}
                </div>

                <div class="mb-3">
                    <span class="badge bg-secondary me-2">{{ $menu->kategori }}</span>
                    <span class="star-rating">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= round($menu->rating))
                                <i class="fas fa-star"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                        <span class="ms-1 text-muted">({{ number_format($menu->rating, 1) }})</span>
                    </span>
                </div>

                <h5 class="text-primary mb-3">Rp {{ number_format($menu->harga, 0, ',', '.') }}</h5>

                @if($menu->deskripsi)
                    <p class="text-muted">{{ $menu->deskripsi }}</p>
                @endif

                @if($menu->komposisi)
                    <div class="mb-3">
                        <h6>Komposisi</h6>
                        <p class="text-muted">{{ $menu->komposisi }}</p>
                    </div>
                @endif

                <div class="row g-2 mb-3">
                    @if($menu->kalori)
                    <div class="col-3">
                        <div class="text-center p-2 bg-light rounded">
                            <small class="text-muted d-block">Kalori</small>
                            <strong>{{ $menu->kalori }}</strong>
                        </div>
                    </div>
                    @endif
                    @if($menu->protein)
                    <div class="col-3">
                        <div class="text-center p-2 bg-light rounded">
                            <small class="text-muted d-block">Protein</small>
                            <strong>{{ $menu->protein }}g</strong>
                        </div>
                    </div>
                    @endif
                    @if($menu->lemak)
                    <div class="col-3">
                        <div class="text-center p-2 bg-light rounded">
                            <small class="text-muted d-block">Lemak</small>
                            <strong>{{ $menu->lemak }}g</strong>
                        </div>
                    </div>
                    @endif
                    @if($menu->karbohidrat)
                    <div class="col-3">
                        <div class="text-center p-2 bg-light rounded">
                            <small class="text-muted d-block">Karbohidrat</small>
                            <strong>{{ $menu->karbohidrat }}g</strong>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('admin.menus.edit', $menu->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-1"></i> Edit
                    </a>
                    <a href="{{ route('admin.menus.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header bg-white">
        <h6 class="mb-0"><i class="fas fa-star me-2"></i>Review ({{ $menu->reviews->count() }})</h6>
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
                    <p class="text-muted mb-0 mt-1">{{ $review->komentar }}</p>
                @endif
                <small class="text-muted">{{ $review->created_at->format('d M Y') }}</small>
            </div>
        @empty
            <div class="empty-state">
                <i class="fas fa-star"></i>
                <p class="text-muted">Belum ada review.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
