@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Data Siswa (PPDB)</h4>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Asal Sekolah</th>
                <th>Orang Tua</th>
                <th>No. HP</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->student_name }}</td>
                <td>{{ $student->previous_school }}</td>
                <td>{{ $student->parent_name }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection