@extends('layouts.tampilan')
@section('title', 'Accounts')
@section('styles')
    @vite('resources/css/user/subnavbar.css')
    @hasSection('substyles')
        @yield('substyles')
    @endif
@endsection

@section('content')
    <h2 class="mb-4"><i class="bi bi-people me-2"></i>Data Account</h2>
    <div class="navbar">
        <div class="nav-left">
            <a href="{{ route('accounts') }}"
                class="nav-link {{ request()->routeIs('accounts') ? 'active' : '' }}">Accounts</a>
            <a href="{{ route('newaccount') }}" class="nav-link {{ request()->routeIs('newaccount') ? 'active' : '' }}">New
                Account</a>
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
