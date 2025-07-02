@extends('layouts.tampilan')
@section('title', 'Accounts')
@section('judul')
    <i class="bi bi-person-badge me-2"></i> Data User
@endsection
@section('styles')
    @vite(['resources/css/user/dashboard.css', 'resources/js/dashboard_chart.js', 'resources/js/dashboard_grafik.js'])
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
    </div>

    <!-- Chart -->
    <div class="row">
        <div class="col">
            <div class="chart-container">
                <div class="chart-header">
                    <h5>Diagnosis</h5>
                    <div class="chart-options d-flex align-items-center">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="timePeriodDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                This Year
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="timePeriodDropdown">
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                                <li><a class="dropdown-item" href="#">Last Year</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="chart-area">
                    <canvas id="diagnosisChart"></canvas>
                </div>

                <div class="chart-footer">
                    <div class="footer-left-text">
                        Current Year Total: <strong id="totaldiagnosis">0</strong>
                    </div>
                </div>
            </div>
        </div>


        <div class="col">
            <div class="chart-container-wrapper">
                <div class="chart-header">
                    <h5>Monthly Patient Visits</h5>
                    <div class="chart-options d-flex align-items-center">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="timePeriodDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                This Year
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="timePeriodDropdown">
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                                <li><a class="dropdown-item" href="#">Last Year</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="chart-area">
                    <canvas id="patientVisitsChart"></canvas>
                </div>

                <div class="chart-footer">
                    <div class="footer-left-text">
                        Current Year Total: <strong id="totalPatients">0</strong>
                    </div>
                    <div class="legend-items">
                        <div class="legend-item">
                            <span class="color-box blue"></span> Actual Visits
                        </div>
                        <div class="legend-item">
                            <span class="color-box light-blue"></span> Expected Range
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
