@extends('layouts.admin')

@php
    $title = 'LaylaSchool || Edit PPDB';
    $pageTitle = 'Edit Pendaftar PPDB';
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Edit Data Pendaftar</h5>
                <a href="{{ route('admin.ppdb.show', $application) }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
            </div>

            <form method="POST" action="{{ route('admin.ppdb.update', $application) }}">
                @csrf
                @method('PUT')
                @include('admin.ppdb.form', ['application' => $application])

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.ppdb.show', $application) }}" class="btn btn-light">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
