@extends('layouts.tamplate')

@section('content')
<style>
    body {
        background-color: #fefaf6;
        font-family: 'Poppins', sans-serif;
    }

    .login-wrapper {
        background-color: #ffffff;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.07);
        overflow: hidden;
        min-height: 500px;
    }

    .login-form {
        padding: 2.5rem;
    }

    .login-form h4 {
        font-weight: 700;
        color: #5b3c2d;
    }

    .login-form label {
        font-size: 14px;
        font-weight: 500;
        color: #5b3c2d;
    }

    .form-control:focus {
        border-color: #5b3c2d;
        box-shadow: none;
    }

    .btn-login {
        background-color: #5b3c2d;
        color: #fff;
        font-weight: 600;
        border-radius: 8px;
    }

    .btn-login:hover {
        background-color: #4b2e22;
    }

    .social-login a {
        text-decoration: none;
        margin: 0 8px;
        color: #5b3c2d;
        font-weight: 500;
        font-size: 15px;
    }

    .img-col {
        background-color: #f7ebe2;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }

    .img-col img {
        max-width: 90%;
        height: auto;
    }

    @media (max-width: 768px) {
        .login-wrapper {
            flex-direction: column;
        }

        .img-col {
            display: none;
        }
    }
</style>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 d-flex login-wrapper flex-wrap">
            {{-- Left: Form --}}
            <div class="col-md-6 login-form">
                <div class="mb-4">
                    <h4>Sistem Rekomendasi Wisata</h4>
                    <p class="mb-0 text-muted">Selamat datang kembali! Silakan login ke akun Anda.</p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first('email') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form method="POST" action="/login">
                    @csrf
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required placeholder="you@example.com">
                    </div>

                    <div class="mb-3">
                        <label for="password">Kata Sandi</label>
                        <input type="password" name="password" id="password" class="form-control" required placeholder="********">
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <input type="checkbox" id="remember" class="form-check-input">
                            <label for="remember" class="form-check-label">Ingat saya</label>
                        </div>
                        <a href="#" class="text-decoration-none text-success">Lupa password?</a>
                    </div>

                    {{-- Tambahkan ini di dalam login-form bagian bawah form --}}

                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-login">Login</button>
                    </div>

                    <div class="text-center mt-2">
                        <span class="text-muted">Belum punya akun?</span>
                        <a href="{{ route('register') }}" class="fw-semibold text-decoration-none" style="color: #5b3c2d;">Daftar</a>
                    </div>

                    <div class="text-center social-login mt-4">
                        <p class="mb-1">Atau login dengan</p>
                        <a href="#">Facebook</a> |
                        <a href="#">LinkedIn</a> |
                        <a href="#">Google</a>
                    </div>

                </form>
            </div>

            {{-- Right: Image --}}
            <div class="col-md-6 img-col">
                <img src="{{ asset('images/travel-login.png') }}" alt="Travel Illustration">
            </div>
        </div>
    </div>
</div>
@endsection
