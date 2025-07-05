@extends('layouts.frontend')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
        font-family: 'Inter', 'Poppins', sans-serif;
    }
    .register-card {
        background: rgba(255,255,255,0.88);
        border-radius: 24px;
        box-shadow: 0 10px 32px 0 rgba(30,64,175,0.10), 0 2px 4px 0 rgba(30,64,175,0.08);
        overflow: hidden;
        backdrop-filter: blur(12px);
        padding: 2.5rem 2rem 2rem 2rem;
        margin-top: 2rem;
        animation: fadeInUp 0.8s;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(40px);}
        to { opacity: 1; transform: translateY(0);}
    }
    .register-card h4 {
        font-weight: 800;
        color: #1e40af;
        letter-spacing: 1px;
        margin-bottom: 0.5rem;
    }
    .input-group {
        position: relative;
    }
    .input-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #60a5fa;
        font-size: 1.1rem;
    }
    .form-control {
        border-radius: 12px;
        border: 1.5px solid #dbeafe;
        background: #f8fafc;
        font-size: 15px;
        padding-left: 2.5rem;
        transition: border-color 0.2s;
    }
    .form-control:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 2px #dbeafe;
        background: #fff;
    }
    .form-label {
        font-size: 14px;
        font-weight: 600;
        color: #1e40af;
        margin-bottom: 0.25rem;
    }
    .btn-register {
        background: linear-gradient(90deg, #1e40af 0%, #3b82f6 100%);
        color: #fff;
        font-weight: 700;
        border-radius: 12px;
        border: none;
        padding: 0.75rem 0;
        font-size: 1.1rem;
        letter-spacing: 1px;
        box-shadow: 0 4px 16px 0 rgba(30,64,175,0.10);
        transition: background 0.2s, transform 0.2s;
        text-transform: uppercase;
        margin-top: 0.5rem;
    }
    .btn-register:hover {
        background: linear-gradient(90deg, #2563eb 0%, #1e40af 100%);
        transform: translateY(-2px) scale(1.03);
    }
    .text-link {
        color: #1e40af;
        font-weight: 600;
        text-decoration: none;
        transition: color 0.2s;
    }
    .text-link:hover {
        color: #3b82f6;
        text-decoration: underline;
    }
    @media (max-width: 767px) {
        .register-card {
            padding: 1.5rem 0.5rem 1.5rem 0.5rem;
        }
    }
</style>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="register-card shadow-sm rounded-4" data-aos="fade-up">
                <div class="card-body">
                    <h4 class="mb-4 text-center"><i class="fas fa-user-plus me-2"></i>Daftar Akun Baru</h4>
                    <form method="POST" action="{{ route('register.store') }}">
                        @csrf

                        <div class="mb-3 input-group">
                            <span class="input-icon"><i class="fas fa-user"></i></span>
                            <input type="text" name="name" class="form-control" required value="{{ old('name') }}" placeholder="Nama Lengkap">
                            <label class="visually-hidden">Nama</label>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3 input-group">
                            <span class="input-icon"><i class="fas fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control" required value="{{ old('email') }}" placeholder="Email">
                            <label class="visually-hidden">Email</label>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3 input-group">
                            <span class="input-icon"><i class="fas fa-lock"></i></span>
                            <input type="password" name="password" class="form-control" required placeholder="Password">
                            <label class="visually-hidden">Password</label>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3 input-group">
                            <span class="input-icon"><i class="fas fa-lock"></i></span>
                            <input type="password" name="password_confirmation" class="form-control" required placeholder="Konfirmasi Password">
                            <label class="visually-hidden">Konfirmasi Password</label>
                        </div>

                        <button type="submit" class="btn btn-register w-100">
                            <i class="fas fa-user-plus me-2"></i>Daftar
                        </button>
                    </form>
                    <div class="text-center mt-3">
                        <small>Sudah punya akun? <a href="{{ route('login') }}" class="text-link">Login di sini</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection