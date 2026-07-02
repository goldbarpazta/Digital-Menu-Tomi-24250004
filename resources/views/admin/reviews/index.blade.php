@extends('admin.layouts.app')

@section('title', 'Daftar Review')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0"><i class="fas fa-star me-2"></i>Daftar Review</h4>
    <a href="{{ route('admin.reviews.create') }}" class="btn btn-primary">
        <i class="fas fa-plus-circle me-1"></i> Tambah Review
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover" id="reviews-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Menu</th>
                        <th>Rating</th>
                        <th>Komentar</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    var table = $('#reviews-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("admin.reviews.data") }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'nama', name: 'nama' },
            { data: 'menu_nama', name: 'menu_nama' },
            { data: 'rating_stars', name: 'rating', orderable: true, searchable: false },
            { data: 'komentar', name: 'komentar' },
            { data: 'tanggal', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ],
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json'
        },
        order: [[5, 'desc']],
    });

    $(document).on('click', '.btn-delete', function() {
        var id = $(this).data('id');
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Review akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '{{ url("admin/reviews") }}/' + id,
                    type: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire('Terhapus!', 'Review berhasil dihapus.', 'success');
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
