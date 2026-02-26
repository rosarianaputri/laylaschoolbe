@extends('layouts.admin')

@php
    $title = 'LaylaSchool || Academic Page';
    $pageTitle = 'Academic Page';

    $curriculum = $data['curriculum'] ?? [];
    $curriculumItems = $curriculum['items'] ?? [];
    $faculty = $data['faculty'] ?? [];
    $facultyMembers = $faculty['members'] ?? [];
@endphp

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status') === 'academic_updated')
                        <div class="alert alert-success">Academic page updated</div>
                    @elseif (session('status') === 'academic_reset')
                        <div class="alert alert-warning">Academic page reset</div>
                    @elseif (session('status') === 'academic_deleted')
                        <div class="alert alert-danger">Academic page deleted</div>
                    @endif

                    <form method="POST" action="{{ route('admin.academic.update') }}" enctype="multipart/form-data">
                        @csrf

                        <h5 class="mb-3">Curriculum</h5>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="curriculum_title" class="form-control" value="{{ old('curriculum_title', $curriculum['title'] ?? 'Curriculum') }}" required>
                                @error('curriculum_title')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        @for($i = 1; $i <= 3; $i++)
                            @php
                                $idx = $i - 1;
                                $item = $curriculumItems[$idx] ?? [];
                            @endphp
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6 class="mb-3">Curriculum Item {{ $i }}</h6>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Image</label>
                                            @if(!empty($item['image_url']))
                                                <div class="mb-2">
                                                    <img src="{{ $item['image_url'] }}" alt="Curriculum" style="height: 120px; width: auto; object-fit: cover;">
                                                </div>
                                            @endif
                                            <input type="file" name="curriculum_item_{{ $i }}_image" class="form-control" accept="image/*">
                                            @error('curriculum_item_' . $i . '_image')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="curriculum_item_{{ $i }}_title" class="form-control" value="{{ old('curriculum_item_' . $i . '_title', $item['title'] ?? '') }}" required>
                                            @error('curriculum_item_' . $i . '_title')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Text</label>
                                            <textarea name="curriculum_item_{{ $i }}_text" rows="3" class="form-control" required>{{ old('curriculum_item_' . $i . '_text', $item['text'] ?? '') }}</textarea>
                                            @error('curriculum_item_' . $i . '_text')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor

                        <hr>

                        <h5 class="mb-3">Teaching Staff</h5>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="faculty_title" class="form-control" value="{{ old('faculty_title', $faculty['title'] ?? 'Teaching Staff') }}" required>
                                @error('faculty_title')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        @for($i = 1; $i <= 3; $i++)
                            @php
                                $idx = $i - 1;
                                $member = $facultyMembers[$idx] ?? [];
                            @endphp
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6 class="mb-3">Faculty Member {{ $i }}</h6>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Photo</label>
                                            @if(!empty($member['image_url']))
                                                <div class="mb-2">
                                                    <img src="{{ $member['image_url'] }}" alt="Faculty" style="height: 120px; width: 120px; object-fit: cover; border-radius: 999px;">
                                                </div>
                                            @endif
                                            <input type="file" name="faculty_member_{{ $i }}_image" class="form-control" accept="image/*">
                                            @error('faculty_member_' . $i . '_image')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="faculty_member_{{ $i }}_name" class="form-control" value="{{ old('faculty_member_' . $i . '_name', $member['name'] ?? '') }}" required>
                                            @error('faculty_member_' . $i . '_name')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor

                        <button type="submit" class="btn btn-success">Save Academic Page</button>
                    </form>

                    <hr>

                    <div class="d-flex gap-2">
                        <form method="POST" action="{{ route('admin.academic.reset') }}">
                            @csrf
                            <button type="submit" class="btn btn-warning">Reset</button>
                        </form>

                        <form method="POST" action="{{ route('admin.academic.destroy') }}" onsubmit="return confirm('Delete academic page setting?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('front.academic') }}" target="_blank" class="btn btn-primary">Preview Academic</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
