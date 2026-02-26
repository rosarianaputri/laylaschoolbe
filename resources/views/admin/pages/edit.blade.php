@extends('layouts.admin')

@php
    $title = 'LaylaSchool || Edit Page';
    $pageTitle = 'Edit Page: ' . $slug;
@endphp

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status') === 'saved')
                        <div class="alert alert-success">Saved</div>
                    @elseif (session('status') === 'reset')
                        <div class="alert alert-warning">Reset</div>
                    @elseif (session('status') === 'deleted')
                        <div class="alert alert-danger">Deleted</div>
                    @endif

                    <div class="d-flex gap-2 mb-3">
                        <a href="{{ route('front.' . str_replace('-', '_', $slug)) }}" target="_blank" class="btn btn-primary">Preview Frontend</a>
                    </div>

                    <form method="POST" action="{{ route('admin.pages.update', ['slug' => $slug]) }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" value="{{ old('title', $page->title) }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Content (HTML)</label>
                            <textarea name="content" rows="16" class="form-control">{{ old('content', $page->content) }}</textarea>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>

                    <hr>

                    <div class="d-flex gap-2">
                        <form method="POST" action="{{ route('admin.pages.reset', ['slug' => $slug]) }}">
                            @csrf
                            <button type="submit" class="btn btn-warning">Reset Content</button>
                        </form>

                        <form method="POST" action="{{ route('admin.pages.destroy', ['slug' => $slug]) }}" onsubmit="return confirm('Delete page content?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
