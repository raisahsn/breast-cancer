@extends('layouts.tampilan')
@section('title', 'Documents')
@section('judul')
    <i class="bi bi-clipboard-plus me-2"></i> Data Pasien
@endsection
@section('styles')
    @vite(['resources/css/user/tables.css', 'resources/css/user/document.css'])
@endsection

@section('content')
    <div class="subcontent mt-4">
        <!-- Card -->
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="statistic-card">
                    <div class="card-header-top">
                        <div class="card-title">All Patients</div>
                    </div>
                    <div class="card-main-value">
                        <div class="icon-circle">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        2,350
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="statistic-card">
                    <div class="card-header-top">
                        <div class="card-title">Benigna</div>
                    </div>
                    <div class="card-main-value">
                        <div class="icon-circle">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        450
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="statistic-card">
                    <div class="card-header-top">
                        <div class="card-title">Maligna</div>
                    </div>
                    <div class="card-main-value">
                        <div class="icon-circle">
                            <i class="fas fa-biohazard"></i>
                        </div>
                        1,900
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="statistic-card">
                    <div class="card-header-top">
                        <div class="card-title">Mean Probability</div>
                    </div>
                    <div class="card-main-value">
                        <div class="icon-circle">
                            <i class="fas fa-percent"></i>
                        </div>
                        85%
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel -->
        <div class="card shadow-sm border-0">
            <div class="container-fluid header-section">
                <div class="row align-items-center">
                    <div class="col-md-3 mb-3 mb-md-0">
                        <div class="search-bar">
                            <i class="bi bi-search"></i>
                            <input type="text" class="form-control" placeholder="Search patient, doctor, etc">
                        </div>
                    </div>
                    <div class="col-md-9 d-flex justify-content-md-end justify-content-start filter-buttons">
                        <div class="dropdown me-2">
                            <button class="btn btn-light-purple dropdown-toggle" type="button" id="dropdownThisWeek"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                This Week
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownThisWeek">
                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
                        <div class="dropdown me-2">
                            Sort by:
                            <button class="btn btn-light-purple dropdown-toggle" type="button" id="dropdownSortBy"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Doctor
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownSortBy">
                                <li><a class="dropdown-item" href="#">Name</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-wrapper">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Nama Pasien</th>
                            <th>NIK</th>
                            <th>Tanggal Pemeriksaan</th>
                            <th>Dokter</th>
                            <th>Diagnosis</th>
                            <th>Probabilitas</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= 10; $i++)
                            <tr>
                                <td>Pasien</td>
                                <td>Cell Text</td>
                                <td>Cell Text</td>
                                <td>Cell Text</td>
                                <td><span class="badge-prediction">Benign</span></td>
                                <td>92%</td>
                                <td><button class="btn btn-outline-primary btn-sm">Lihat</button></td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @php
                $currentPage = request()->get('page', 1);
            @endphp

            <ul class="pagination justify-content-center mt-4">
                <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $currentPage > 1 ? '?page=' . ($currentPage - 1) : '#' }}">‹ Previous</a>
                </li>

                @for ($i = 1; $i <= 11; $i++)
                    <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                        <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
                    </li>
                @endfor

                <li class="page-item {{ $currentPage == 11 ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $currentPage < 11 ? '?page=' . ($currentPage + 1) : '#' }}">Next ›</a>
                </li>
            </ul>
        </div>
    </div>
@endsection
