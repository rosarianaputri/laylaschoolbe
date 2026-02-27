@extends('layouts.frontend')

@php
    $title = 'Layla School - PPDB';
@endphp

@section('content')
    {{-- HERO FULLSCREEN --}}
    <section class="hero-section position-relative d-flex align-items-center justify-content-center text-center text-white"
        style="
            background-image: url('https://is3.cloudhost.id/spmbjabar/images/banner-ppdb-2024-Recovered.jpg');
            background-size: cover;
            background-position: center;
            height: 80vh;
        ">
        {{-- Overlay gelap transparan --}}
        <div class="position-absolute top-0 start-0 w-100 h-100"
             style="background: rgba(0, 0, 0, 0.5);"></div>

        <div class="container position-relative" style="z-index: 2;">
            <h1 class="display-4 fw-bold mb-3">PPDB 2026 - Layla School</h1>
            <p class="lead mb-4">Penerimaan Peserta Didik Baru yang mudah, cepat, dan transparan.</p>
            <a href="{{ route('front.ppdb.form') }}" class="btn btn-primary btn-lg px-5">Daftar Sekarang</a>
        </div>
    </section>

    {{-- INFORMASI HASIL SELEKSI --}}
    <section class="py-5 bg-light border-top border-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-white shadow-sm rounded-3 p-4">
                    <h5 class="fw-bold text-center mb-3 text-primary">Informasi Hasil Seleksi</h5>
                    
                    {{-- FORM PENCARIAN NOMOR PENDAFTARAN --}}
                    <form action="{{ route('front.ppdb.search') }}" method="GET" class="input-group input-group-lg">
                        <input type="text" 
                               name="no_pendaftaran" 
                               class="form-control" 
                               placeholder="Masukkan Nomor Pendaftaran..." 
                               required>
                        <button class="btn btn-success px-4" type="submit">Cari</button>
                    </form>

                    {{-- Tampilkan pesan error jika tidak ditemukan --}}
                    @if (session('error'))
                        <div class="alert alert-danger mt-3 mb-0 text-center">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- Tampilkan pesan sukses (misal baru daftar) --}}
                    @if (session('success'))
                        <div class="alert alert-success mt-3 mb-0 text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>

{{-- MENU 3 KOTAK --}}
<section class="py-5" style="background-color: #f0f7ff;">
    <div class="container">
        <div class="row g-4 text-center">
            {{-- Jadwal PPDB --}}
            <div class="col-md-4">
                <a href="#jadwal" class="text-decoration-none">
                    <div class="card border-0 rounded-4 shadow-sm h-100" style="background-color: #d7e8ff;">
                        <div class="card-body py-5">
                            <img src="https://cdn-icons-png.flaticon.com/512/3022/3022252.png"
                                 alt="Jadwal PPDB" width="90" class="mb-4">
                            <h4 class="fw-bold text-primary">JADWAL PPDB</h4>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Jalur PPDB --}}
            <div class="col-md-4">
                <a href="#jalur" class="text-decoration-none">
                    <div class="card border-0 rounded-4 shadow-sm h-100" style="background-color: #d7e8ff;">
                        <div class="card-body py-5">
                            <img src="https://cdn-icons-png.flaticon.com/512/3208/3208707.png"
                                 alt="Jalur PPDB" width="90" class="mb-4">
                            <h4 class="fw-bold text-primary">JALUR PPDB</h4>
                        </div>
                    </div>
                </a>
            </div>

            {{-- FAQ --}}
            <div class="col-md-4">
                <a href="#faq" class="text-decoration-none">
                    <div class="card border-0 rounded-4 shadow-sm h-100" style="background-color: #d7e8ff;">
                        <div class="card-body py-5">
                            <img src="https://cdn-icons-png.flaticon.com/512/545/545674.png"
                                 alt="FAQ" width="90" class="mb-4">
                            <h4 class="fw-bold text-primary">FAQ</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- BAGIAN JADWAL SPMB --}}
