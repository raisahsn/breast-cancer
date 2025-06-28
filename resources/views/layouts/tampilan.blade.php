<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        <li><a class="dropdown-item" href="#"><i class="bi bi-lock me-2"></i>Password</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right me-2"></i>Log
                                Out</a>
                        </li>
                    </ul>
                </div>
            </div>
            @yield('content')
        </main>
    </div>


    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>

</html>
