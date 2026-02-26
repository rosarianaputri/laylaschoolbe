@extends('layouts.frontend')

@php
    $title = 'Student Life - Layla School';
    $data = json_decode(\App\Models\SiteSetting::getValue('student_life_page'), true) ?? [];
    $extracurricular = $data['extracurricular'] ?? [];
    $achievements = $data['achievements'] ?? [];
    $gallery = $data['gallery'] ?? [];
@endphp

@section('content')
<section class="py-5 text-center">
    <h1 class="fw-bold">{{ $extracurricular['title'] ?? 'Student Life' }}</h1>
    <p class="text-muted">Explore activities, achievements, and memorable moments at Layla School</p>
</section>

<div class="container my-5">
    {{-- =================== EXTRACURRICULAR =================== --}}
    <h2 class="text-center mb-4 fw-bold">{{ $extracurricular['title'] ?? 'Extracurricular' }}</h2>
    <div class="row g-4 justify-content-center">
        @forelse($extracurricular['items'] ?? [] as $item)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm p-3 bg-body rounded">
                    @if(!empty($item['image_url']))
                        <img src="{{ $item['image_url'] }}" class="card-img-top" alt="{{ $item['title'] ?? '' }}" style="height: 180px; object-fit: cover;">
                    @endif
                    <div class="card-body text-center">
                        <h5 class="card-title fw-semibold">{{ $item['title'] ?? '' }}</h5>
                        <p class="card-text text-muted">{{ $item['text'] ?? '' }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-muted">No extracurricular activities added yet.</p>
        @endforelse
    </div>

    {{-- =================== ACHIEVEMENTS =================== --}}
    <section id="achievements" class="mt-5">
        <h2 class="text-center mb-4 fw-bold">{{ $achievements['title'] ?? 'Achievements & Awards' }}</h2>
        <div class="row g-4 justify-content-center text-center">
            @forelse($achievements['items'] ?? [] as $item)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        @if(!empty($item['image_url']))
                            <img src="{{ $item['image_url'] }}" class="card-img-top" alt="{{ $item['title'] ?? '' }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title fw-semibold">{{ $item['title'] ?? '' }}</h5>
                            <p class="card-text text-muted">{{ $item['text'] ?? '' }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">No achievements have been added yet.</p>
            @endforelse
        </div>
    </section>

    {{-- =================== GALLERY =================== --}}
    <section id="gallery" class="mt-5">
        <h2 class="text-center mb-4 fw-bold">{{ $gallery['title'] ?? 'Gallery' }}</h2>
        <p class="text-center text-muted mb-4">{{ $gallery['text'] ?? '' }}</p>
        @if(!empty($gallery['image_url']))
            <div class="card text-white border-0 shadow-sm mb-4">
                <img src="{{ $gallery['image_url'] }}" class="card-img" alt="Gallery Image" style="height: 400px; object-fit: cover;">
            </div>
        @endif
    </section>
</div>
@endsection
