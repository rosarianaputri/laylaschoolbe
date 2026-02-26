@extends('layouts.frontend')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <article>
                <h1 class="mb-4">Science Fair 2026</h1>
                <div class="mb-4">
                    <img src="{{ asset('images/news/sainssss.jpg') }}" class="img-fluid rounded" alt="Science Fair">
                </div>
                <div class="meta mb-3">
                    <small class="text-muted">
                        <i class="fas fa-calendar"></i> January 10, 2026 | 
                        <i class="fas fa-user"></i> Admin
                    </small>
                </div>
                <div class="content">
                    <p class="lead">Students showcased innovative science projects in the annual school fair.</p>
                    <p>The annual Science Fair 2026 was a tremendous success, with students from all grades presenting innovative projects that demonstrated their understanding of scientific principles and creative problem-solving abilities.</p>
                    
                    <h3>Project Highlights</h3>
                    <ul>
                        <li>Renewable energy models and solar-powered devices</li>
                        <li>Robotics and automation projects</li>
                        <li>Environmental science experiments</li>
                        <li>Chemistry demonstrations and reactions</li>
                        <li>Biology projects on ecosystems and genetics</li>
                    </ul>
                    
                    <h3>Awards and Recognition</h3>
                    <p>The judges were impressed by the quality and creativity of the projects. First place went to a team that developed a water purification system using natural materials. Second place was awarded to a student who created an automated plant watering system.</p>
                    
                    <blockquote class="blockquote">
                        <p class="mb-0">"The Science Fair showcases our students' curiosity and innovation. These young scientists are the future of our world."</p>
                        <footer class="blockquote-footer">Science Department Head</footer>
                    </blockquote>
                    
                    <h3>Community Impact</h3>
                    <p>Parents and community members attended the fair, showing their support for STEM education. Many local businesses sponsored prizes and provided mentorship to students during the project development phase.</p>
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
                        <h6><a href="{{ route('front.news-liblary') }}">New Library Opening</a></h6>
                        <small class="text-muted">January 15, 2026</small>
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
