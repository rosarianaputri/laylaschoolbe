@extends('layouts.admin')

@section('title', 'Contact Settings')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Contact Settings</h1>
                <div>
                    <a href="{{ route('front.contact') }}" target="_blank" class="btn btn-outline-primary btn-sm">
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

            <form method="POST" action="{{ route('admin.contact.update') }}">
                @csrf
                
                <!-- Page Header -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Page Header</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="page_title" class="form-label">Page Title</label>
                                    <input type="text" class="form-control" id="page_title" name="page_title" 
                                           value="{{ $data['page_title'] ?? 'Contact Us' }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="page_subtitle" class="form-label">Page Subtitle</label>
                                    <input type="text" class="form-control" id="page_subtitle" name="page_subtitle" 
                                           value="{{ $data['page_subtitle'] ?? 'Get in touch with us' }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Contact Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="contact_email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="contact_email" name="contact_email" 
                                           value="{{ $data['contact_email'] ?? 'info@laylaschool.edu' }}" required>
                                    <small class="form-text text-muted">This email will be displayed on the contact page</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="contact_phone" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" id="contact_phone" name="contact_phone" 
                                           value="{{ $data['contact_phone'] ?? '+1 234 567 8900' }}" placeholder="+1 234 567 8900">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="contact_address" class="form-label">Address</label>
                            <textarea class="form-control" id="contact_address" name="contact_address" rows="3" required>{{ $data['contact_address'] ?? '123 School Street, Education City, EC 12345' }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Map Settings -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Map Settings</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="map_embed_url" class="form-label">Google Maps Embed URL</label>
                            <textarea class="form-control" id="map_embed_url" name="map_embed_url" rows="4" required>{{ $data['map_embed_url'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3029.572623436288!2d49.66165917533707!3d40.59518807141149!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x403097425d5bb533%3A0xe468933010cbe590!2zTGF5bGEgU2Nob29sIC0gVMmZbGltIFTJmWRyaXMgTcmZcmvJmXpp!5e0!3m2!1sen!2sid!4v1769477779694!5m2!1sen!2sid' }}</textarea>
                            <small class="form-text text-muted">Get the embed URL from Google Maps: Share > Embed a map > Copy HTML</small>
                        </div>
                        @if(!empty($data['map_embed_url']))
                            <div class="mb-3">
                                <label class="form-label">Map Preview</label>
                                <div class="border rounded p-2" style="height: 300px; overflow: hidden;">
                                    <iframe src="{{ $data['map_embed_url'] }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Contact Form Settings -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Contact Form Settings</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="form_title" class="form-label">Form Title</label>
                                    <input type="text" class="form-control" id="form_title" name="form_title" 
                                           value="{{ $data['form_title'] ?? 'Send us a message' }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="form_submit_text" class="form-label">Submit Button Text</label>
                                    <input type="text" class="form-control" id="form_submit_text" name="form_submit_text" 
                                           value="{{ $data['form_submit_text'] ?? 'Send Message' }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> 
                            <strong>Note:</strong> The contact form will send messages to the email address specified above.
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                    <form method="POST" action="{{ route('admin.contact.reset') }}" class="d-inline">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure you want to reset all content to default?')">
                            <i class="fas fa-undo"></i> Reset
                        </button>
                    </form>
                    <form method="POST" action="{{ route('admin.contact.destroy') }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete all content? This action cannot be undone.')">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
