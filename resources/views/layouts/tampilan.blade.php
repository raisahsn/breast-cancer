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

                        @php
                            // Ambil nama role, ubah ke huruf kecil, dan siapkan default jika tidak ada
                            $roleName = strtolower(data_get($loggedInUser, 'role.roleName', ''));
                        @endphp

                        {{-- Logika untuk memilih gambar berdasarkan role --}}
                        @if ($roleName == 'admin')
                            <img src="{{ asset('img/user.png') }}" alt="Admin Avatar" class="avatar-img me-2">
                        @elseif ($roleName == 'doctor' || $roleName == 'dokter')
                            <img src="{{ asset('img/stethescope.png') }}" alt="Doctor Avatar" class="avatar-img me-2">
                        @else
                            <img src="{{ asset('img/lab.png') }}" alt="Lab Avatar" class="avatar-img me-2">
                        @endif

                        {{ $loggedInUser['name'] ?? 'User' }}
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
                <form id="form-ganti-password" method="POST">
                    @csrf
                    @method('PATCH')
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="changePassModalLabel">Ganti Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
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

    <!-- Tambahkan ini sebelum </body> -->
    @stack('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Dapatkan elemen-elemen yang dibutuhkan
            const changePassForm = document.getElementById('form-ganti-password');
            const passwordInput = document.getElementById('editPasswordInput');
            const alertBox = document.getElementById('password-change-alert');

            // Ambil ID user yang sedang login dari variabel yang sudah kita buat di AppServiceProvider
            const userId = "{{ $loggedInUser['idAccount'] ?? '' }}";

            if (changePassForm) {
                changePassForm.addEventListener('submit', function(event) {
                    event.preventDefault(); // Mencegah form dikirim secara normal

                    const userId = "{{ $loggedInUser['idAccount'] ?? '' }}";
                    const actionUrl = `{{ url('/user') }}/${userId}/password/change`;

                    // ==========================================================
                    // TAMBAHKAN DUA BARIS INI UNTUK DEBUG
                    console.log("User ID yang digunakan:", userId);
                    console.log("URL yang akan di-fetch:", actionUrl);
                    // ==========================================================

                    // Kirim data menggunakan Fetch API (AJAX)
                    fetch(actionUrl, {
                            method: 'PATCH',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                newPassword: passwordInput.value
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.error === false) {
                                // 1. Dapatkan kontrol modal dan tutup
                                const modalElement = document.getElementById('changePassModal');
                                const modalInstance = bootstrap.Modal.getInstance(modalElement);
                                modalInstance.hide();

                                // 2. Tampilkan pesan sukses menggunakan alert bawaan browser
                                alert(data.message);

                                // 3. (Opsional tapi disarankan) Refresh halaman agar sesi diperbarui
                                location.reload();
                            } else {
                                alertBox.innerHTML =
                                    `<div class="alert alert-danger" role="alert">${data.message || 'Terjadi kesalahan.'}</div>`;
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alertBox.innerHTML =
                                `<div class="alert alert-danger" role="alert">Tidak dapat terhubung ke server.</div>`;
                        });
                });
            }

            // Membersihkan alert setiap kali modal dibuka kembali
            const changePassModal = document.getElementById('changePassModal');
            if (changePassModal) {
                changePassModal.addEventListener('show.bs.modal', function() {
                    alertBox.innerHTML = '';
                    passwordInput.value = '';
                });
            }
        });
    </script>
</body>

</html>
