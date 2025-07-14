@extends('layouts.tamplate')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #F5F5DC 0%, #DEB887 100%);
        font-family: 'Inter', 'Poppins', sans-serif;
    }

    .login-wrapper {
        background: rgba(255,255,255,0.85);
        border-radius: 24px;
        box-shadow: 0 10px 32px 0 rgba(139,69,19,0.10), 0 2px 4px 0 rgba(139,69,19,0.08);
        overflow: hidden;
        min-height: 520px;
        display: flex;
        align-items: stretch;
        backdrop-filter: blur(12px);
    }

    .login-form {
        padding: 2.5rem 2rem;
        flex: 1 1 0%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .login-form h4 {
        font-weight: 800;
        color: #8B4513;
        letter-spacing: 1px;
        margin-bottom: 0.5rem;
    }

    .login-form label {
        font-size: 14px;
        font-weight: 600;
        color: #8B4513;
        margin-bottom: 0.25rem;
    }

    .form-control {
        border-radius: 12px;
        border: 1.5px solid #DEB887;
        background: #F5F5DC;
        font-size: 15px;
        padding-left: 2.5rem;
        transition: border-color 0.2s;
    }

    .form-control:focus {
        border-color: #A0522D;
        box-shadow: 0 0 0 2px #DEB887;
        background: #fff;
    }

    .input-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #CD853F;
        font-size: 1.1rem;
    }

    .input-group {
        position: relative;
    }

    .btn-login {
        background: linear-gradient(90deg, #8B4513 0%, #A0522D 100%);
        color: #fff;
        font-weight: 700;
        border-radius: 12px;
        border: none;
        padding: 0.75rem 0;
        font-size: 1.1rem;
        letter-spacing: 1px;
        box-shadow: 0 4px 16px 0 rgba(139,69,19,0.10);
        transition: background 0.2s, transform 0.2s;
        text-transform: uppercase;
    }

    .btn-login:hover {
        background: linear-gradient(90deg, #A0522D 0%, #8B4513 100%);
        transform: translateY(-2px) scale(1.03);
    }

    .social-login a {
        text-decoration: none;
        margin: 0 8px;
        color: #8B4513;
        font-weight: 600;
        font-size: 1.1rem;
        transition: color 0.2s;
    }

    .social-login a:hover {
        color: #A0522D;
        text-decoration: underline;
    }

    .img-col {
        background: linear-gradient(135deg, #8B4513 60%, #A0522D 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        flex: 1 1 0%;
        min-width: 260px;
    }

    .img-col img {
        max-width: 90%;
        height: auto;
        filter: drop-shadow(0 8px 32px #8B451333);
        border-radius: 18px;
        animation: floating 3s ease-in-out infinite;
    }

    @keyframes floating {
        0%, 100% { transform: translateY(0px);}
        50% { transform: translateY(-12px);}
    }

    @media (max-width: 991px) {
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
            <div class="login-form col-md-6">
                <div class="mb-4 text-center">
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
                    <div class="mb-3 input-group">
                        <span class="input-icon"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="email" id="email" class="form-control" required placeholder="you@example.com" autocomplete="username">
                        <label for="email" class="visually-hidden">Email</label>
                    </div>

                    <div class="mb-3 input-group">
                        <span class="input-icon"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" id="password" class="form-control" required placeholder="********" autocomplete="current-password">
                        <label for="password" class="visually-hidden">Kata Sandi</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <input type="checkbox" id="remember" class="form-check-input" name="remember">
                            <label for="remember" class="form-check-label" style="color:#8B4513;">Ingat saya</label>
                        </div>
                        <a href="#" class="text-decoration-none" style="color:#A0522D;">Lupa password?</a>
                    </div>

                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-login">Login</button>
                    </div>

                    <div class="text-center mt-2">
                        <span class="text-muted">Belum punya akun?</span>
                        <a href="{{ route('register') }}" class="fw-semibold text-decoration-none" style="color: #8B4513;">Daftar</a>
                    </div>

                    <div class="text-center social-login mt-4">
                        <p class="mb-1 text-muted">Atau login dengan</p>
                        <a href="#"><i class="fab fa-facebook-f me-1"></i>Facebook</a> |
                        <a href="#"><i class="fab fa-linkedin-in me-1"></i>LinkedIn</a> |
                        <a href="#"><i class="fab fa-google me-1"></i>Google</a>
                    </div>
                </form>
            </div>
            <div class="img-col col-md-6">
                <img src="{{ asset('images/logo.jpg') }}" alt="Travel Illustration">
            </div>
        </div>
    </div>
</div>
@endsection
