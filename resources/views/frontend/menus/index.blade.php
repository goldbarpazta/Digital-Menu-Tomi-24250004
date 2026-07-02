@extends('frontend.layouts.app')

@section('title', 'Menu')

@section('content')
<div class="bg-dark text-white py-4">
    <div class="container">
        <h2 class="mb-0"><i class="fas fa-list me-2"></i>Menu Restoran</h2>
    </div>
</div>

<div class="container py-4">
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5>Filter</h5>
                    <hr>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Kategori</label>
                        <div class="d-flex flex-column gap-2">
                            <a href="{{ route('frontend.menus.index') }}" class="btn btn-sm {{ !request('kategori') ? 'btn-primary' : 'btn-outline-secondary' }}">Semua</a>
                            @foreach($kategoris as $k)
                                <a href="{{ route('frontend.menus.index', ['kategori' => $k]) }}" class="btn btn-sm {{ request('kategori') == $k ? 'btn-primary' : 'btn-outline-secondary' }}">{{ $k }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Status</label>
                        <div class="d-flex flex-column gap-2">
                            <a href="{{ route('frontend.menus.index') }}" class="btn btn-sm {{ !request('status') ? 'btn-primary' : 'btn-outline-secondary' }}">Semua</a>
                            <a href="{{ route('frontend.menus.index', ['status' => 'Ready']) }}" class="btn btn-sm {{ request('status') == 'Ready' ? 'btn-primary' : 'btn-outline-secondary' }}">Ready</a>
                            <a href="{{ route('frontend.menus.index', ['status' => 'Sold Out']) }}" class="btn btn-sm {{ request('status') == 'Sold Out' ? 'btn-primary' : 'btn-outline-secondary' }}">Sold Out</a>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Cari Menu</label>
                        <form action="{{ route('frontend.menus.index') }}" method="GET" id="search-form">
                            @if(request('kategori'))
                                <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                            @endif
                            @if(request('status'))
                                <input type="hidden" name="status" value="{{ request('status') }}">
                            @endif
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Cari menu..." value="{{ request('search') }}" id="search-input">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            @if(request('search') || request('kategori') || request('status'))
                <div class="mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <span class="text-muted">Filter aktif:</span>
                        @if(request('search'))
                            <span class="badge bg-primary">Pencarian: {{ request('search') }}</span>
                        @endif
                        @if(request('kategori'))
                            <span class="badge bg-info">{{ request('kategori') }}</span>
                        @endif
                        @if(request('status'))
                            <span class="badge bg-secondary">{{ request('status') }}</span>
                        @endif
                        <a href="{{ route('frontend.menus.index') }}" class="btn btn-sm btn-outline-danger ms-2">
                            <i class="fas fa-times"></i> Hapus Filter
                        </a>
                    </div>
                </div>
            @endif

            <div class="row g-4" id="menu-list">
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
                                <span class="position-absolute top-0 start-0 m-2">
                                    <span class="badge bg-dark">{{ $menu->kategori }}</span>
                                </span>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $menu->nama_menu }}</h5>
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
                            <i class="fas fa-search"></i>
                            <h5 class="mt-3">Menu tidak ditemukan</h5>
                            <p class="text-muted">Coba gunakan kata kunci atau filter yang berbeda.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="mt-4">
                {{ $menus->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    let searchTimeout;

    $('#search-input').on('keyup', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(function() {
            $('#search-form').submit();
        }, 500);
    });
});
</script>
@endpush
