@extends('layouts.frontend')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <article>
                <h1 class="mb-4">New Library Opening</h1>
                <div class="mb-4">
                    <img src="{{ asset('images/news/liblary.jpg') }}" class="img-fluid rounded" alt="Library Opening">
                </div>
                <div class="meta mb-3">
                    <small class="text-muted">
                        <i class="fas fa-calendar"></i> January 15, 2026 | 
                        <i class="fas fa-user"></i> Admin
                    </small>
                </div>
                <div class="content">
                    <p class="lead">The school inaugurated a new modern library with state-of-the-art facilities.</p>
                    <p>Layla School is proud to announce the grand opening of our new modern library facility. This state-of-the-art learning space represents our commitment to providing students with the best educational resources and environment for academic excellence.</p>
                    
                    <h3>Features of the New Library</h3>
                    <ul>
                        <li>Over 10,000 books and digital resources</li>
                        <li>Modern study spaces with comfortable seating</li>
                        <li>Computer lab with high-speed internet</li>
                        <li>Quiet reading areas and collaborative spaces</li>
                        <li>Digital media center for multimedia learning</li>
                    </ul>
                    
                    <h3>Opening Ceremony</h3>
                    <p>The opening ceremony was attended by students, teachers, parents, and distinguished guests from the community. The school principal delivered an inspiring speech about the importance of reading and lifelong learning in today's digital age.</p>
                    
                    <blockquote class="blockquote">
                        <p class="mb-0">"This library is not just a building with books; it's a gateway to knowledge, imagination, and endless possibilities for our students."</p>
                        <footer class="blockquote-footer">School Principal</footer>
                    </blockquote>
                    
                    <h3>Student Reactions</h3>
                    <p>Students have expressed excitement about the new facility. "I can't wait to spend time in the new library. It looks so modern and comfortable," said Sarah, a Grade 10 student. The library is expected to become a hub of learning and collaboration for the entire school community.</p>
                </div>
                
                <div class="mt-4">
                    <a href="{{ route('front.information') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to News
                    </a>
                </div>
            </article>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5>Latest News</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h6><a href="{{ route('front.news-fair-sains') }}">Science Fair 2026</a></h6>
                        <small class="text-muted">January 10, 2026</small>
                    </div>
                    <div class="mb-3">
                        <h6><a href="{{ route('front.news-art') }}">Student Art Exhibition</a></h6>
                        <small class="text-muted">January 5, 2026</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
