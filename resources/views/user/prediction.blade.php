@extends('layouts.tampilan')
@section('title', 'Prediction')

@section('content')
    <h2 class="mb-4"><i class="bi bi-graph-up-arrow me-2"></i>Breast Cancer Prediction</h2>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 ps-4">
                <div class="card shadow-sm p-4 border-0" style="max-width: 500px;">

                    <form method="POST" enctype="multipart/form-data">
                        {{-- Upload File --}}
                        <div class="mb-3">
                            <label for="dataFile" class="form-label">Upload File Pasien</label>
                            <input type="file" name="data_file" id="dataFile" class="form-control">
                        </div>

                        <div class="row">
                            <!-- Kolom Kiri -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Mean Radius</label>
                                    <input type="text" name="mean_radius" class="form-control"
                                        placeholder="Contoh: 14.5">
                                </div>
                                <div class="mb-3">
                                    <label>Mean Perimeter</label>
                                    <input type="text" name="mean_perimeter" class="form-control"
                                        placeholder="Contoh: 87.2">
                                </div>
                                <div class="mb-3">
                                    <label>Mean Smoothness</label>
                                    <input type="text" name="mean_smoothness" class="form-control"
                                        placeholder="Contoh: 0.08">
                                </div>
                                <div class="mb-3">
                                    <label>Mean Concavity</label>
                                    <input type="text" name="mean_concavity" class="form-control"
                                        placeholder="Contoh: 0.04">
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Mean Texture</label>
                                    <input type="text" name="mean_texture" class="form-control"
                                        placeholder="Contoh: 18.0">
                                </div>
                                <div class="mb-3">
                                    <label>Mean Area</label>
                                    <input type="text" name="mean_area" class="form-control" placeholder="Contoh: 579.0">
                                </div>
                                <div class="mb-3">
                                    <label>Mean Compactness</label>
                                    <input type="text" name="mean_compactness" class="form-control"
                                        placeholder="Contoh: 0.05">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mt-3">Prediksi</button>
                    </form>
                    {{-- Hasil Prediksi (simulasi) --}}
                    <div class="alert alert-success mt-4" role="alert">
                        Hasil Prediksi: <strong>Benign</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
