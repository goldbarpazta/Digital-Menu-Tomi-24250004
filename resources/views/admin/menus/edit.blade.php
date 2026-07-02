@extends('admin.layouts.app')

@section('title', 'Edit Menu')

@section('content')
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.menus.index') }}">Menu</a></li>
        <li class="breadcrumb-item active">Edit Menu</li>
    </ol>
</nav>

<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Menu: {{ $menu->nama_menu }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nama Menu <span class="text-danger">*</span></label>
                        <input type="text" name="nama_menu" class="form-control @error('nama_menu') is-invalid @enderror" value="{{ old('nama_menu', $menu->nama_menu) }}" required>
                        @error('nama_menu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label">Kategori <span class="text-danger">*</span></label>
                        <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                            <option value="Food" {{ old('kategori', $menu->kategori) == 'Food' ? 'selected' : '' }}>Food</option>
                            <option value="Beverage" {{ old('kategori', $menu->kategori) == 'Beverage' ? 'selected' : '' }}>Beverage</option>
                            <option value="Dessert" {{ old('kategori', $menu->kategori) == 'Dessert' ? 'selected' : '' }}>Dessert</option>
                        </select>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                            <option value="Ready" {{ old('status', $menu->status) == 'Ready' ? 'selected' : '' }}>Ready</option>
                            <option value="Sold Out" {{ old('status', $menu->status) == 'Sold Out' ? 'selected' : '' }}>Sold Out</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Harga (Rp) <span class="text-danger">*</span></label>
                        <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $menu->harga) }}" step="0.01" min="0" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Foto Menu</label>
                        @if($menu->foto)
                            <div class="mb-2">
                                <img src="{{ asset($menu->foto) }}" class="rounded" width="100">
                            </div>
                        @endif
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                        <small class="text-muted">Format: jpeg, png, jpg, webp. Maks: 2MB. Kosongkan jika tidak ingin mengubah.</small>
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Komposisi</label>
                        <textarea name="komposisi" class="form-control @error('komposisi') is-invalid @enderror" rows="2">{{ old('komposisi', $menu->komposisi) }}</textarea>
                        @error('komposisi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label">Kalori</label>
                        <input type="number" name="kalori" class="form-control @error('kalori') is-invalid @enderror" value="{{ old('kalori', $menu->kalori) }}" min="0">
                        @error('kalori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label">Protein (g)</label>
                        <input type="number" name="protein" class="form-control @error('protein') is-invalid @enderror" value="{{ old('protein', $menu->protein) }}" step="0.1" min="0">
                        @error('protein')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label">Lemak (g)</label>
                        <input type="number" name="lemak" class="form-control @error('lemak') is-invalid @enderror" value="{{ old('lemak', $menu->lemak) }}" step="0.1" min="0">
                        @error('lemak')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label">Karbohidrat (g)</label>
                        <input type="number" name="karbohidrat" class="form-control @error('karbohidrat') is-invalid @enderror" value="{{ old('karbohidrat', $menu->karbohidrat) }}" step="0.1" min="0">
                        @error('karbohidrat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Update
                </button>
                <a href="{{ route('admin.menus.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