<section id="jadwal" class="py-5 bg-white">
    <div class="container">
        <h2 class="fw-bold text-primary text-center mb-4">Jadwal SPMB</h2>

        {{-- Tahap 1 --}}
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <h4 class="fw-bold text-primary mb-3">SPMB Tahap 1</h4>
                <p class="text-muted mb-4">Proses pendaftaran SPMB SMA, SMK, SLB.</p>

                <div class="row g-4">
                    {{-- Jalur & Kuota SMA --}}
                    <div class="col-md-4">
                        <div class="p-3 rounded-3" style="background-color: #e8f0fe;">
                            <h6 class="fw-bold text-primary mb-2">Jalur & Kuota SMA Tahap 1</h6>
                            <ul class="list-unstyled small mb-0">
                                <li>🏠 Domisili: <b>35%</b></li>
                                <li>🎓 Afirmasi: <b>30%</b></li>
                                <li>🔄 Mutasi: <b>5%</b></li>
                            </ul>
                        </div>
                    </div>

                    {{-- Jalur & Kuota SMK --}}
                    <div class="col-md-4">
                        <div class="p-3 rounded-3" style="background-color: #e8f0fe;">
                            <h6 class="fw-bold text-primary mb-2">Jalur & Kuota SMK Tahap 1</h6>
                            <ul class="list-unstyled small mb-0">
                                <li>📍 Domisili Terdekat: <b>10%</b></li>
                                <li>🎓 Afirmasi: <b>30%</b></li>
                                <li>🔄 Mutasi: <b>5%</b></li>
                                <li>🏭 Persiapan Kelas Industri: <b>20%</b></li>
                            </ul>
                        </div>
                    </div>

                    {{-- Jalur & Kuota SLB --}}
                    <div class="col-md-4">
                        <div class="p-3 rounded-3" style="background-color: #e8f0fe;">
                            <h6 class="fw-bold text-primary mb-2">Jalur & Kuota SLB Tahap 1</h6>
                            <p class="small mb-0">Tidak ada jalur, mempertimbangkan kesesuaian jenis kebutuhan khusus calon murid (berdasarkan hasil diagnosa tim ahli/psikolog/medis/Resource Centre) dengan SLB yang dituju.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Jadwal Tahap 1 --}}
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h4 class="fw-bold text-primary mb-4">Jadwal SPMB Tahap 1</h4>

                <div class="row row-cols-1 row-cols-md-2 g-3">
                    <div class="col">
                        <div class="border rounded-3 p-3 bg-light">
                            <h6 class="fw-bold">1. Pendaftaran & Verifikasi Dokumen</h6>
                            <p class="small mb-1">📅 10 Juni 2025 – 16 Juni 2025</p>
                            <p class="small mb-1">⏰ 08:00 - 20:00</p>
                            <span class="badge bg-success">Selesai</span>
                        </div>
                    </div>

                    <div class="col">
                        <div class="border rounded-3 p-3 bg-light">
                            <h6 class="fw-bold">2. Masa Sanggah Verifikasi</h6>
                            <p class="small mb-1">📅 10 Juni 2025 – 17 Juni 2025</p>
                            <span class="badge bg-success">Selesai</span>
                        </div>
                    </div>

                    <div class="col">
                        <div class="border rounded-3 p-3 bg-light">
                            <h6 class="fw-bold">3. Rapat Dewan Guru Penetapan Hasil</h6>
                            <p class="small mb-1">📅 18 Juni 2025</p>
                            <span class="badge bg-success">Selesai</span>
                        </div>
                    </div>

                    <div class="col">
                        <div class="border rounded-3 p-3 bg-light">
                            <h6 class="fw-bold">4. Koordinasi Satuan Pendidikan</h6>
                            <p class="small mb-1">📅 18 Juni 2025</p>
                            <span class="badge bg-success">Selesai</span>
                        </div>
                    </div>

                    <div class="col">
                        <div class="border rounded-3 p-3 bg-light">
                            <h6 class="fw-bold">5. Rapat Koordinasi Penyaluran KETM</h6>
                            <p class="small mb-1">📅 18 Juni 2025</p>
                            <span class="badge bg-success">Selesai</span>
                        </div>
                    </div>

                    <div class="col">
                        <div class="border rounded-3 p-3 bg-light">
                            <h6 class="fw-bold">6. Pengumuman Hasil SPMB Tahap 1</h6>
                            <p class="small mb-1">📅 19 Juni 2025</p>
                            <p class="small mb-1">⏰ 09:00 - Selesai</p>
                            <span class="badge bg-success">Selesai</span>
                        </div>
                    </div>

                    <div class="col">
                        <div class="border rounded-3 p-3 bg-light">
                            <h6 class="fw-bold">7. Daftar Ulang SPMB Tahap 1</h6>
                            <p class="small mb-1">📅 20 Juni 2025 – 23 Juni 2025</p>
                            <p class="small mb-1">⏰ 08:00 - 14:00</p>
                            <span class="badge bg-success">Selesai</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- BAGIAN JALUR / INFOGRAFIS LAINNYA --}}
