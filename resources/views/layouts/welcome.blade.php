@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5 text-center">
        <h1 class="display-5 fw-bold">Selamat Datang di Aplikasi Kampus</h1>
        <p class="col-md-8 fs-4 mx-auto">
            Ini adalah aplikasi sederhana yang dibuat menggunakan Laravel dengan struktur MVC.
            Anda bisa mengelola data Program Studi dan Mahasiswa di sini.
        </p>
        <hr class="my-4">
        <p>Silakan gunakan navigasi di atas untuk menjelajahi aplikasi.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('prodis.index') }}" role="button">
            <i class="fas fa-graduation-cap me-2"></i>Lihat Data Prodi
        </a>
        <a class="btn btn-success btn-lg ms-2" href="{{ route('mahasiswas.index') }}" role="button">
            <i class="fas fa-user-graduate me-2"></i>Lihat Data Mahasiswa
        </a>
    </div>
</div>
@endsection