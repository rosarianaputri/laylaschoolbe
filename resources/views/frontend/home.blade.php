@extends('layouts.frontend')

@php
    $title = 'Layla School - Home';
@endphp

@section('content')
    @if(isset($homeData) && $homeData)
        <section class="hero-section position-relative text-center text-white">
            <div class="hero-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="hero-text">
                            <h1 class="display-4 fw-bold mb-4">{{ $homeData['hero']['title'] ?? 'Welcome to Layla School' }}</h1>
                            <p class="lead mb-4">{{ $homeData['hero']['subtitle'] ?? 'A school that inspires learning and kindness' }}</p>
                            <a href="{{ $homeData['hero']['button_link'] ?? route('front.about') }}" class="btn btn-primary btn-lg px-5 py-3">{{ $homeData['hero']['button_text'] ?? 'Learn More' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="principal-message" class="py-5 bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-center mb-4 mb-lg-0">
                        <div class="principal-image-container">
                            <img src="{{ $homeData['principal']['image_url'] ?? asset('images/kepalasekolah.png') }}" alt="Principal" class="img-fluid rounded-circle shadow">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <h2 class="section-title">{{ $homeData['principal']['title'] ?? "Principal's Message" }}</h2>
                        <div class="message-content">
                            <p class="lead mb-3">{{ $homeData['principal']['paragraph_1'] ?? '' }}</p>
                            <p class="mb-4">{{ $homeData['principal']['paragraph_2'] ?? '' }}</p>
                            <h6 class="text-end mt-4 fw-bold text-primary">{{ $homeData['principal']['signature'] ?? '— Principal of Layla School' }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>
                    <section id="home-academic" class="py-5">
            <div class="container">
                <h2 class="section-title text-center">{{ $homeData['academic']['title'] ?? 'Academic Excellence' }}</h2>
                <p class="lead text-center mx-auto mb-5" style="max-width:700px;">
                    {{ $homeData['academic']['description'] ?? '' }}
                </p>

                <div class="row g-4">
                    @foreach(($homeData['academic']['items'] ?? []) as $item)
                        <div class="col-md-4">
                            <div class="feature-card text-center p-4">
                                <div class="feature-icon">
                                    <i class="{{ $item['icon'] ?? 'fas fa-book-open' }}"></i>
                                </div>
                                <h5 class="mt-3 mb-3">{{ $item['title'] ?? '' }}</h5>
                                <p>{{ $item['text'] ?? '' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="news" class="py-5 bg-light">
            <div class="container">
                <h2 class="section-title text-center">{{ $homeData['news']['title'] ?? 'Latest News & Events' }}</h2>
                <div class="row g-4 mt-4">
                    @foreach(($homeData['news']['items'] ?? []) as $item)
                        <div class="col-md-4">
                            <div class="card h-100">
                                <img src="{{ $item['image_url'] ?? asset('images/kelulusan.png') }}" class="card-img-top" alt="News">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item['title'] ?? '' }}</h5>
                                    <p class="card-text">{{ $item['text'] ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-4">
                    <a href="{{ $homeData['news']['button_link'] ?? route('front.information') }}" class="btn btn-primary">{{ $homeData['news']['button_text'] ?? 'Learn More' }}</a>
                </div>
            </div>
        </section>
    @elseif(isset($page) && $page && $pageContent)
        {!! $pageContent !!}
    @else
    <section class="hero-section position-relative text-center text-white">
        <img src="{{ asset('images/home-hero.jpg') }}" alt="Hero Image" class="img-fluid w-100 hero-img">
        <div class="hero-overlay"></div>
        <div class="hero-text">
            <h1>Welcome to Layla School</h1>
            <p>A school that inspires learning and kindness</p>
            <a href="{{ route('front.about') }}" class="btn btn-light mt-3">Learn More</a>
        </div>
    </section>

    <section id="principal-message" class="section-container">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 text-center mb-4 mb-md-0">
                    <img src="{{ asset('images/kepalasekolah.png') }}" alt="Principal" class="principal-photo">
                </div>

                <div class="col-md-8">
                    <h2 class="mb-3">Principal’s Message</h2>
                    <p class="principal-text">
                        Welcome to Layla School — a place where learning, creativity, and kindness grow together.
                        Every child has unique potential, and our mission is to help them discover and develop it
                        through meaningful education and supportive guidance.
                    </p>
                    <p class="principal-text">
                        We believe that education is not only about knowledge, but also about character, respect,
                        and compassion. Together, we prepare our students to face the future with confidence, wisdom, and heart.
                    </p>
                    <h6 class="text-end mt-4">— Principal of Layla School</h6>
                </div>
            </div>
        </div>
    </section>

    <section id="home-academic" class="section-container text-center">
        <h2>Academic Excellence</h2>
        <p class="mx-auto" style="max-width:700px;">
            At Layla School, our academic program focuses on a balanced curriculum,
            supported by experienced teachers and a well-structured school calendar
            to ensure every student reaches their full potential.
        </p>

        <div class="row mt-4">
            <div class="col-md-4 mb-3">
                <i class="fas fa-book-open fa-3x mb-3" style="color:#6c5ce7;"></i>
                <h5>Comprehensive Curriculum</h5>
                <p>Structured lessons that nurture creativity and understanding.</p>
            </div>
            <div class="col-md-4 mb-3">
                <i class="fas fa-user-graduate fa-3x mb-3" style="color:#6c5ce7;"></i>
                <h5>Qualified Teachers</h5>
                <p>Our teachers are passionate about guiding students to excellence.</p>
            </div>
            <div class="col-md-4 mb-3">
                <i class="fas fa-calendar-days fa-3x mb-3" style="color:#6c5ce7;"></i>
                <h5>Organized Calendar</h5>
                <p>Academic year filled with engaging lessons and school activities.</p>
            </div>
        </div>
    </section>

    <section class="section-container text-center" id="news">
        <h2>Latest News & Events</h2>
        <div class="row mt-2">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ asset('images/kelulusan.png') }}" class="card-img-top" alt="Science Fair">
                    <div class="card-body">
                        <h5 class="card-title">Graduation Ceremony 2026</h5>
                        <p class="card-text">Layla School celebrated the success of its Class of 2026 with joy and pride. Students in navy gowns tossed their caps high, marking a new chapter filled with dreams and achievements.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ asset('images/tanaman.png') }}" class="card-img-top" alt="Sports Day">
                    <div class="card-body">
                        <h5 class="card-title">Green School Project</h5>
                        <p class="card-text">Layla School students and teachers joined hands to plant trees around the school garden. This project promotes environmental awareness, teamwork, and real action to create a greener future.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ asset('images/sains.jpeg') }}" class="card-img-top" alt="Art Exhibition">
                    <div class="card-body">
                        <h5 class="card-title">Science Fair & Innovation Day</h5>
                        <p class="card-text">Students proudly presented their science projects in batik attire, showcasing creativity and teamwork through hands-on experiments that spark innovation and critical thinking.</p>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('front.information') }}" class="btn btn-dark mt-3">Learn More</a>
    </section>
    @endif
@endsection