<section id="jalur" class="py-5 bg-light">
    <div class="container">
        <h2 class="fw-bold text-primary text-center mb-3">Infografis Lainnya</h2>
        <div class="text-center mb-5">
            <span class="badge bg-danger px-3 py-2 rounded-pill">Baru</span>
        </div>

        <div class="row g-4 justify-content-center">
            {{-- Card 1 --}}
            <div class="col-md-4 col-sm-6">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                    <img src="https://api-webdisdik.jabarprov.go.id/api-ppdb/storage/gallery/img/image-1750733376234.jpeg"
                         alt="Infografis Jalur PPDB"
                         class="img-fluid w-100" style="height: 220px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h6 class="fw-bold text-primary mb-1">Jalur & Kuota PPDB SMA</h6>
                        <p class="text-muted small mb-0">Informasi jalur pendaftaran dan kuota siswa SMA.</p>
                    </div>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="col-md-4 col-sm-6">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                    <img src="https://api-webdisdik.jabarprov.go.id/api-ppdb/storage/gallery/img/image-1750733345312.jpeg"
                         alt="Infografis Jalur SMK"
                         class="img-fluid w-100" style="height: 220px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h6 class="fw-bold text-primary mb-1">Jalur & Kuota PPDB SMK</h6>
                        <p class="text-muted small mb-0">Informasi jalur pendaftaran dan kuota siswa SMK.</p>
                    </div>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="col-md-4 col-sm-6">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                    <img src="https://api-webdisdik.jabarprov.go.id/api-ppdb/storage/gallery/img/image-1750733322989.jpeg"
                         alt="Infografis SLB"
                         class="img-fluid w-100" style="height: 220px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h6 class="fw-bold text-primary mb-1">Jalur & Kuota PPDB SLB</h6>
                        <p class="text-muted small mb-0">Informasi jalur penerimaan siswa berkebutuhan khusus.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- BAGIAN FAQ INTERAKTIF --}}
<section id="faq" class="py-5" style="background-color: #f0f7ff;">
    <div class="container">
        <h2 class="fw-bold text-primary text-center mb-4">Frequently Asked Question</h2>

        {{-- Kolom Pencarian --}}
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8">
                <div class="input-group input-group-lg shadow-sm">
                    <input type="text" class="form-control" placeholder="Cari Pertanyaan...">
                    <button class="btn btn-primary px-4">Cari</button>
                </div>
            </div>
        </div>

        <div class="row g-4">
            {{-- Kategori --}}
            <div class="col-lg-5">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                    <h5 class="fw-bold text-primary mb-3 text-center">Kategori FAQ</h5>
                    <div class="d-grid gap-3">
                        <button class="btn btn-outline-primary text-start fw-semibold py-3 active">📘 Informasi SPMB Jabar 2025</button>
                        <button class="btn btn-outline-primary text-start fw-semibold py-3">📄 SOP dan Juknis SPMB</button>
                        <button class="btn btn-outline-primary text-start fw-semibold py-3">🧾 Teknis Pendaftaran SPMB</button>
                        <button class="btn btn-outline-primary text-start fw-semibold py-3">👩‍🎓 Persyaratan Calon Peserta</button>
                        <button class="btn btn-outline-primary text-start fw-semibold py-3">📑 Persyaratan Khusus</button>
                    </div>
                </div>
            </div>

            {{-- FAQ Accordion --}}
            <div class="col-lg-7">
                <div class="accordion bg-white rounded-4 shadow-sm p-4" id="faqAccordion">
                    <h5 class="fw-bold text-primary mb-3">Informasi SPMB Jabar 2025</h5>

                    {{-- Pertanyaan 1 --}}
                    <div class="accordion-item border-0 border-bottom mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold text-primary" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq1">
                                Kapan Pelaksanaan SPMB SMA, SMK, SLB 2025?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                <ul class="mb-0">
                                    <li>Tahap 1 dilaksanakan tanggal <b>10–16 Juni 2025</b></li>
                                    <li>Tahap 2 dilaksanakan tanggal <b>24 Juni – 1 Juli 2025</b></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- Pertanyaan 2 --}}
                    <div class="accordion-item border-0 border-bottom mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq2">
                                Bagaimana cara akses web SPMB?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Kamu dapat mengakses website SPMB melalui <b>https://spmb.jabarprov.go.id</b> menggunakan perangkat yang terhubung internet.
                            </div>
                        </div>
                    </div>

                    {{-- Pertanyaan 3 --}}
                    <div class="accordion-item border-0 border-bottom mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq3">
                                Apa saja persyaratan SPMB?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Calon peserta wajib memenuhi persyaratan umum dan khusus sesuai ketentuan dari Disdik Jabar.
                            </div>
                        </div>
                    </div>

                    {{-- Pertanyaan 4 --}}
                    <div class="accordion-item border-0 border-bottom mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq4">
                                Apa saja Dokumen Persyaratan Umum?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                - Ijazah atau Surat Keterangan Lulus<br>
                                - Akta Kelahiran<br>
                                - Kartu Keluarga<br>
                                - KTP Orang Tua/Wali
                            </div>
                        </div>
                    </div>

                    {{-- Pertanyaan 5 --}}
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq5">
                                Apa saja Dokumen Persyaratan Khusus?
                            </button>
                        </h2>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Dokumen tambahan seperti surat keterangan prestasi, surat pindah, atau dokumen afirmasi sesuai jalur yang dipilih.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    {{-- STYLE TAMBAHAN --}}
    <style>
        .card:hover {
            transform: translateY(-5px);
            transition: 0.3s ease;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .btn-success {
            background-color: #00b050;
            border: none;
        }

        .btn-success:hover {
            background-color: #00913f;
        }
    </style>
@endsection