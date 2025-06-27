@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid py-4">
    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-semibold text-dark mb-0">📊 Dashboard Admin</h4>
        <select class="form-select form-select-sm w-auto">
            <option>Last 30 days</option>
            <option>Last 7 days</option>
            <option>This month</option>
        </select>
    </div>

    {{-- Overview Cards --}}
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card bg-light border-0 shadow-sm rounded-4 p-3">
                <div class="d-flex align-items-center mb-2">
                    <div class="me-2">
                        <i class="bi bi-currency-dollar fs-3 text-primary"></i>
                    </div>
                    <div>
                        <p class="mb-1 text-muted small">Total Revenue</p>
                        <h5 class="fw-bold mb-0">$53,009.89</h5>
                    </div>
                </div>
                <small class="text-success">▲ 12% this month</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-light border-0 shadow-sm rounded-4 p-3">
                <div class="d-flex align-items-center mb-2">
                    <div class="me-2">
                        <i class="bi bi-briefcase fs-3 text-danger"></i>
                    </div>
                    <div>
                        <p class="mb-1 text-muted small">Projects</p>
                        <h5 class="fw-bold mb-0">95 / 100</h5>
                    </div>
                </div>
                <small class="text-danger">▼ 5% this month</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-light border-0 shadow-sm rounded-4 p-3">
                <div class="d-flex align-items-center mb-2">
                    <div class="me-2">
                        <i class="bi bi-clock fs-3 text-info"></i>
                    </div>
                    <div>
                        <p class="mb-1 text-muted small">Time Spent</p>
                        <h5 class="fw-bold mb-0">1022 / 1300 Hrs</h5>
                    </div>
                </div>
                <small class="text-muted">Updated 3h ago</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-light border-0 shadow-sm rounded-4 p-3">
                <div class="d-flex align-items-center mb-2">
                    <div class="me-2">
                        <i class="bi bi-people fs-3 text-warning"></i>
                    </div>
                    <div>
                        <p class="mb-1 text-muted small">Resources</p>
                        <h5 class="fw-bold mb-0">101 / 120</h5>
                    </div>
                </div>
                <small class="text-muted">All roles filled</small>
            </div>
        </div>
    </div>

    {{-- Summary Table and Progress --}}
    <div class="row g-4">
        {{-- Project Summary --}}
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 fw-semibold">Project Summary</h6>
                    <div class="d-flex gap-2">
                        <select class="form-select form-select-sm">
                            <option>Project</option>
                        </select>
                        <select class="form-select form-select-sm">
                            <option>Manager</option>
                        </select>
                        <select class="form-select form-select-sm">
                            <option>Status</option>
                        </select>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Project</th>
                                <th>Manager</th>
                                <th>Due</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Website Redesign</td>
                                <td>Oni Prakash</td>
                                <td>May 25, 2025</td>
                                <td><span class="badge bg-success">Completed</span></td>
                            </tr>
                            <tr>
                                <td>Media Branding</td>
                                <td>Trendy Priya</td>
                                <td>Jun 18, 2025</td>
                                <td><span class="badge bg-warning text-dark">On Progress</span></td>
                            </tr>
                            <tr>
                                <td>Travel App</td>
                                <td>Matah Marnoy</td>
                                <td>Jul 02, 2025</td>
                                <td><span class="badge bg-danger">Delayed</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Overall Progress --}}
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 rounded-4 text-center p-4">
                <h6 class="fw-semibold mb-3">Overall Progress</h6>
                <div class="progress-circle position-relative mx-auto" style="width: 140px; height: 140px;">
                    <svg viewBox="0 0 36 36" class="circular-chart green" width="140" height="140">
                        <path class="circle-bg"
                              d="M18 2.0845
                                 a 15.9155 15.9155 0 0 1 0 31.831
                                 a 15.9155 15.9155 0 0 1 0 -31.831"
                              fill="none" stroke="#eee" stroke-width="2"/>
                        <path class="circle"
                              stroke-dasharray="72, 100"
                              d="M18 2.0845
                                 a 15.9155 15.9155 0 0 1 0 31.831
                                 a 15.9155 15.9155 0 0 1 0 -31.831"
                              fill="none" stroke="#22c55e" stroke-width="2"/>
                    </svg>
                    <div class="position-absolute top-50 start-50 translate-middle">
                        <span class="fw-bold fs-5">72%</span><br>
                        <small class="text-muted">Completed</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
