@extends('layouts.tampilan')
@section('title', 'Documents')
@section('styles')
    @vite('resources/css/user/subnavbar.css')
    @hasSection('substyles')
        @yield('substyles')
    @endif
@endsection

@section('content')
    <h2 class="mb-4"><i class="bi bi-folder2-open me-2"></i>Data Pasien</h2>
    <div class="navbar">
        <div class="nav-left">
            <a href="{{ route('documents') }}"
                class="nav-link {{ request()->routeIs('documents') ? 'active' : '' }}">Documents</a>
            <a href="{{ route('download') }}"
                class="nav-link {{ request()->routeIs('download') ? 'active' : '' }}">Download</a>
        </div>
        <div class="search-container">
            <input type="text" placeholder="Search">
        </div>
    </div>
    <div class="subcontent mt-4">
        <div class="card shadow-sm p-4 border-0">
            @yield('subcontent')
        </div>
    </div>
@endsection
