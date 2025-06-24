@extends('user.account')
@section('substyles')
    @vite('resources/css/user/subfolder/newaccount.css')
@endsection

@section('subcontent')
    <div class="form-container">
        <form>
            <label for="name">Name</label>
            <input type="text" id="name" placeholder="Enter your name" required>

            <label for="email">Email address</label>
            <input type="email" id="email" placeholder="Enter your email" required>

            <label for="jabatan">Jabatan</label>
            <input type="text" id="jabatan" placeholder="Enter your position" required>

            <label for="password">Password</label>
            <input type="password" id="password" placeholder="Create a strong password" required>
            <small class="hint">Enter minimum 8 characters of which at least 1 symbol.</small>

            <button type="submit">Daftar</button>
        </form>
    </div>
@endsection
