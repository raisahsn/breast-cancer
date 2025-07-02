// resources/views/user/account.blade.php
@extends('layouts.tampilan')
@section('title', 'Accounts')
@section('judul')
    <i class="bi bi-person-badge me-2"></i> Data User
@endsection
@section('styles')
    @vite(['resources/css/user/tables.css', 'resources/css/user/account.css'])
@endsection

@section('content')
    <div class="subcontent mt-4">
        <div class="card shadow-sm p-4 border-0">
            <!-- Tombol "Tambah Account User" -->
            <div class="d-flex justify-content-end mb-3">
                <button type="button" class="btn custom-add-account-btn" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    <i class="fas fa-plus me-2"></i>Account <i class="fas fa-caret-down ms-2"></i>
                </button>
            </div>

            <!-- Tabel Account -->
            <div class="table-wrapper">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['username'] }}</td>
                                <td>{{ $user['role']['roleName'] ?? 'N/A' }}</td>
                                <!-- Mengakses roleName melalui role yang merupakan array -->
                                <td>
                                    <button class="btn btn-outline-warning btn-sm me-2" data-bs-toggle="modal"
                                        data-bs-target="#editUserModal">Edit</button>
                                    <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteConfirmModal">Hapus</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal untuk Tambah Akun User -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Tambah Akun Pengguna Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="nameInput" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nameInput" name="name"
                                placeholder="Masukkan nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="usernameInput" class="form-label">Username</label>
                            <input type="text" class="form-control" id="usernameInput" name="username"
                                placeholder="Masukkan username" required>
                        </div>
                        <div class="mb-3">
                            <label for="passwordInput" class="form-label">Password</label>
                            <input type="password" class="form-control" id="passwordInput" name="password"
                                placeholder="Masukkan password" required>
                        </div>
                        <div class="mb-3">
                            <label for="roleAddSelect" class="form-label">Role</label>
                            <select class="form-select" id="roleAddSelect" name="idRole" required>
                                <option selected disabled value="">Pilih role...</option>
                                <option value="1">Admin</option>
                                <option value="2">Lab</option>
                                <option value="3">Doctor</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="saveAddAccountBtn">Simpan Akun</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Bootstrap Modal untuk Edit Akun User -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit Akun Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="editNameInput" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="editNameInput" value="user_example" required>
                        </div>
                        <div class="mb-3">
                            <label for="editUsernameInput" class="form-label">Username</label>
                            <input type="text" class="form-control" id="editUsernameInput" value="user_example"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="EditPasswordInput" class="form-label">Password Baru (Biarkan kosong jika
                                tidak
                                ingin
                                mengubah)</label>
                            <input type="password" class="form-control" id="EditPasswordInput"
                                placeholder="Masukkan password baru">
                        </div>
                        <div class="mb-3">
                            <label for="editRoleSelect" class="form-label">Role</label>
                            <select class="form-select" id="editRoleSelect" required>
                                <option value="admin">Admin</option>
                                <option value="lab" selected>lab</option>
                                <option value="doctor">Doctor</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Modal untuk Konfirmasi Hapus Akun -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmModalLabel">Konfirmasi Hapus Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p>Apakah Anda yakin ingin menghapus akun ini?</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>
@endsection
