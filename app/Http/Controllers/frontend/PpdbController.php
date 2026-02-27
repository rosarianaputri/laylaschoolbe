<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PpdbApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PpdbController extends Controller
{
    /**
     * Halaman utama PPDB
     */
    public function index()
    {
        return view('frontend.ppdb');
    }

    /**
     * Formulir pendaftaran PPDB
     */
    public function create()
    {
        return view('frontend.ppdb.form');
    }

    /**
     * Proses simpan data pendaftar baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:100',
            'gender' => 'required|in:L,P',
            'birth_place' => 'required|string|max:100',
            'birth_date' => 'required|date',
            'previous_school' => 'nullable|string|max:150',
            'parent_name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'address' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        // Buat kode pendaftaran unik (cek biar gak duplikat)
        do {
            $code = 'PPDB-' . strtoupper(Str::random(6));
        } while (PpdbApplication::where('registration_code', $code)->exists());

        $validated['registration_code'] = $code;
        $validated['status'] = 'pending';

        // Simpan ke database
        PpdbApplication::create($validated);

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('front.ppdb')
            ->with('success', "Pendaftaran berhasil! Simpan nomor pendaftaran Anda: {$code}");
    }

    /**
     * Fitur pencarian nomor pendaftaran
     */
    public function search(Request $request)
    {
        $no = trim($request->input('no_pendaftaran')); // hapus spasi biar aman

        // Cek data berdasarkan kode pendaftaran
        $application = PpdbApplication::where('registration_code', $no)->first();

        if (!$application) {
            return redirect()->route('front.ppdb')->with('error', 'Nomor pendaftaran tidak ditemukan.');
        }

        // Kalau ditemukan, arahkan ke halaman hasil
        return view('frontend.ppdb.result', compact('application'));
    }
}