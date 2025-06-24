@extends('user.account')

@section('substyles')
    @vite('resources/css/user/subfolder/tables.css')
@endsection

@section('subcontent')
    <div class="table-wrapper">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Passwoed</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 5; $i++)
                    <tr>
                        <td>user</td>
                        <td>Cell Text</td>
                        <td>Cell Text</td>
                        <td><button class="btn btn-outline-danger btn-sm">Hapus</button></td>
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
@endsection
