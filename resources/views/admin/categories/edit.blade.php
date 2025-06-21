@extends('layouts.admin')

 @section('title', 'Edit Kategori')
 @section('page-title', 'Edit Kategori')

 @section('content')
     <form action="{{ route('admin.categories.update', $category) }}" method="POST">
         @csrf
         @method('PUT')
         @include('admin.categories._form')
     </form>
 @endsection
