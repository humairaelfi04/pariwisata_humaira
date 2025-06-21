@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Admin')

@section('content')
    <p>Selamat datang kembali, {{ Auth::user()->name }}!</p>
    <p class="mt-2 text-gray-600">Ini adalah halaman ringkasan untuk Sistem Informasi Pariwisata Lokal.</p>
    <!-- Nanti kita bisa tambahkan statistik di sini -->
@endsection
