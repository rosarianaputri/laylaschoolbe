@extends('layouts.admin')

@section('title', 'Information Settings')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 fw-bold" style="color:#4A47A3;">Information Settings</h1>
                <div>
                    <a href="{{ route('front.information') }}" target="_blank" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-external-link-alt"></i> Preview
                    </a>
                </div>
            </div>

            @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ __('Content updated successfully!') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.information.update') }}" enctype="multipart/form-data">
                @csrf
                
                <!-- NEWS SECTION -->
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header">
                        <h5 class="mb-0 fw-semibold">News & Articles</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Section Title</label>
                            <input type="text" class="form-control" name="news_title" 
                                   value="{{ $data['news_title'] ?? 'News & Articles' }}" required>
                        </div>

                        <div id="news_items_container">
                            @php
                                $newsItems = $data['news_items'] ?? [
                                    ['title' => 'New Library Opening', 'text' => 'The school inaugurated a new modern library with state-of-the-art facilities.', 'image' => null],
                                    ['title' => 'Science Fair 2026', 'text' => 'Students showcased innovative science projects in the annual school fair.', 'image' => null],
                                    ['title' => 'Student Art Exhibition', 'text' => 'Creative artworks by students were displayed for the community to enjoy.', 'image' => null]
                                ];
                            @endphp
                            @foreach($newsItems as $index => $item)
                                <div class="news-item p-3 mb-3 border rounded-3 bg-light position-relative" data-index="{{ $index }}">
                                    <div class="position-absolute top-0 end-0 mt-2 me-2">
                                        <button type="button" class="btn btn-outline-danger btn-icon remove-news-item" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Title</label>
                                            <input type="text" class="form-control mb-2" name="news_items[{{ $index }}][title]" 
                                                   value="{{ $item['title'] ?? '' }}" required>
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" name="news_items[{{ $index }}][text]" rows="3" required>{{ $item['text'] ?? '' }}</textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Image</label>
                                            <input type="file" class="form-control mb-2" name="news_items[{{ $index }}][image]" accept="image/*">
                                            @if(isset($item['image']) && $item['image'])
                                                <img src="{{ $item['image'] }}" class="img-thumbnail mt-2" style="max-height: 100px;">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add_news_item">+ Add News Item</button>
                    </div>
                </div>

                <!-- ANNOUNCEMENTS SECTION -->
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header">
                        <h5 class="mb-0 fw-semibold">Announcements</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Section Title</label>
                            <input type="text" class="form-control" name="announcement_title" 
                                   value="{{ $data['announcement_title'] ?? 'Announcements' }}" required>
                        </div>

                        <div id="announcement_items_container">
                            @php
                                $announcementItems = $data['announcement_items'] ?? [
                                    ['title' => 'Holiday Notice', 'date' => '2026-02-01', 'text' => 'School will be closed on 1st February for holiday.'],
                                    ['title' => 'Science Fair Registration', 'date' => '2026-01-28', 'text' => 'Registration for Science Fair 2026 starts on 28th January.']
                                ];
                            @endphp
                            @foreach($announcementItems as $index => $item)
                                <div class="announcement-item p-3 mb-3 border rounded-3 bg-light position-relative" data-index="{{ $index }}">
                                    <div class="position-absolute top-0 end-0 mt-2 me-2">
                                        <button type="button" class="btn btn-outline-danger btn-icon remove-announcement-item" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="row align-items-end">
                                        <div class="col-md-4">
                                            <label class="form-label">Title</label>
                                            <input type="text" class="form-control mb-2" name="announcement_items[{{ $index }}][title]" 
                                                   value="{{ $item['title'] ?? '' }}" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Date</label>
                                            <input type="date" class="form-control mb-2" name="announcement_items[{{ $index }}][date]" 
                                                   value="{{ $item['date'] ?? '' }}" required>
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control mb-2" name="announcement_items[{{ $index }}][text]" rows="2" required>{{ $item['text'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add_announcement_item">+ Add Announcement</button>
                    </div>
                </div>

                <!-- EVENTS SECTION -->
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header">
                        <h5 class="mb-0 fw-semibold">Events</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Section Title</label>
                            <input type="text" class="form-control" name="event_title" 
                                   value="{{ $data['event_title'] ?? 'Events' }}" required>
                        </div>

                        <div id="event_items_container">
                            @php
                                $eventItems = $data['event_items'] ?? [
                                    ['title' => 'Annual Sports Day', 'date' => '2026-02-15', 'text' => 'Students will participate in various sports competitions across all grades.'],
                                    ['title' => 'Art & Music Festival', 'date' => '2026-03-20', 'text' => 'A celebration of students\' creativity in art and music, open to all parents and community.']
                                ];
                            @endphp
                            @foreach($eventItems as $index => $item)
                                <div class="event-item p-3 mb-3 border rounded-3 bg-light position-relative" data-index="{{ $index }}">
                                    <div class="position-absolute top-0 end-0 mt-2 me-2">
                                        <button type="button" class="btn btn-outline-danger btn-icon remove-event-item" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="row align-items-end">
                                        <div class="col-md-4">
                                            <label class="form-label">Title</label>
                                            <input type="text" class="form-control mb-2" name="event_items[{{ $index }}][title]" 
                                                   value="{{ $item['title'] ?? '' }}" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Date</label>
                                            <input type="date" class="form-control mb-2" name="event_items[{{ $index }}][date]" 
                                                   value="{{ $item['date'] ?? '' }}" required>
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control mb-2" name="event_items[{{ $index }}][text]" rows="2" required>{{ $item['text'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add_event_item">+ Add Event</button>
                    </div>
                </div>

                <!-- ACTION BUTTONS -->
                <div class="d-flex justify-content-end gap-2 mt-4">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                    <form method="POST" action="{{ route('admin.information.reset') }}" class="d-inline">@csrf @method('POST')
                        <button type="submit" class="btn btn-warning"><i class="fas fa-undo"></i> Reset</button>
                    </form>
                    <form method="POST" action="{{ route('admin.information.destroy') }}" class="d-inline">@csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                    </form>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary"><i class="fas fa-times"></i> Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.card-header {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
    border-radius: 12px 12px 0 0;
}
.form-control { border-radius: 8px; border: 1px solid #ddd; }
.form-control:focus { border-color: #6c63ff; box-shadow: 0 0 0 0.1rem rgba(108,99,255,0.25); }

.news-item, .announcement-item, .event-item {
    transition: 0.3s;
}
.news-item:hover, .announcement-item:hover, .event-item:hover {
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
}

.btn-outline-primary:hover {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    border: none;
}

/* Bulat kecil untuk remove */
.btn-icon {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.btn-icon i { font-size: 15px; }
.btn-outline-danger.btn-icon {
    border-color: #ff4b5c;
    color: #ff4b5c;
}
.btn-outline-danger.btn-icon:hover {
    background-color: #ff4b5c;
    color: #fff;
    border-color: transparent;
}

/* Fade in animasi */
.fadeIn {
    animation: fadeIn 0.4s ease-in-out;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    let newsIndex = {{ count($data['news_items'] ?? []) }};
    let announcementIndex = {{ count($data['announcement_items'] ?? []) }};
    let eventIndex = {{ count($data['event_items'] ?? []) }};

    document.addEventListener('click', function(e) {
        const target = e.target.closest('button');
        if (!target) return;

        // === ADD NEWS ===
        if (target.id === 'add_news_item') {
            const c = document.getElementById('news_items_container');
            const el = document.createElement('div');
            el.className = 'news-item p-3 mb-3 border rounded-3 bg-light position-relative fadeIn';
            el.innerHTML = `
                <div class="position-absolute top-0 end-0 mt-2 me-2">
                    <button type="button" class="btn btn-outline-danger btn-icon remove-news-item" title="Hapus">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control mb-2" name="news_items[${newsIndex}][title]" required>
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="news_items[${newsIndex}][text]" rows="3" required></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" name="news_items[${newsIndex}][image]" accept="image/*">
                    </div>
                </div>`;
            c.appendChild(el);
            newsIndex++;
        }

        // === ADD ANNOUNCEMENT ===
        if (target.id === 'add_announcement_item') {
            const c = document.getElementById('announcement_items_container');
            const el = document.createElement('div');
            el.className = 'announcement-item p-3 mb-3 border rounded-3 bg-light position-relative fadeIn';
            el.innerHTML = `
                <div class="position-absolute top-0 end-0 mt-2 me-2">
                    <button type="button" class="btn btn-outline-danger btn-icon remove-announcement-item" title="Hapus">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div class="row align-items-end">
                    <div class="col-md-4">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control mb-2" name="announcement_items[${announcementIndex}][title]" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control mb-2" name="announcement_items[${announcementIndex}][date]" required>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">Description</label>
                        <textarea class="form-control mb-2" name="announcement_items[${announcementIndex}][text]" rows="2" required></textarea>
                    </div>
                </div>`;
            c.appendChild(el);
            announcementIndex++;
        }

        // === ADD EVENT ===
        if (target.id === 'add_event_item') {
            const c = document.getElementById('event_items_container');
            const el = document.createElement('div');
            el.className = 'event-item p-3 mb-3 border rounded-3 bg-light position-relative fadeIn';
            el.innerHTML = `
                <div class="position-absolute top-0 end-0 mt-2 me-2">
                    <button type="button" class="btn btn-outline-danger btn-icon remove-event-item" title="Hapus">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div class="row align-items-end">
                    <div class="col-md-4">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control mb-2" name="event_items[${eventIndex}][title]" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control mb-2" name="event_items[${eventIndex}][date]" required>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">Description</label>
                        <textarea class="form-control mb-2" name="event_items[${eventIndex}][text]" rows="2" required></textarea>
                    </div>
                </div>`;
            c.appendChild(el);
            eventIndex++;
        }

        // === REMOVE BUTTONS ===
        if (target.classList.contains('remove-news-item')) target.closest('.news-item').remove();
        if (target.classList.contains('remove-announcement-item')) target.closest('.announcement-item').remove();
        if (target.classList.contains('remove-event-item')) target.closest('.event-item').remove();
    });
});
</script>
@endpush
