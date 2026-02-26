@extends('layouts.frontend')

@php
    $title = 'Information - Layla School';
@endphp

@section('content')
    @if(isset($informationData) && is_array($informationData))
    <section class="text-center my-5">
        <h1>Information</h1>
        <p>News, Announcements, Events</p>
    </section>

    <!-- News Section -->
    <section id="news" class="container my-5">
        <h2 class="text-center mb-4">{{ $informationData['news_title'] ?? 'News & Articles' }}</h2>
        <div class="row g-4">
            @foreach($informationData['news_items'] ?? [] as $item)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        @if(!empty($item['image']))
                            <img src="{{ $item['image'] }}" class="card-img-top" alt="{{ $item['title'] ?? 'News' }}">
                        @else
                            <img src="{{ asset('images/news/liblary.jpg') }}" class="card-img-top" alt="{{ $item['title'] ?? 'News' }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item['title'] ?? '' }}</h5>
                            <p class="card-text">{{ $item['text'] ?? '' }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Announcements Section -->
    <section id="announcement" class="container my-5">
        <h2 class="text-center mb-4">{{ $informationData['announcement_title'] ?? 'Announcements' }}</h2>
        @foreach($informationData['announcement_items'] ?? [] as $item)
            <div class="announcement-item mb-4 p-3 rounded shadow-sm" style="background-color: #f8f9ff;">
                <h5 class="mb-1">{{ $item['title'] ?? '' }}</h5>
                <small class="text-muted">{{ $item['date'] ?? '' }}</small>
                <p class="mb-0">{{ $item['text'] ?? '' }}</p>
            </div>
        @endforeach
    </section>

    <!-- Events Section -->
    <section id="event" class="container my-5">
        <h2 class="text-center mb-4">{{ $informationData['event_title'] ?? 'Events' }}</h2>
        @foreach($informationData['event_items'] ?? [] as $item)
            <div class="event-item mb-4 p-3 rounded shadow-sm" style="background-color: #e6f7ff;">
                <h5 class="mb-1">{{ $item['title'] ?? '' }}</h5>
                <small class="text-muted">{{ $item['date'] ?? '' }}</small>
                <p class="mb-0">{{ $item['text'] ?? '' }}</p>
            </div>
        @endforeach
    </section>
    @elseif(isset($page) && $page && $pageContent)
        {!! $pageContent !!}
    @else
    <section class="text-center my-5">
        <h1>Information</h1>
        <p>News, Announcements, Events</p>
    </section>

    <section id="news" class="container my-5">
        <h2 class="text-center mb-4">News & Articles</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/news/liblary.jpg') }}" class="card-img-top" alt="News 1">
                    <div class="card-body">
                        <h5 class="card-title">New Library Opening</h5>
                        <p class="card-text">The school inaugurated a new modern library with state-of-the-art facilities.</p>
                        <a href="{{ route('front.news-liblary') }}" class="btn btn-primary btn-sm">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/news/sainssss.jpg') }}" class="card-img-top" alt="News 2">
                    <div class="card-body">
                        <h5 class="card-title">Science Fair 2026</h5>
                        <p class="card-text">Students showcased innovative science projects in the annual school fair.</p>
                        <a href="{{ route('front.news-fair-sains') }}" class="btn btn-primary btn-sm">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/news/artttttt.jpg') }}" class="card-img-top" alt="News 3">
                    <div class="card-body">
                        <h5 class="card-title">Student Art Exhibition</h5>
                        <p class="card-text">Creative artworks by students were displayed for the community to enjoy.</p>
                        <a href="{{ route('front.news-art') }}" class="btn btn-primary btn-sm">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="announcement" class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Announcements</h2>
            @if(auth()->check() && auth()->user()->role === 'admin')
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addAnnouncementModal">
                    <i class="fas fa-plus"></i> Add Announcement
                </button>
            @endif
        </div>

        @if(isset($informationData['announcements']) && !empty($informationData['announcements']))
            @foreach($informationData['announcements'] as $announcement)
                <div class="announcement-item mb-4 p-3 rounded shadow-sm" style="background-color: #f8f9ff;">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1">
                            <h5 class="mb-1">{{ $announcement['title'] }}</h5>
                            <small class="text-muted">{{ $announcement['date'] }}</small>
                            <p class="mb-0">{{ $announcement['content'] }}</p>
                        </div>
                        @if(auth()->check() && auth()->user()->role === 'admin')
                            <div class="ms-2">
                                <button class="btn btn-sm btn-outline-primary" onclick="editAnnouncement('{{ $announcement['id'] }}')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" onclick="deleteAnnouncement('{{ $announcement['id'] }}')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </section>

    <section id="event" class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Events</h2>
            @if(auth()->check() && auth()->user()->role === 'admin')
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addEventModal">
                    <i class="fas fa-plus"></i> Add Event
                </button>
            @endif
        </div>

        @if(isset($informationData['events']) && !empty($informationData['events']))
            @foreach($informationData['events'] as $event)
                <div class="event-item mb-4 p-3 rounded shadow-sm" style="background-color: #e6f7ff;">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1">
                            <h5 class="mb-1">{{ $event['title'] }}</h5>
                            <small class="text-muted">{{ $event['date'] }}</small>
                            <p class="mb-0">{{ $event['content'] }}</p>
                        </div>
                        @if(auth()->check() && auth()->user()->role === 'admin')
                            <div class="ms-2">
                                <button class="btn btn-sm btn-outline-primary" onclick="editEvent('{{ $event['id'] }}')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" onclick="deleteEvent('{{ $event['id'] }}')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </section>

    <!-- Add Announcement Modal -->
    @if(auth()->check() && auth()->user()->role === 'admin')
        <div class="modal fade" id="addAnnouncementModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Announcement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="announcementForm">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" id="announcementTitle" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" id="announcementDate" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Content</label>
                                <textarea class="form-control" id="announcementContent" rows="3" required></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="saveAnnouncement()">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Event Modal -->
        <div class="modal fade" id="addEventModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="eventForm">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" id="eventTitle" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" id="eventDate" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Content</label>
                                <textarea class="form-control" id="eventContent" rows="3" required></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="saveEvent()">Save</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @endif
@endsection

@section('scripts')
<script>
function saveAnnouncement() {
    const title = document.getElementById('announcementTitle').value;
    const date = document.getElementById('announcementDate').value;
    const content = document.getElementById('announcementContent').value;
    
    if (!title || !date || !content) {
        alert('Please fill all fields');
        return;
    }
    
    // Simpan ke database (implementasi backend diperlukan)
    fetch('/api/announcements', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            title: title,
            date: date,
            content: content
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert('Error saving announcement');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error saving announcement');
    });
}

function saveEvent() {
    const title = document.getElementById('eventTitle').value;
    const date = document.getElementById('eventDate').value;
    const content = document.getElementById('eventContent').value;
    
    if (!title || !date || !content) {
        alert('Please fill all fields');
        return;
    }
    
    // Simpan ke database (implementasi backend diperlukan)
    fetch('/api/events', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            title: title,
            date: date,
            content: content
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert('Error saving event');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error saving event');
    });
}

function editAnnouncement(id) {
    // Implementasi edit announcement
    console.log('Edit announcement:', id);
}

function deleteAnnouncement(id) {
    if (confirm('Are you sure you want to delete this announcement?')) {
        fetch(`/api/announcements/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error deleting announcement');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error deleting announcement');
        });
    }
}

function editEvent(id) {
    // Implementasi edit event
    console.log('Edit event:', id);
}

function deleteEvent(id) {
    if (confirm('Are you sure you want to delete this event?')) {
        fetch(`/api/events/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error deleting event');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error deleting event');
        });
    }
}
</script>
@endsection
