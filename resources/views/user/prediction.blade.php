@extends('layouts.tampilan')
@section('title', 'Prediction')
@section('judul')
    <i class="bi bi-graph-up-arrow me-2"></i> Breast Cancer Prediction
@endsection
@section('styles')
    @vite('resources/css/user/prediction.css')
@endsection

@section('content')
    <div class="d-flex justify-content-center align-items-center">
        <div class="card shadow-sm p-4 border-0  w-100 mx-auto" style="max-width: 800px;">
            <form method="POST" enctype="multipart/form-data">
                {{-- Upload File  Data Pasien --}}
                <div class="d-flex align-items-center mb-3">
                    <span class="icon-wrapper me-2">
                        <i class="bi bi-person"></i>
                    </span>
                    <p class="mb-0 me-4"></i>Data Pasien</p>
                    <button class="btn btn-custome rounded-4 me-2" type="button" id="uploadfileButton"
                        onclick="showForm('uploadfile')">Upload File</button>
                    <button class="btn btn-custome rounded-4" type="button" id="biodataButton"
                        onclick="showForm('biodata')">Biodata</button>
                </div>

                <!-- Biodata Form -->
                <div id="biodataForm" class="form-container">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="name" placeholder="NIK"
                                        maxlength="16" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="age" placeholder="Tanggal Lahir">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" placeholder="Nama Lengkap">
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Jenis Kelamin</option>
                                        <option value="1">L</option>
                                        <option value="2">P</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Upload File Form -->
                <div id="uploadfileForm" class="form-container" style="display: none;">
                    <h3>Upload file</h3>
                    <form>
                        <div class="mb-3 col-6">
                            <input type="file" class="form-control"id="inputGroupFile01">
                        </div>
                    </form>
                </div>

                <div class="d-flex align-items-center mb-3">
                    <span class="icon-data me-2">
                        <i class="bi bi-file-earmark-arrow-down"></i>
                    </span>
                    <p class="mb-0 me-4"></i>Data Tumor</p>
                </div>
                <div class="row">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Mean Radius</label>
                            <input type="text" name="mean_radius" class="form-control" placeholder="Contoh: 14.5">
                        </div>
                        <div class="mb-3">
                            <label>Mean Perimeter</label>
                            <input type="text" name="mean_perimeter" class="form-control" placeholder="Contoh: 87.2">
                        </div>
                        <div class="mb-3">
                            <label>Mean Smoothness</label>
                            <input type="text" name="mean_smoothness" class="form-control" placeholder="Contoh: 0.08">
                        </div>
                        <div class="mb-3">
                            <label>Mean Concavity</label>
                            <input type="text" name="mean_concavity" class="form-control" placeholder="Contoh: 0.04">
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Mean Texture</label>
                            <input type="text" name="mean_texture" class="form-control" placeholder="Contoh: 18.0">
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
            </form>
            <button type="submit" class="btn btn-primary mt-3 mx-auto">Prediksi</button>
            {{-- Hasil Prediksi (simulasi) --}}
            <div class="alert alert-success mt-4" role="alert">
                Hasil Prediksi: <strong>Benign</strong>
            </div>
        </div>
    </div>

    <script>
        // Function to toggle between the forms
        function showForm(formType) {
            // Hide both forms initially
            document.getElementById('biodataForm').style.display = 'none';
            document.getElementById('uploadfileForm').style.display = 'none';

            // Show the selected form
            if (formType === 'biodata') {
                document.getElementById('biodataForm').style.display = 'block';
                document.getElementById('biodataButton').classList.add('active');
                document.getElementById('uploadfileButton').classList.remove('active');
            } else if (formType === 'uploadfile') {
                document.getElementById('uploadfileForm').style.display = 'block';
                document.getElementById('uploadfileButton').classList.add('active');
                document.getElementById('biodataButton').classList.remove('active');
            }
        }

        // Initially show the biodata form when the page loads
        window.onload = function() {
            showForm('uploadfile');
        };
    </script>

@endsection
