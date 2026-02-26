<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentLife;

class AdminStudentLifeController extends Controller
{
    public function edit()
    {
        $sections = StudentLife::all()->keyBy('section');
        $data = [
            'extracurricular' => $sections['extracurricular']->data ?? [],
            'achievements'    => $sections['achievements']->data ?? [],
            'gallery'         => $sections['gallery']->data ?? [],
        ];
        return view('admin.student_life', compact('data'));
    }

    public function update(Request $request)
    {
        $extracurricular = [
            'title' => $request->extracurricular_title,
            'items' => $request->extracurricular_items ?? [],
        ];

        $achievements = [
            'title' => $request->achievements_title,
            'items' => $request->achievements_items ?? [],
        ];

        $gallery = [
            'title' => $request->gallery_title,
            'text'  => $request->gallery_text,
        ];

        if ($request->hasFile('gallery_image')) {
            $path = $request->file('gallery_image')->store('student_life', 'public');
            $gallery['image_url'] = asset('storage/' . $path);
        }

        StudentLife::updateOrCreate(['section' => 'extracurricular'], ['data' => $extracurricular]);
        StudentLife::updateOrCreate(['section' => 'achievements'], ['data' => $achievements]);
        StudentLife::updateOrCreate(['section' => 'gallery'], ['data' => $gallery]);

        return redirect()->back()->with('status', 'student_life_updated');
    }

    public function reset()
    {
        StudentLife::truncate();
        return redirect()->back()->with('status', 'student_life_reset');
    }

    public function destroy()
    {
        StudentLife::truncate();
        return redirect()->back()->with('status', 'student_life_deleted');
    }
}
