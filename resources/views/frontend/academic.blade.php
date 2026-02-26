@extends('layouts.frontend')

@php
    $title = 'Academic - Layla School';
@endphp

@section('content')
    @if(isset($academicData) && $academicData)
        <section class="text-center my-5">
            <h1>Academic</h1>
            <p>Curriculum, Teaching Staff, School Calendar</p>
        </section>

        <section id="curriculum" class="container my-5">
            <h2 class="text-center mb-4">{{ $academicData['curriculum']['title'] ?? 'Curriculum' }}</h2>
            <div class="row g-4">
                @foreach(($academicData['curriculum']['items'] ?? []) as $item)
                    <div class="col-md-4">
                        <div class="card h-100 text-center shadow-sm">
                            <img src="{{ $item['image_url'] ?? asset('images/sd.jpg') }}" class="card-img-top" alt="Curriculum">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item['title'] ?? '' }}</h5>
                                <p class="card-text">{{ $item['text'] ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section id="faculty" class="container my-5">
            <p class="text-center mb-4 fw-bold">{{ $academicData['faculty']['title'] ?? 'Teaching Staff' }}</p>
            <div class="row justify-content-center g-4">
                @foreach(($academicData['faculty']['members'] ?? []) as $member)
                    <div class="col-md-4 text-center">
                        <img src="{{ $member['image_url'] ?? asset('images/jhon.jpg') }}" class="faculty-img mb-2" alt="Faculty">
                        <p>{{ $member['name'] ?? '' }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    @elseif(isset($page) && $page && $pageContent)
        {!! $pageContent !!}
    @else
    <section class="text-center my-5">
        <h1>Academic</h1>
        <p>Curriculum, Teaching Staff, School Calendar</p>
    </section>

    <section id="curriculum" class="container my-5">
        <h2 class="text-center mb-4">Curriculum</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 text-center shadow-sm">
                    <img src="{{ asset('images/sd.jpg') }}" class="card-img-top" alt="Elementary School">
                    <div class="card-body">
                        <h5 class="card-title">Elementary</h5>
                        <p class="card-text">Math, Science, English, Arts, PE</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 text-center shadow-sm">
                    <img src="{{ asset('images/smp1.jpeg') }}" class="card-img-top" alt="Middle School">
                    <div class="card-body">
                        <h5 class="card-title">Middle School</h5>
                        <p class="card-text">Math, Science, English, Social Studies, Computer</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 text-center shadow-sm">
                    <img src="{{ asset('images/smk1.jpeg') }}" class="card-img-top" alt="High School">
                    <div class="card-body">
                        <h5 class="card-title">High School</h5>
                        <p class="card-text">Advanced Math, Physics, Chemistry, Literature, Technology</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="faculty" class="container my-5">
        <p class="text-center mb-4 fw-bold">Teaching Staff</p>
        <div class="row justify-content-center g-4">
            <div class="col-md-4 text-center">
                <img src="{{ asset('images/jhon.jpg') }}" class="faculty-img mb-2" alt="Mr. Jhon">
                <p>Mr. Jhon</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{ asset('images/sarah.jpg') }}" class="faculty-img mb-2" alt="Ms. Sarah">
                <p>Ms. Sarah</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{ asset('images/emily.jpg') }}" class="faculty-img mb-2" alt="Mrs. Emily">
                <p>Mrs. Emily</p>
            </div>
        </div>
    </section>
    @endif
@endsection
