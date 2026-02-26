@extends('layouts.admin')

@php
    $title = 'LaylaSchool || Tambah PPDB';
    $pageTitle = 'Tambah Pendaftar PPDB';
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Tambah Data Pendaftar</h5>
                <a href="{{ route('admin.ppdb.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
            </div>

            <form method="POST" action="{{ route('admin.ppdb.store') }}">
                @csrf
                @include('admin.ppdb.form')

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.ppdb.index') }}" class="btn btn-light">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
