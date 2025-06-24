@extends('user.document')

@section('substyles')
    @vite(['resources/css/user/subfolder/download.css', 'resources/js/download.js'])
@endsection



@section('subcontent')
    <div class="download-form">
        {{-- Pilihan download semua --}}
        <div class="form-check form-switch mb-4">
            <input class="form-check-input" type="checkbox" id="downloadAllSwitch">
            <label class="form-check-label fw-semibold" for="downloadAllSwitch">Download semua data</label>
        </div>

        {{-- Form filter --}}
        <form>
            <div class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label">Jumlah File</label>
                    <input type="number" class="form-control" placeholder="Contoh: 10" id="jumlahFile">
                </div>

                <div class="col-md-2">
                    <label class="form-label">Mulai dari Tanggal</label>
                    <input type="date" class="form-control" id="tanggalMulai">
                </div>

                <div class="col-md-2">
                    <label class="form-label">Sampai Tanggal</label>
                    <input type="date" class="form-control" id="tanggalSampai">
                </div>
            </div>

            {{-- Tombol --}}
            <div class="mt-4">
                <button class="btn btn-primary" type="submit">
                    <i class="bi bi-download me-1"></i> Download Sekarang
                </button>
            </div>
        </form>
    </div>
@endsection
