<?php

namespace App\Http\Controllers;

use App\Models\PpdbApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PpdbController extends Controller
{
    public function index(): View
    {
        return view('frontend.ppdb');
    }

    public function create(): View
    {
        return view('frontend.ppdb-form');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'student_name' => ['required', 'string', 'max:150'],
            'gender' => ['required', 'in:L,P'],
            'birth_place' => ['required', 'string', 'max:100'],
            'birth_date' => ['required', 'date'],
            'previous_school' => ['nullable', 'string', 'max:150'],
            'parent_name' => ['required', 'string', 'max:150'],
            'phone' => ['required', 'string', 'max:30'],
            'email' => ['required', 'email', 'max:150'],
            'address' => ['required', 'string', 'max:1000'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $registrationCode = 'PPDB-' . now()->format('Ymd') . '-' . str_pad((string) (PpdbApplication::count() + 1), 4, '0', STR_PAD_LEFT);

        $application = PpdbApplication::create([
            ...$validated,
            'registration_code' => $registrationCode,
            'status' => 'pending',
        ]);

        return redirect()->route('front.ppdb.form')->with('status', 'ppdb_submitted')->with('registration_code', $application->registration_code);
    }
}
