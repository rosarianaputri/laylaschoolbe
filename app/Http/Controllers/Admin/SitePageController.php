<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SitePage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SitePageController extends Controller
{
    public function edit(string $slug)
    {
        $page = SitePage::query()->firstOrCreate(
            ['slug' => $slug],
            ['title' => ucfirst(str_replace('-', ' ', $slug)), 'content' => null]
        );

        return view('admin.pages.edit', [
            'page' => $page,
            'slug' => $slug,
        ]);
    }

    public function update(Request $request, string $slug): RedirectResponse
    {
        $page = SitePage::query()->firstOrCreate(
            ['slug' => $slug],
            ['title' => ucfirst(str_replace('-', ' ', $slug)), 'content' => null]
        );

        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
        ]);

        $page->fill($validated);
        $page->save();

        return back()->with('status', 'saved');
    }

    public function reset(string $slug): RedirectResponse
    {
        $page = SitePage::query()->where('slug', $slug)->first();

        if ($page) {
            $page->content = null;
            $page->save();
        }

        return back()->with('status', 'reset');
    }

    public function destroy(string $slug): RedirectResponse
    {
        SitePage::query()->where('slug', $slug)->delete();

        return back()->with('status', 'deleted');
    }
}
