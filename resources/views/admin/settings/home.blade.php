@extends('layouts.admin')

@php
    $title = 'LaylaSchool || Settings - Home Page';
    $pageTitle = 'Settings - Home Page';

    $hero = $data['hero'] ?? [];
    $principal = $data['principal'] ?? [];
    $academic = $data['academic'] ?? [];
    $academicItems = $academic['items'] ?? [];
    $news = $data['news'] ?? [];
    $newsItems = $news['items'] ?? [];
@endphp

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status') === 'home_updated')
                        <div class="alert alert-success">Home page updated</div>
                    @elseif (session('status') === 'home_reset')
                        <div class="alert alert-warning">Home page reset</div>
                    @elseif (session('status') === 'home_deleted')
                        <div class="alert alert-danger">Home page deleted</div>
                    @endif

                    <form method="POST" action="{{ route('admin.home.update') }}" enctype="multipart/form-data">
                        @csrf

                        <h5 class="mb-3">Hero Section</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="hero_title" class="form-control" value="{{ old('hero_title', $hero['title'] ?? 'Welcome to Layla School') }}" required>
                                @error('hero_title')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Subtitle</label>
                                <input type="text" name="hero_subtitle" class="form-control" value="{{ old('hero_subtitle', $hero['subtitle'] ?? 'A school that inspires learning and kindness') }}" required>
                                @error('hero_subtitle')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Button Text</label>
                                <input type="text" name="hero_button_text" class="form-control" value="{{ old('hero_button_text', $hero['button_text'] ?? 'Learn More') }}" required>
                                @error('hero_button_text')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Button Link (URL)</label>
                                <input type="text" name="hero_button_link" class="form-control" value="{{ old('hero_button_link', $hero['button_link'] ?? route('front.about')) }}" required>
                                @error('hero_button_link')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Hero Background Image</label>
                                @if(!empty($hero['image_url']))
                                    <div class="mb-2">
                                        <img src="{{ $hero['image_url'] }}" alt="Hero" style="max-width: 100%; height: 140px; object-fit: cover;">
                                    </div>
                                @endif
                                <input type="file" name="hero_image" class="form-control" accept="image/*">
                                @error('hero_image')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <hr>

                        <h5 class="mb-3">Principal Message</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="principal_title" class="form-control" value="{{ old('principal_title', $principal['title'] ?? "Principal’s Message") }}" required>
                                @error('principal_title')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Signature</label>
                                <input type="text" name="principal_signature" class="form-control" value="{{ old('principal_signature', $principal['signature'] ?? '— Principal of Layla School') }}" required>
                                @error('principal_signature')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Paragraph 1</label>
                                <textarea name="principal_paragraph_1" rows="3" class="form-control" required>{{ old('principal_paragraph_1', $principal['paragraph_1'] ?? 'Welcome to Layla School — a place where learning, creativity, and kindness grow together.') }}</textarea>
                                @error('principal_paragraph_1')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Paragraph 2</label>
                                <textarea name="principal_paragraph_2" rows="3" class="form-control" required>{{ old('principal_paragraph_2', $principal['paragraph_2'] ?? 'We believe that education is not only about knowledge, but also about character, respect, and compassion.') }}</textarea>
                                @error('principal_paragraph_2')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Principal Photo</label>
                                @if(!empty($principal['image_url']))
                                    <div class="mb-2">
                                        <img src="{{ $principal['image_url'] }}" alt="Principal" style="height: 120px; width: 120px; object-fit: cover; border-radius: 999px;">
                                    </div>
                                @endif
                                <input type="file" name="principal_image" class="form-control" accept="image/*">
                                @error('principal_image')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <hr>

                        <h5 class="mb-3">Academic Section</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="academic_title" class="form-control" value="{{ old('academic_title', $academic['title'] ?? 'Academic Excellence') }}" required>
                                @error('academic_title')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="academic_description" rows="2" class="form-control" required>{{ old('academic_description', $academic['description'] ?? 'At Layla School, our academic program focuses on a balanced curriculum...') }}</textarea>
                                @error('academic_description')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Item 1 Title</label>
                                <input type="text" name="academic_item_1_title" class="form-control" value="{{ old('academic_item_1_title', $academicItems[0]['title'] ?? 'Comprehensive Curriculum') }}" required>
                                @error('academic_item_1_title')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                <label class="form-label mt-2">Item 1 Text</label>
                                <textarea name="academic_item_1_text" rows="2" class="form-control" required>{{ old('academic_item_1_text', $academicItems[0]['text'] ?? 'Structured lessons that nurture creativity and understanding.') }}</textarea>
                                @error('academic_item_1_text')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Item 2 Title</label>
                                <input type="text" name="academic_item_2_title" class="form-control" value="{{ old('academic_item_2_title', $academicItems[1]['title'] ?? 'Qualified Teachers') }}" required>
                                @error('academic_item_2_title')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                <label class="form-label mt-2">Item 2 Text</label>
                                <textarea name="academic_item_2_text" rows="2" class="form-control" required>{{ old('academic_item_2_text', $academicItems[1]['text'] ?? 'Our teachers are passionate about guiding students to excellence.') }}</textarea>
                                @error('academic_item_2_text')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Item 3 Title</label>
                                <input type="text" name="academic_item_3_title" class="form-control" value="{{ old('academic_item_3_title', $academicItems[2]['title'] ?? 'Organized Calendar') }}" required>
                                @error('academic_item_3_title')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                <label class="form-label mt-2">Item 3 Text</label>
                                <textarea name="academic_item_3_text" rows="2" class="form-control" required>{{ old('academic_item_3_text', $academicItems[2]['text'] ?? 'Academic year filled with engaging lessons and school activities.') }}</textarea>
                                @error('academic_item_3_text')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <hr>

                        <h5 class="mb-3">News & Events</h5>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="news_title" class="form-control" value="{{ old('news_title', $news['title'] ?? 'Latest News & Events') }}" required>
                                @error('news_title')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        @for($i = 1; $i <= 3; $i++)
                            @php
                                $idx = $i - 1;
                                $item = $newsItems[$idx] ?? [];
                            @endphp
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6 class="mb-3">News Item {{ $i }}</h6>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="news_item_{{ $i }}_title" class="form-control" value="{{ old('news_item_' . $i . '_title', $item['title'] ?? '') }}" required>
                                            @error('news_item_' . $i . '_title')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Image</label>
                                            @if(!empty($item['image_url']))
                                                <div class="mb-2">
                                                    <img src="{{ $item['image_url'] }}" alt="News" style="height: 120px; width: auto; object-fit: cover;">
                                                </div>
                                            @endif
                                            <input type="file" name="news_item_{{ $i }}_image" class="form-control" accept="image/*">
                                            @error('news_item_' . $i . '_image')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Text</label>
                                            <textarea name="news_item_{{ $i }}_text" rows="3" class="form-control" required>{{ old('news_item_' . $i . '_text', $item['text'] ?? '') }}</textarea>
                                            @error('news_item_' . $i . '_text')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Button Text</label>
                                <input type="text" name="news_button_text" class="form-control" value="{{ old('news_button_text', $news['button_text'] ?? 'Learn More') }}" required>
                                @error('news_button_text')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Button Link (URL)</label>
                                <input type="text" name="news_button_link" class="form-control" value="{{ old('news_button_link', $news['button_link'] ?? route('front.information')) }}" required>
                                @error('news_button_link')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Save Home Page</button>
                    </form>

                    <hr>

                    <div class="d-flex gap-2">
                        <form method="POST" action="{{ route('admin.home.reset') }}">
                            @csrf
                            <button type="submit" class="btn btn-warning">Reset</button>
                        </form>

                        <form method="POST" action="{{ route('admin.home.destroy') }}" onsubmit="return confirm('Delete home page setting?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('front.home') }}" target="_blank" class="btn btn-primary">Preview Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
