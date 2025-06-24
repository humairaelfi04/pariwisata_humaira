@extends('layouts.tamplate')

@section('content')
<style>
    body {
        background-color: #245744;
        font-family: 'Poppins', sans-serif;
    }
    .login-wrapper {
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        overflow: hidden;
        min-height: 500px; /* agar tampak seimbang */
    }
    .login-form h4 {
        font-weight: 600;
    }
    .login-form label {
        font-size: 14px;
        font-weight: 500;
    }
    .form-control:focus {
        border-color: #198754;
        box-shadow: none;
    }
    .btn-login {
        background-color: #198754;
        color: #fff;
        font-weight: 600;
    }
    .btn-signup {
        border: 1px solid #198754;
        color: #198754;
        font-weight: 600;
    }
    .social-login a {
        text-decoration: none;
        margin: 0 5px;
        color: #198754;
        font-weight: 500;
    }
    .img-col {
        background-color: #f5dbc4;
        display: flex;
        align-items: center;
        justify-content: center;
        height: auto;
        padding: 2rem;
    }
    .img-col img {
        max-width: 80%;
        height: auto;
    }
</style>


<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 login-wrapper d-flex">

            {{-- Left: Form --}}
            <div class="col-md-6 p-5 login-form">
                <div class="mb-4">
                    <h4 class="text-success">Sistem Rekomendasi Wisata</h4>
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

                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-login">Login</button>

                    </div>

                    <div class="text-center social-login mt-3">
                        <p class="mb-1">Atau login dengan</p>
                        <a href="#">Facebook</a> |
                        <a href="#">LinkedIn</a> |
                        <a href="#">Google</a>
                    </div>
                </form>
            </div>

            {{-- Right: Image --}}
            <div class="col-md-6 img-col d-flex align-items-center justify-content-center">
                <img src="{{ asset('images/travel-login.png') }}" alt="Travel Illustration">
            </div>
        </div>
    </div>
</div>
@endsection
