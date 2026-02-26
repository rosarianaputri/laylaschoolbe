@extends('layouts.admin')

@php
    $title = 'LaylaSchool || Settings - About Page';
    $pageTitle = 'Settings - About Page';

    $principal = $data['principal'] ?? [];
    $visionMission = $data['vision_mission'] ?? [];
    $history = $data['history'] ?? [];
    $org = $data['org'] ?? [];
    $members = $org['members'] ?? [];

    $missionItemsText = '';
    if (!empty($visionMission['mission_items']) && is_array($visionMission['mission_items'])) {
        $missionItemsText = implode("\n", $visionMission['mission_items']);
    }
@endphp

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status') === 'about_updated')
                        <div class="alert alert-success">About page updated</div>
                    @elseif (session('status') === 'about_reset')
                        <div class="alert alert-warning">About page reset</div>
                    @elseif (session('status') === 'about_deleted')
                        <div class="alert alert-danger">About page deleted</div>
                    @endif

                    <form method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data">
                        @csrf

                        <h5 class="mb-3">Principal’s Message</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="principal_title" class="form-control" value="{{ old('principal_title', $principal['title'] ?? 'Principal’s Message') }}" required>
                                @error('principal_title')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Photo</label>
                                @if(!empty($principal['image_url']))
                                    <div class="mb-2">
                                        <img src="{{ $principal['image_url'] }}" alt="Principal" style="height: 120px; width: 120px; object-fit: cover; border-radius: 999px;">
                                    </div>
                                @endif
                                <input type="file" name="principal_image" class="form-control" accept="image/*">
                                @error('principal_image')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Text</label>
                                <textarea name="principal_text" rows="4" class="form-control" required>{{ old('principal_text', $principal['text'] ?? '') }}</textarea>
                                @error('principal_text')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <hr>

                        <h5 class="mb-3">Vision & Mission</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Vision Title</label>
                                <input type="text" name="vision_title" class="form-control" value="{{ old('vision_title', $visionMission['vision_title'] ?? 'Our Vision') }}" required>
                                @error('vision_title')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Mission Title</label>
                                <input type="text" name="mission_title" class="form-control" value="{{ old('mission_title', $visionMission['mission_title'] ?? 'Our Mission') }}" required>
                                @error('mission_title')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Vision Text</label>
                                <textarea name="vision_text" rows="4" class="form-control" required>{{ old('vision_text', $visionMission['vision_text'] ?? '') }}</textarea>
                                @error('vision_text')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Mission Items (1 per line)</label>
                                <textarea name="mission_items" rows="4" class="form-control" required>{{ old('mission_items', $missionItemsText) }}</textarea>
                                @error('mission_items')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <hr>

                        <h5 class="mb-3">History</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="history_title" class="form-control" value="{{ old('history_title', $history['title'] ?? 'Our History') }}" required>
                                @error('history_title')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Image</label>
                                @if(!empty($history['image_url']))
                                    <div class="mb-2">
                                        <img src="{{ $history['image_url'] }}" alt="History" style="height: 120px; width: auto; object-fit: cover;">
                                    </div>
                                @endif
                                <input type="file" name="history_image" class="form-control" accept="image/*">
                                @error('history_image')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Text</label>
                                <textarea name="history_text" rows="4" class="form-control" required>{{ old('history_text', $history['text'] ?? '') }}</textarea>
                                @error('history_text')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <hr>

                        <h5 class="mb-3">Organizational Structure</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="org_title" class="form-control" value="{{ old('org_title', $org['title'] ?? 'Organizational Structure') }}" required>
                                @error('org_title')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Subtitle/Text</label>
                                <input type="text" name="org_text" class="form-control" value="{{ old('org_text', $org['text'] ?? 'Meet the leadership team of Layla School.') }}" required>
                                @error('org_text')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        @for($i = 1; $i <= 4; $i++)
                            @php
                                $idx = $i - 1;
                                $m = $members[$idx] ?? [];
                            @endphp
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6 class="mb-3">Member {{ $i }}</h6>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Photo</label>
                                            @if(!empty($m['image_url']))
                                                <div class="mb-2">
                                                    <img src="{{ $m['image_url'] }}" alt="Member" style="height: 120px; width: 120px; object-fit: cover; border-radius: 999px;">
                                                </div>
                                            @endif
                                            <input type="file" name="org_member_{{ $i }}_image" class="form-control" accept="image/*">
                                            @error('org_member_' . $i . '_image')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="org_member_{{ $i }}_name" class="form-control" value="{{ old('org_member_' . $i . '_name', $m['name'] ?? '') }}" required>
                                            @error('org_member_' . $i . '_name')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Role</label>
                                            <input type="text" name="org_member_{{ $i }}_role" class="form-control" value="{{ old('org_member_' . $i . '_role', $m['role'] ?? '') }}" required>
                                            @error('org_member_' . $i . '_role')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor

                        <button type="submit" class="btn btn-success">Save About Page</button>
                    </form>

                    <hr>

                    <div class="d-flex gap-2">
                        <form method="POST" action="{{ route('admin.about.reset') }}">
                            @csrf
                            <button type="submit" class="btn btn-warning">Reset</button>
                        </form>

                        <form method="POST" action="{{ route('admin.about.destroy') }}" onsubmit="return confirm('Delete about page setting?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('front.about') }}" target="_blank" class="btn btn-primary">Preview About</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
