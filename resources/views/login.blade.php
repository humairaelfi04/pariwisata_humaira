@extends('layouts.tamplate')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <h1>Login Admin Pariwisata</h1>

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('email') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="post" action="/login">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" required>
                    <div id="emailHelp" class="form-text">Email Anda tidak akan dibagikan ke siapa pun.</div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Kata Sandi</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Ingat saya</label>
                </div>

                <button type="submit" class="btn btn-success">Login</button>
            </form>
        </div>
    </div>
@endsection
