@extends('layouts.admin')

 @section('title', 'Tambah Kategori')
 @section('page-title', 'Tambah Kategori Baru')

 @section('content')
     <form action="{{ route('admin.categories.store') }}" method="POST">
         @csrf
         @include('admin.categories._form')
     </form>
 @endsection
