@extends('layouts.admin')

@php
    $title = 'LaylaSchool || Settings - Logo';
    $pageTitle = 'Settings - Logo';
@endphp

@section('content')
<div class="container py-5">
    <div class="card shadow-sm border-0 p-4" style="border-radius: 15px;">
        <h4 class="fw-bold text-center mb-4" style="color:#4A47A3;">Ubah Logo Sekolah</h4>

        @if (session('status') === 'logo_updated')
            <div class="alert alert-success text-center rounded-pill py-2 px-4">Logo berhasil diperbarui ✅</div>
        @endif

        <!-- Flex container logo -->
        <div class="d-flex flex-wrap justify-content-center align-items-center gap-4 mb-4">
            <!-- Logo Saat Ini -->
            <div class="text-center" style="min-width:230px;">
                <p class="text-muted mb-2">Logo Saat Ini</p>
                <div class="p-3 rounded-4 border bg-light d-flex justify-content-center align-items-center" 
                     style="height:150px; width:200px; overflow:hidden;">
                    <img src="{{ $siteLogoUrl }}" alt="Logo Sekarang" 
                         style="max-height:100%; max-width:100%; object-fit:contain;">
                </div>
            </div>

            <!-- Panah tengah -->
            <div class="text-center align-self-center">
                <i class="bi bi-arrow-right fs-3 text-secondary"></i>
            </div>

            <!-- Preview Logo Baru -->
            <div class="text-center" id="previewContainer" style="min-width:230px; display:none;">
                <p class="text-muted mb-2">Preview Logo Baru</p>
                <div class="p-3 rounded-4 border bg-light d-flex justify-content-center align-items-center"
                     style="height:150px; width:200px; overflow:hidden;">
                    <img id="previewLogo" src="#" alt="Preview Logo"
                         style="max-height:100%; max-width:100%; object-fit:contain;">
                </div>
            </div>
        </div>

        <!-- Upload Form -->
        <form method="POST" action="{{ route('admin.settings.logo.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="form-label fw-semibold text-secondary">Pilih Logo Baru</label>
                <input type="file" id="logoInput" name="logo" class="form-control shadow-sm"
                       accept="image/*" required>
                @error('logo')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-5 py-2 fw-semibold"
                        style="background: linear-gradient(135deg, #667eea, #764ba2); border:none;">
                    Simpan Logo
                </button>
            </div>

            <p class="text-muted text-center mt-4 mb-0" style="font-size:14px;">
                Disarankan: PNG / SVG dengan background transparan 💎
            </p>
        </form>
    </div>
</div>

<script>
    document.getElementById('logoInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const previewContainer = document.getElementById('previewContainer');
        const previewLogo = document.getElementById('previewLogo');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                previewLogo.src = event.target.result;
                previewContainer.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            previewContainer.style.display = 'none';
        }
    });
</script>
@endsection
