@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <div class="bg-white shadow rounded-4 p-5 text-center">
        <h3 class="fw-bold text-primary mb-4">Hasil Pendaftaran PPDB</h3>

        <p><strong>No. Pendaftaran:</strong> {{ $application->registration_code }}</p>
        <p><strong>Nama:</strong> {{ $application->student_name }}</p>
        <p><strong>Status:</strong>
            @if ($application->status === 'approved')
                <span class="badge bg-success">Diterima</span>
            @elseif ($application->status === 'rejected')
                <span class="badge bg-danger">Ditolak</span>
            @else
                <span class="badge bg-warning text-dark">Menunggu Verifikasi</span>
            @endif
        </p>

        <div class="mt-3">
            <a href="{{ route('front.ppdb') }}" class="btn btn-outline-primary">🔙 Kembali ke PPDB</a>
        </div>
    </div>
</div>
@endsection