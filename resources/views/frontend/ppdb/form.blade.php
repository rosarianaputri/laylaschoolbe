@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <div class="bg-white shadow rounded-4 p-5">
        <h3 class="fw-bold text-primary mb-4 text-center">Formulir Pendaftaran PPDB</h3>

        <form action="{{ route('front.ppdb.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" name="student_name" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Jenis Kelamin</label>
                    <select name="gender" class="form-control" required>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Tempat Lahir</label>
                    <input type="text" name="birth_place" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Tanggal Lahir</label>
                    <input type="date" name="birth_date" class="form-control" required>
                </div>
                <div class="col-md-8">
                    <label class="form-label fw-semibold">Sekolah Asal</label>
                    <input type="text" name="previous_school" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nama Orang Tua</label>
                    <input type="text" name="parent_name" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nomor HP</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="col-md-12">
                    <label class="form-label fw-semibold">Alamat</label>
                    <textarea name="address" class="form-control" rows="3" required></textarea>
                </div>
                <div class="col-md-12">
                    <label class="form-label fw-semibold">Catatan (opsional)</label>
                    <textarea name="notes" class="form-control" rows="2"></textarea>
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill">Kirim Pendaftaran</button>
            </div>
        </form>
    </div>
</div>
@endsection