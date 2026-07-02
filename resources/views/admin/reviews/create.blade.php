@extends('admin.layouts.app')

@section('title', 'Tambah Review')

@section('content')
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.reviews.index') }}">Review</a></li>
        <li class="breadcrumb-item active">Tambah Review</li>
    </ol>
</nav>

<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Tambah Review Baru</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.reviews.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Menu <span class="text-danger">*</span></label>
                        <select name="menu_id" class="form-select @error('menu_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Menu --</option>
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}" {{ old('menu_id') == $menu->id ? 'selected' : '' }}>
                                    {{ $menu->nama_menu }} ({{ $menu->kategori }})
                                </option>
                            @endforeach
                        </select>
                        @error('menu_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nama <span class="text-danger">*</span></label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Rating <span class="text-danger">*</span></label>
                        <select name="rating" class="form-select @error('rating') is-invalid @enderror" required>
                            <option value="">-- Pilih --</option>
                            @for($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>{{ $i }} Bintang</option>
                            @endfor
                        </select>
                        @error('rating')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Komentar</label>
                        <textarea name="komentar" class="form-control @error('komentar') is-invalid @enderror" rows="3">{{ old('komentar') }}</textarea>
                        @error('komentar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
                <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
