@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</h4>
    <span class="text-muted">{{ now()->format('d F Y') }}</span>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card card-dashboard">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Menu</h6>
                        <h3 class="mb-0 fw-bold">{{ $totalMenu }}</h3>
                    </div>
                    <div class="card-icon bg-primary text-white">
                        <i class="fas fa-utensils"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-dashboard">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Food</h6>
                        <h3 class="mb-0 fw-bold">{{ $totalFood }}</h3>
                    </div>
                    <div class="card-icon" style="background-color: #28a745; color: #fff;">
                        <i class="fas fa-hamburger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-dashboard">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Beverage</h6>
                        <h3 class="mb-0 fw-bold">{{ $totalBeverage }}</h3>
                    </div>
                    <div class="card-icon" style="background-color: #17a2b8; color: #fff;">
                        <i class="fas fa-coffee"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-dashboard">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Dessert</h6>
                        <h3 class="mb-0 fw-bold">{{ $totalDessert }}</h3>
                    </div>
                    <div class="card-icon" style="background-color: #ffc107; color: #fff;">
                        <i class="fas fa-ice-cream"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card card-dashboard">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Ready</h6>
                        <h3 class="mb-0 fw-bold text-success">{{ $ready }}</h3>
                    </div>
                    <div class="card-icon" style="background-color: #28a745; color: #fff;">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-dashboard">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Sold Out</h6>
                        <h3 class="mb-0 fw-bold text-danger">{{ $soldOut }}</h3>
                    </div>
                    <div class="card-icon bg-danger text-white">
                        <i class="fas fa-times-circle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-dashboard">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Rata-rata Rating</h6>
                        <h3 class="mb-0 fw-bold">{{ number_format($avgRating, 1) }}</h3>
                    </div>
                    <div class="card-icon" style="background-color: #ffc107; color: #fff;">
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-dashboard">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Menu Terbaik</h6>
                        <h6 class="mb-0 fw-bold">{{ $menuTerbaik ? $menuTerbaik->nama_menu : '-' }}</h6>
                    </div>
                    <div class="card-icon" style="background-color: #6f42c1; color: #fff;">
                        <i class="fas fa-trophy"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-6">
        <div class="card card-dashboard">
            <div class="card-header bg-white">
                <h6 class="mb-0"><i class="fas fa-chart-pie me-2"></i>Kategori Menu</h6>
            </div>
            <div class="card-body">
                <canvas id="kategoriChart" height="250"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-dashboard">
            <div class="card-header bg-white">
                <h6 class="mb-0"><i class="fas fa-chart-bar me-2"></i>Status Menu</h6>
            </div>
            <div class="card-body">
                <canvas id="statusChart" height="250"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    new Chart(document.getElementById('kategoriChart'), {
        type: 'doughnut',
        data: {
            labels: ['Food', 'Beverage', 'Dessert'],
            datasets: [{
                data: [{{ $kategoriData['Food'] ?? 0 }}, {{ $kategoriData['Beverage'] ?? 0 }}, {{ $kategoriData['Dessert'] ?? 0 }}],
                backgroundColor: ['#28a745', '#17a2b8', '#ffc107'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    new Chart(document.getElementById('statusChart'), {
        type: 'bar',
        data: {
            labels: ['Ready', 'Sold Out'],
            datasets: [{
                label: 'Jumlah',
                data: [{{ $statusData['Ready'] ?? 0 }}, {{ $statusData['Sold Out'] ?? 0 }}],
                backgroundColor: ['#28a745', '#dc3545'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
});
</script>
@endpush
