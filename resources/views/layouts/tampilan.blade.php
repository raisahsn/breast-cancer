<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>@yield('title')</title>
    @vite(['resources/css/tampilan.css'])
    @yield('styles')
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <aside class="sidebar d-flex flex-column align-items-start p-3 gap-2">
            @include('partials.sidebar')
        </aside>

        <!-- Tempat konten halaman -->
        <main class="content p-4 flex-grow-1">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">@yield('judul')</h2>
                <div class="dropdown d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-custom dropdown-toggle rounded-pill" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ asset('img/stethescope.png') }}" alt="Avatar" class="avatar-img me-2">
                        Nama Dokter
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#changePassModal"
                                href="#"><i class="bi bi-pencil-square me-2"></i>Change Password</a>
                        </li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right me-2"></i>Log
                                Out</a>
                        </li>
                    </ul>
                </div>
            </div>
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap Modal untuk Edit Akun User -->
    <div class="modal fade" id="changePassModal" tabindex="-1" aria-labelledby="changePassModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePassModalLabel">Ganti Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-ganti-password" data-action="{{ url('/user/password') }}">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editPasswordInput" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" id="editPasswordInput"
                                placeholder="Masukkan password baru" required>
                        </div>
                        <div id="password-change-alert"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const changePassForm = document.getElementById('form-ganti-password');
            const alertContainer = document.getElementById('password-change-alert');

            if (changePassForm) {
                changePassForm.addEventListener('submit', async function(event) {
                    event.preventDefault();

                    const newPassword = document.getElementById('editPasswordInput').value;
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content');
                    const actionUrl = changePassForm.dataset.action;
                    alertContainer.innerHTML = '';

                    try {
                        const response = await fetch(actionUrl, {
                            method: 'POST', // Pastikan ini 'POST'
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: JSON.stringify({
                                newPassword: newPassword,
                                _method: 'POST' // Dan ada baris ini
                            })
                        });

                        const result = await response.json();

                        if (!response.ok) {
                            throw new Error(result.message || 'Gagal mengubah password.');
                        }

                        alertContainer.innerHTML =
                            `<div class="alert alert-success">${result.message}</div>`;
                        changePassForm.reset();
                        setTimeout(() => {
                            const modalInstance = bootstrap.Modal.getInstance(document
                                .getElementById('changePassModal'));
                            if (modalInstance) modalInstance.hide();
                        }, 2000);

                    } catch (error) {
                        // Tambahkan logging untuk debugging yang lebih baik
                        console.error("Terjadi error saat mengubah password:", error);
                        alertContainer.innerHTML =
                            `<div class="alert alert-danger">${error.message}</div>`;
                    }
                });
            }

            // Pastikan meta tag csrf-token ada di <head> halaman Anda
            // <meta name="csrf-token" content="{{ csrf_token() }}">
        });
    </script>
</body>

</html>
