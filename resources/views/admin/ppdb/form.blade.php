@php
    $isEdit = isset($application);
@endphp

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Nama Lengkap Siswa</label>
        <input type="text" name="student_name" class="form-control" value="{{ old('student_name', $application->student_name ?? '') }}" required>
        @error('student_name')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Jenis Kelamin</label>
        <select name="gender" class="form-control" required>
            <option value="">Pilih</option>
            <option value="L" {{ old('gender', $application->gender ?? '') === 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ old('gender', $application->gender ?? '') === 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>
        @error('gender')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Tempat Lahir</label>
        <input type="text" name="birth_place" class="form-control" value="{{ old('birth_place', $application->birth_place ?? '') }}" required>
        @error('birth_place')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Tanggal Lahir</label>
        <input type="date" name="birth_date" class="form-control" value="{{ old('birth_date', isset($application) && $application->birth_date ? $application->birth_date->format('Y-m-d') : '') }}" required>
        @error('birth_date')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Asal Sekolah</label>
        <input type="text" name="previous_school" class="form-control" value="{{ old('previous_school', $application->previous_school ?? '') }}">
        @error('previous_school')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Nama Orang Tua/Wali</label>
        <input type="text" name="parent_name" class="form-control" value="{{ old('parent_name', $application->parent_name ?? '') }}" required>
        @error('parent_name')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">No. HP</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone', $application->phone ?? '') }}" required>
        @error('phone')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $application->email ?? '') }}" required>
        @error('email')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Status</label>
        <select name="status" class="form-control">
            <option value="pending" {{ old('status', $application->status ?? 'pending') === 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="approved" {{ old('status', $application->status ?? '') === 'approved' ? 'selected' : '' }}>ACC</option>
            <option value="rejected" {{ old('status', $application->status ?? '') === 'rejected' ? 'selected' : '' }}>Ditolak</option>
        </select>
        @error('status')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="col-12">
        <label class="form-label">Alamat</label>
        <textarea name="address" rows="3" class="form-control" required>{{ old('address', $application->address ?? '') }}</textarea>
        @error('address')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    <div class="col-12">
        <label class="form-label">Catatan</label>
        <textarea name="notes" rows="3" class="form-control">{{ old('notes', $application->notes ?? '') }}</textarea>
        @error('notes')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
</div>
