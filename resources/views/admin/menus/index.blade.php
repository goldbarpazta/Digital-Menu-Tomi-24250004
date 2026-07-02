@extends('admin.layouts.app')

@section('title', 'Daftar Menu')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0"><i class="fas fa-list me-2"></i>Daftar Menu</h4>
    <a href="{{ route('admin.menus.create') }}" class="btn btn-primary">
        <i class="fas fa-plus-circle me-1"></i> Tambah Menu
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover" id="menus-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Menu</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Rating</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<form id="delete-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    var table = $('#menus-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("admin.menus.data") }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'foto', name: 'foto', orderable: false, searchable: false },
            { data: 'nama_menu', name: 'nama_menu' },
            { data: 'kategori', name: 'kategori' },
            { data: 'harga_format', name: 'harga', orderable: true, searchable: false },
            { data: 'status_badge', name: 'status', orderable: true, searchable: false },
            { data: 'rating_stars', name: 'rating', orderable: true, searchable: false },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ],
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json'
        },
        order: [[2, 'asc']],
    });

    $(document).on('click', '.btn-delete', function() {
        var id = $(this).data('id');
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Menu akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '{{ url("admin/menus") }}/' + id,
                    type: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire('Terhapus!', 'Menu berhasil dihapus.', 'success');
                            table.ajax.reload();
                        }
                    },
                    error: function() {
                        Swal.fire('Error!', 'Terjadi kesalahan.', 'error');
                    }
                });
            }
        });
    });
});
</script>
@endpush
