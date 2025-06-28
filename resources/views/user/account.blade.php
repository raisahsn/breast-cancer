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
                            <th>Password</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= 5; $i++)
                            <tr>
                                <td>nama</td>
                                <td>user</td>
                                <td>Cell Text</td>
                                <td>Cell Text</td>
                                <td>
                                    <button class="btn btn-outline-warning btn-sm me-2" data-bs-toggle="modal"
                                        data-bs-target="#editUserModal">Edit</button>
                                    <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteConfirmModal">Hapus</button>
                                </td>
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

                @for ($i = 1; $i <= 5; $i++)
                    <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                        <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
                    </li>
                @endfor

                <li class="page-item {{ $currentPage == 5 ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $currentPage < 11 ? '?page=' . ($currentPage + 1) : '#' }}">Next ›</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Modal untuk Tambah Akun User -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Tambah Akun Pengguna Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="Nameinput" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nameInput" placeholder="Masukkan nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="usernameInput" class="form-label">Username</label>
                            <input type="text" class="form-control" id="usernameInput" placeholder="Masukkan username"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="passwordInput" class="form-label">Password</label>
                            <input type="password" class="form-control" id="passwordInput" placeholder="Masukkan password"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="roleSelect" class="form-label">Role</label>
                            <select class="form-select" id="roleSelect" required>
                                <option selected disabled value="">Pilih role...</option>
                                <option value="admin">Admin</option>
                                <option value="lab">Lab</option>
                                <option value="doctor">Doctor</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Simpan Akun</button>
                </div>
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
                            <label for="editPasswordInput" class="form-label">Password Baru (Biarkan kosong jika tidak
                                ingin
                                mengubah)</label>
                            <input type="password" class="form-control" id="editPasswordInput"
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
    </div>
@endsection
