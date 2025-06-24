@extends('user.document')

@section('substyles')
    @vite('resources/css/user/subfolder/tables.css')
@endsection

@section('subcontent')
    <div class="table-wrapper">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>ID Pasien</th>
                    <th>ID Pemeriksaan</th>
                    <th>Nama Pasien</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Pemeriksaan</th>
                    <th>Hasil Prediksi</th>
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
@endsection
