@extends('layouts.admin')

@php
    $title = 'LaylaSchool || Facilities Page';
    $pageTitle = 'Facilities Page';
    $sections = $data['sections'] ?? [];
@endphp

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                @if (session('status') === 'facilities_updated')
                    <div class="alert alert-success">Facilities page updated</div>
                @elseif (session('status') === 'facilities_reset')
                    <div class="alert alert-warning">Facilities page reset</div>
                @elseif (session('status') === 'facilities_deleted')
                    <div class="alert alert-danger">Facilities page deleted</div>
                @endif

                <form method="POST" action="{{ route('admin.facilities.update') }}" enctype="multipart/form-data">
                    @csrf

                    <div id="sections-wrapper">
                        @foreach($sections as $i => $section)
                            <div class="card mb-3 section-item">
                                <div class="card-body">
                                    <h6 class="mb-3">Facility Section {{ $i + 1 }}</h6>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Image</label>
                                            @if(!empty($section['image_url']))
                                                <div class="mb-2">
                                                    <img src="{{ $section['image_url'] }}" alt="Facility" style="height: 120px; width: auto; object-fit: cover;">
                                                </div>
                                            @endif
                                            <input type="file" name="sections[{{ $i }}][image]" class="form-control" accept="image/*">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="sections[{{ $i }}][title]" class="form-control" value="{{ old('sections.' . $i . '.title', $section['title'] ?? '') }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea name="sections[{{ $i }}][text]" rows="3" class="form-control" required>{{ old('sections.' . $i . '.text', $section['text'] ?? '') }}</textarea>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-danger btn-sm remove-section">Remove</button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button type="button" class="btn btn-info mb-3" id="add-section">Add Section</button>

                    <hr>

                    <!-- Tombol Save / Reset / Delete / Preview persis kayak screenshot -->
                    <div class="d-flex gap-2 mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>

                        <form method="POST" action="{{ route('admin.facilities.reset') }}">
                            @csrf
                            <button type="submit" class="btn btn-warning">Reset</button>
                        </form>

                        <form method="POST" action="{{ route('admin.facilities.destroy') }}" onsubmit="return confirm('Delete facilities page setting?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                        <div>
                            <a href="{{ route('front.facilities') }}" target="_blank" class="btn btn-secondary">Preview</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    let sectionIndex = {{ count($sections) }};
    document.getElementById('add-section').addEventListener('click', function() {
        const wrapper = document.getElementById('sections-wrapper');
        const newSection = document.createElement('div');
        newSection.classList.add('card', 'mb-3', 'section-item');
        newSection.innerHTML = `
            <div class="card-body">
                <h6 class="mb-3">Facility Section ${sectionIndex + 1}</h6>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="sections[${sectionIndex}][image]" class="form-control" accept="image/*">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="sections[${sectionIndex}][title]" class="form-control" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="sections[${sectionIndex}][text]" rows="3" class="form-control" required></textarea>
                    </div>
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-section">Remove</button>
            </div>
        `;
        wrapper.appendChild(newSection);
        sectionIndex++;
    });

    document.addEventListener('click', function(e) {
        if(e.target.classList.contains('remove-section')){
            e.target.closest('.section-item').remove();
        }
    });
</script>
@endpush
@endsection
