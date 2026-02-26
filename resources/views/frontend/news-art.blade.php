@extends('layouts.frontend')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <article>
                <h1 class="mb-4">Student Art Exhibition</h1>
                <div class="mb-4">
                    <img src="{{ asset('images/news/artttttt.jpg') }}" class="img-fluid rounded" alt="Art Exhibition">
                </div>
                <div class="meta mb-3">
                    <small class="text-muted">
                        <i class="fas fa-calendar"></i> January 5, 2026 | 
                        <i class="fas fa-user"></i> Admin
                    </small>
                </div>
                <div class="content">
                    <p class="lead">Creative artworks by students were displayed for the community to enjoy.</p>
                    <p>The annual Student Art Exhibition showcased the incredible talent and creativity of our students. The exhibition featured paintings, sculptures, digital art, and mixed media pieces that demonstrated artistic skills and creative expression.</p>
                    
                    <h3>Featured Artworks</h3>
                    <ul>
                        <li>Traditional paintings and drawings</li>
                        <li>Digital art and graphic design pieces</li>
                        <li>Sculptures and 3D art installations</li>
                        <li>Photography and digital photography</li>
                        <li>Mixed media and collage artworks</li>
                    </ul>
                    
                    <h3>Guest Artists and Mentors</h3>
                    <p>Local artists and art educators attended the exhibition, providing valuable feedback and encouragement to the young artists. Several students received recognition for their outstanding work and potential in the arts.</p>
                    
                    <blockquote class="blockquote">
                        <p class="mb-0">"Art education is essential for developing creativity and critical thinking. Our students have shown remarkable growth and artistic maturity."</p>
                        <footer class="blockquote-footer">Art Department Coordinator</footer>
                    </blockquote>
                    
                    <h3>Community Support</h3>
                    <p>The exhibition was well-attended by parents, teachers, and community members. Many artworks were available for purchase, with proceeds going to support the school's art program and fund art supplies for future projects.</p>
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
                        <h6><a href="{{ route('front.news-fair-sains') }}">Science Fair 2026</a></h6>
                        <small class="text-muted">January 10, 2026</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
