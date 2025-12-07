@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
<style>
/* Welcome Card */
.welcome-card {
    background: linear-gradient(135deg, #d9fffb 0%, #95ddda 100%);
    padding: 30px;
    border-radius: 15px;
    color: #2d3748;
    box-shadow: 0 10px 30px rgba(149, 221, 218, 0.25);
    position: relative;
    overflow: hidden;
}

.welcome-card::before {
    content: '';
    position: absolute;
    width: 200px;
    height: 200px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    top: -100px;
    right: -50px;
}

.welcome-title {
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 8px;
    position: relative;
    z-index: 1;
}

.welcome-subtitle {
    opacity: 0.8;
    font-size: 14px;
    position: relative;
    z-index: 1;
}

/* Stat Cards */
.stat-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    height: 100%;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

.stat-card-body {
    padding: 25px;
}

.stat-label {
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: #6c757d;
    margin-bottom: 10px;
    font-weight: 600;
}

.stat-value {
    font-size: 36px;
    font-weight: 700;
    margin-bottom: 5px;
    color: #2d3748;
}

.stat-description {
    font-size: 13px;
    color: #6c757d;
    margin: 0;
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
}

.stat-icon-primary {
    background: linear-gradient(135deg, #d9fffb 0%, #95ddda 100%);
    color: #2d3748;
}

.stat-icon-success {
    background: linear-gradient(135deg, #ebf2d5 0%, #c8e09e 100%);
    color: #2d3748;
}

.stat-icon-info {
    background: linear-gradient(135deg, #95ddda 0%, #7ec5c2 100%);
    color: white;
}

.stat-card-footer {
    padding: 15px 25px;
    background: #f8f9fa;
    border-top: 1px solid #e9ecef;
}

.stat-link {
    color: #7ec5c2;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    transition: color 0.3s ease;
}

.stat-link:hover {
    color: #95ddda;
}

/* Modern Card */
.modern-card {
    border-radius: 15px;
    overflow: hidden;
}

.modern-card .card-header {
    padding: 20px 25px;
    border-radius: 15px 15px 0 0 !important;
}

/* Modern Table */
.modern-table thead th {
    background: #f8f9fa;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: #6c757d;
    border-bottom: 2px solid #e9ecef;
    padding: 15px 10px;
}

.modern-table tbody td {
    padding: 15px 10px;
    vertical-align: middle;
}

.modern-table tbody tr {
    transition: background-color 0.2s ease;
}

.modern-table tbody tr:hover {
    background-color: #f8f9fa;
}

.number-badge {
    width: 28px;
    height: 28px;
    background: linear-gradient(135deg, #95ddda 0%, #7ec5c2 100%);
    color: white;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 600;
}

/* Quick Action Buttons */
.quick-action-btn {
    padding: 18px 20px;
    border-radius: 12px;
    text-decoration: none;
    color: white;
    transition: all 0.3s ease;
    display: block;
    position: relative;
    overflow: hidden;
}

.quick-action-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s ease;
}

.quick-action-btn:hover::before {
    left: 100%;
}

.quick-action-btn.btn-primary {
    background: linear-gradient(135deg, #95ddda 0%, #7ec5c2 100%);
    color: white;
}

.quick-action-btn.btn-success {
    background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
}

.quick-action-btn.btn-info {
    background: linear-gradient(135deg, #d9fffb 0%, #95ddda 100%);
    color: #2d3748;
}

.quick-action-btn:hover {
    transform: translateX(5px);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
    color: white;
}

.quick-action-btn.btn-info:hover {
    color: #2d3748;
}

.quick-action-icon {
    width: 45px;
    height: 45px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
    font-size: 18px;
}

/* System Info */
.system-info-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px 0;
    border-bottom: 1px solid #e9ecef;
}

.system-info-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.system-info-item i {
    font-size: 24px;
}

/* Empty State */
.empty-state {
    padding: 20px;
}

/* Responsive */
@media (max-width: 768px) {
    .welcome-title {
        font-size: 22px;
    }

    .stat-value {
        font-size: 28px;
    }

    .welcome-card {
        padding: 20px;
    }
}
</style>

<!-- Welcome Section -->
<div class="row mb-4">
    <div class="col-12">
        <div class="welcome-card">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="welcome-title">
                        <i class="fas fa-hand-wave text-warning me-2"></i>
                        Welcome back, {{ Auth::user()->name }}!
                    </h2>
                    <p class="welcome-subtitle mb-0">
                        <i class="fas fa-calendar-alt me-2"></i>
                        {{ now()->format('l, F j, Y') }}
                    </p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <a href="{{ route('welcome') }}" target="_blank" class="btn btn-light shadow-sm">
                        <i class="fas fa-external-link-alt me-2"></i>Visit Website
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row g-4 mb-4">
    <!-- Stat Card 1 - Carousel -->
    <div class="col-md-6 col-lg-4">
        <div class="stat-card stat-card-primary">
            <div class="stat-card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="flex-grow-1">
                        <p class="stat-label">Carousel Items</p>
                        <h3 class="stat-value">{{ $carouselCount }}</h3>
                        <p class="stat-description">
                            <i class="fas fa-arrow-up me-1"></i>
                            Active items
                        </p>
                    </div>
                    <div class="stat-icon stat-icon-primary">
                        <i class="fas fa-images"></i>
                    </div>
                </div>
            </div>
            <div class="stat-card-footer">
                <a href="{{ route('carousel.index') }}" class="stat-link">
                    View all <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Stat Card 2 - Users -->
    <div class="col-md-6 col-lg-4">
        <div class="stat-card stat-card-success">
            <div class="stat-card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="flex-grow-1">
                        <p class="stat-label">Total Users</p>
                        <h3 class="stat-value">{{ $userCount }}</h3>
                        <p class="stat-description">
                            <i class="fas fa-check-circle me-1"></i>
                            Registered users
                        </p>
                    </div>
                    <div class="stat-icon stat-icon-success">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
            <div class="stat-card-footer">
                <a href="#" class="stat-link">
                    Manage users <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Stat Card 3 - Activity -->
    <div class="col-md-6 col-lg-4">
        <div class="stat-card stat-card-info">
            <div class="stat-card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="flex-grow-1">
                        <p class="stat-label">Last Login</p>
                        <h3 class="stat-value">{{ $lastLoginDays }}</h3>
                        <p class="stat-description">
                            <i class="fas fa-clock me-1"></i>
                            Days ago
                        </p>
                    </div>
                    <div class="stat-icon stat-icon-info">
                        <i class="fas fa-chart-line"></i>
                    </div>
                </div>
            </div>
            <div class="stat-card-footer">
                <span class="stat-link text-muted">
                    Activity tracking
                </span>
            </div>
        </div>
    </div>
</div>

<!-- Content Section -->
<div class="row g-4">
    <!-- Recent Carousel Items -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm modern-card">
            <div class="card-header bg-white border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-semibold">
                        <i class="fas fa-images text-primary me-2"></i>
                        Recent Carousel Items
                    </h5>
                    <a href="{{ route('carousel.index') }}" class="btn btn-sm btn-outline-primary">
                        View All <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover modern-table mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4" style="width: 60px;">#</th>
                                <th>Title</th>
                                <th>Last Updated</th>
                                <th class="text-end pe-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentCarouselItems as $index => $item)
                            <tr>
                                <td class="ps-4">
                                    <div class="number-badge">{{ $index + 1 }}</div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-image text-muted me-2"></i>
                                        <span class="fw-medium">{{ Str::limit($item->title_1, 40) }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark">
                                        <i class="fas fa-clock me-1"></i>
                                        {{ $item->updated_at->diffForHumans() }}
                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                    <a href="{{ route('carousel.edit', $item->id) }}"
                                       class="btn btn-sm btn-outline-secondary"
                                       data-bs-toggle="tooltip"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <div class="empty-state">
                                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                        <p class="text-muted mb-0">No carousel items found</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm modern-card mb-4">
            <div class="card-header bg-white border-bottom">
                <h5 class="mb-0 fw-semibold">
                    <i class="fas fa-bolt text-warning me-2"></i>
                    Quick Actions
                </h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-3">
                    <a href="{{ route('donate.create') }}" class="quick-action-btn btn-primary">
                        <div class="d-flex align-items-center">
                            <div class="quick-action-icon">
                                <i class="fas fa-plus-circle"></i>
                            </div>
                            <div class="flex-grow-1 text-start">
                                <div class="fw-semibold">Add Donations</div>
                                <small class="opacity-75">Create new info donations</small>
                            </div>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>

                    <a href="{{ route('welcome') }}" target="_blank" class="quick-action-btn btn-success">
                        <div class="d-flex align-items-center">
                            <div class="quick-action-icon">
                                <i class="fas fa-external-link-alt"></i>
                            </div>
                            <div class="flex-grow-1 text-start">
                                <div class="fw-semibold">Visit Website</div>
                                <small class="opacity-75">View public website</small>
                            </div>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    // Animate numbers on page load
    document.addEventListener('DOMContentLoaded', function() {
        const statValues = document.querySelectorAll('.stat-value');

        statValues.forEach(stat => {
            const target = parseInt(stat.textContent);
            if (isNaN(target)) return;

            let current = 0;
            const increment = target / 50;

            const updateNumber = () => {
                if (current < target) {
                    current += increment;
                    stat.textContent = Math.ceil(current);
                    requestAnimationFrame(updateNumber);
                } else {
                    stat.textContent = target;
                }
            };

            updateNumber();
        });
    });
</script>
@endsection
