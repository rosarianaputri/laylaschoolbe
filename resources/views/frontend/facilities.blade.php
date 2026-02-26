@extends('layouts.frontend')

@php
    $title = 'Facilities - Layla School';
@endphp

@section('content')
    @if(isset($facilitiesData) && $facilitiesData)
        <section class="container my-5 pt-5">
            <h2 class="mb-4">Our Facilities</h2>
            <p class="lead">Layla School provides modern facilities to support both academic and extracurricular learning.</p>

            <div class="row mt-4">
                @for($i = 0; $i < min(3, count($facilitiesData['sections'] ?? [])); $i++)
                    @php $section = $facilitiesData['sections'][$i]; @endphp
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="{{ $section['image_url'] ?? asset('images/perpustakaan.png') }}" class="card-img-top" alt="Facility">
                            <div class="card-body">
                                <h5>{{ $section['title'] ?? '' }}</h5>
                                <p>{{ $section['text'] ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </section>

        <section class="container my-5">
            <div class="row">
                @for($i = 3; $i < min(6, count($facilitiesData['sections'] ?? [])); $i++)
                    @php $section = $facilitiesData['sections'][$i]; @endphp
                    <div class="col-md-4 text-center">
                        <img src="{{ $section['image_url'] ?? asset('images/perpustakaan.jpg') }}" class="img-fluid rounded mb-2" alt="Facility">
                        <h5>{{ $section['title'] ?? '' }}</h5>
                        <p>{{ $section['text'] ?? '' }}</p>
                    </div>
                @endfor
            </div>
        </section>

        @if(isset($facilitiesData['sections'][5]))
            <section class="container my-5">
                <div class="row">
                    @php $section = $facilitiesData['sections'][5]; @endphp
                    <div class="col-md-4 text-center">
                        <img src="{{ $section['image_url'] ?? asset('images/perpustakaan.jpg') }}" class="img-fluid rounded mb-2" alt="Facility">
                        <h5>{{ $section['title'] ?? '' }}</h5>
                        <p>{{ $section['text'] ?? '' }}</p>
                    </div>
                </div>
            </section>
        @endif
    @elseif(isset($page) && $page && $pageContent)
        {!! $pageContent !!}
    @else
    <section class="container my-5 pt-5">
        <h2 class="mb-4">Our Facilities</h2>
        <p class="lead">Layla School provides modern facilities to support both academic and extracurricular learning.</p>

        <div class="row mt-4">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('images/perpustakaan.png') }}" class="card-img-top" alt="Library">
                    <div class="card-body">
                        <p>[Placeholder for Library description]</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('images/laboratorium2.jpg') }}" class="card-img-top" alt="Laboratory">
                    <div class="card-body">
                        <h5>Laboratory</h5>
                        <p>[Placeholder for Laboratory description]</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{ asset('images/sporthall.jpg') }}" class="img-fluid rounded mb-2" alt="Sports Hall">
                <h5>Sports Hall</h5>
                <p>[Placeholder for Sports Hall description]</p>
            </div>
        </div>
    </section>

    <section class="container my-5">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="{{ asset('images/perpustakaan.jpg') }}" class="img-fluid rounded mb-2" alt="Library">
                <h5>Library</h5>
                <p>[Placeholder for Library description]</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{ asset('images/laboratorium2.jpg') }}" class="img-fluid rounded mb-2" alt="Laboratory">
                <h5>Laboratory</h5>
                <p>[Placeholder for Laboratory description]</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{ asset('images/sporthall.jpg') }}" class="img-fluid rounded mb-2" alt="Sports Hall">
                <h5>Sports Hall</h5>
                <p>[Placeholder for Sports Hall description]</p>
            </div>
        </div>
    </section>

    <section class="container my-5">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="{{ asset('images/perpustakaan.jpg') }}" class="img-fluid rounded mb-2" alt="Library">
                <h5>Library</h5>
                <p>[Placeholder for Library description]</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{ asset('images/laboratorium2.jpg') }}" class="img-fluid rounded mb-2" alt="Laboratory">
                <h5>Laboratory</h5>
                <p>[Placeholder for Laboratory description]</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{ asset('images/sporthall.jpg') }}" class="img-fluid rounded mb-2" alt="Sports Hall">
                <h5>Sports Hall</h5>
                <p>[Placeholder for Sports Hall description]</p>
            </div>
        </div>
    </section>
    @endif
@endsection
