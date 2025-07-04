<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hospital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    @vite(['resources/css/login.css'])
    <title>Hospital System</title>
</head>

<body>
    <div class="container">
        <form action="{{ route('login.post') }}" method="POST" class="row g-3 needs-validation" id="myForm"
            novalidate>
            @csrf
            {{-- Menampilkan pesan error jika login gagal --}}
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <div class="col card-img">
                <!-- Image as background -->
                <div class="card-img">
                    <img src="{{ asset('img/biru-new.png') }}" alt="Doctor Avatar" class="img-fluid">
                </div>
            </div>
            <div class="col card-body">
                <h2 class="text-center">Breast Cancer</h2>
                <p class="text-center">Prediction</p>
                <!-- Login Form -->
                <div class="d-grid gap-2 col-9 mx-auto pt-3">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group">
                        <input type="text" class="form-control rounded-3" id="username" name="username" required>
                        <div class="invalid-feedback">
                            Please input your username.
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2 col-9 mx-auto pt-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control rounded-3" id="password" name="password" required>
                        <div class="invalid-feedback">
                            Please input your password.
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto pt-3">
                    <button class="btn btn-primary" type="submit">Log In</button>
                </div>
            </div>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>

</body>

</html>
