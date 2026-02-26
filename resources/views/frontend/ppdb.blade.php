@extends('layouts.frontend')

@php
    $title = 'Layla School - PPDB';
@endphp

@section('content')
    <section class="hero-section text-white text-center py-5">
        <div class="container">
            <h1 class="display-5 fw-bold">PPDB Layla School</h1>
            <p class="lead mb-4">Penerimaan Peserta Didik Baru secara online, cepat, dan mudah.</p>
            <a href="{{ route('front.ppdb.form') }}" class="btn btn-primary btn-lg">Daftar Online PPDB</a>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-file-signature fa-2x text-primary mb-3"></i>
                            <h5 class="card-title">1. Isi Formulir Online</h5>
                            <p class="card-text">Lengkapi data calon siswa dan data orang tua pada formulir PPDB.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-user-check fa-2x text-primary mb-3"></i>
                            <h5 class="card-title">2. Verifikasi Admin</h5>
                            <p class="card-text">Data pendaftaran akan dicek dan di-ACC oleh admin sekolah di dashboard PPDB.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope-open-text fa-2x text-primary mb-3"></i>
                            <h5 class="card-title">3. Hasil Seleksi</h5>
                            <p class="card-text">Setelah diverifikasi, calon siswa dapat mengikuti tahapan PPDB berikutnya.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('front.ppdb.form') }}" class="btn btn-primary btn-lg">Lanjut ke Formulir PPDB</a>
            </div>
        </div>
    </section>
@endsection
