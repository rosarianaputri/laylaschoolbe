<?php

namespace App\Http\Controllers;

use App\Models\SitePage;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    private function normalizeContentAssets(?string $html): ?string
    {
        if (!$html) {
            return $html;
        }

        $baseUrl = rtrim(url('/'), '/');

        $replaceAttr = function (string $attr) use ($baseUrl, $html): string {
            $pattern = '/\b' . preg_quote($attr, '/') . '\s*=\s*(["\"])\s*([^"\"]+)\s*\1/i';

            return preg_replace_callback($pattern, function (array $m) use ($baseUrl) {
                $quote = $m[1];
                $value = trim($m[2]);

                $lower = Str::lower($value);
                $isAbsolute = Str::startsWith($lower, [
                    'http://',
                    'https://',
                    'data:',
                    'mailto:',
                    'tel:',
                    '#',
                ]);

                if ($isAbsolute) {
                    return $m[0];
                }

                // Normalize common relative asset paths.
                $normalized = $value;
                if (Str::startsWith($normalized, './')) {
                    $normalized = substr($normalized, 2);
                }
                if (!Str::startsWith($normalized, '/')) {
                    $normalized = '/' . $normalized;
                }

                // Only rewrite known public paths.
                if (!Str::startsWith($normalized, ['/images/', '/css/', '/js/', '/assets/', '/storage/'])) {
                    return $m[0];
                }

                return $attr . '=' . $quote . $baseUrl . $normalized . $quote;
            }, $html) ?? $html;
        };

        $html = $replaceAttr('src');
        $html = $replaceAttr('href');

        return $html;
    }

    public function page(string $slug)
    {
        $view = match ($slug) {
            'home' => 'frontend.home',
            'about' => 'frontend.about',
            'academic' => 'frontend.academic',
            'facilities' => 'frontend.facilities',
            'student-life' => 'frontend.student-life',
            'information' => 'frontend.information',
            'contact' => 'frontend.contact',
            default => abort(404),
        };

        $page = SitePage::query()->where('slug', $slug)->first();
        $pageContent = $this->normalizeContentAssets($page?->content);

        $homeData = null;
        if ($slug === 'home') {
            $raw = SiteSetting::getValue('home_page');
            $data = $raw ? json_decode($raw, true) : null;
            $data = is_array($data) ? $data : null;

            if ($data) {
                $toUrl = function (?string $path): ?string {
                    if (!$path) {
                        return null;
                    }

                    $lower = Str::lower($path);
                    if (Str::startsWith($lower, ['http://', 'https://', '/'])) {
                        return $path;
                    }

                    return Storage::url($path);
                };

                if (!empty($data['hero']['image'])) {
                    $data['hero']['image_url'] = $toUrl($data['hero']['image']);
                }
                if (!empty($data['principal']['image'])) {
                    $data['principal']['image_url'] = $toUrl($data['principal']['image']);
                }

                if (!empty($data['news']['items']) && is_array($data['news']['items'])) {
                    foreach ($data['news']['items'] as $i => $item) {
                        if (!is_array($item)) {
                            continue;
                        }
                        if (!empty($item['image'])) {
                            $data['news']['items'][$i]['image_url'] = $toUrl($item['image']);
                        }
                    }
                }

                $homeData = $data;
            }
        }

        $aboutData = null;
        if ($slug === 'about') {
            $raw = SiteSetting::getValue('about_page');
            $data = $raw ? json_decode($raw, true) : null;
            $data = is_array($data) ? $data : null;

            if ($data) {
                $toUrl = function (?string $path): ?string {
                    if (!$path) {
                        return null;
                    }

                    $lower = Str::lower($path);
                    if (Str::startsWith($lower, ['http://', 'https://', '/'])) {
                        return $path;
                    }

                    return Storage::url($path);
                };

                if (!empty($data['principal']['image'])) {
                    $data['principal']['image_url'] = $toUrl($data['principal']['image']);
                }
                if (!empty($data['history']['image'])) {
                    $data['history']['image_url'] = $toUrl($data['history']['image']);
                }

                if (!empty($data['org']['members']) && is_array($data['org']['members'])) {
                    foreach ($data['org']['members'] as $i => $member) {
                        if (!is_array($member)) {
                            continue;
                        }
                        if (!empty($member['image'])) {
                            $data['org']['members'][$i]['image_url'] = $toUrl($member['image']);
                        }
                    }
                }

                $aboutData = $data;
            }
        }

        $academicData = null;
        if ($slug === 'academic') {
            $raw = SiteSetting::getValue('academic_page');
            $data = $raw ? json_decode($raw, true) : null;
            $data = is_array($data) ? $data : null;

            if ($data) {
                $toUrl = function (?string $path): ?string {
                    if (!$path) {
                        return null;
                    }

                    $lower = Str::lower($path);
                    if (Str::startsWith($lower, ['http://', 'https://', '/'])) {
                        return $path;
                    }

                    return Storage::url($path);
                };

                if (!empty($data['curriculum']['items']) && is_array($data['curriculum']['items'])) {
                    foreach ($data['curriculum']['items'] as $i => $item) {
                        if (!is_array($item)) {
                            continue;
                        }
                        if (!empty($item['image'])) {
                            $data['curriculum']['items'][$i]['image_url'] = $toUrl($item['image']);
                        }
                    }
                }

                if (!empty($data['faculty']['members']) && is_array($data['faculty']['members'])) {
                    foreach ($data['faculty']['members'] as $i => $member) {
                        if (!is_array($member)) {
                            continue;
                        }
                        if (!empty($member['image'])) {
                            $data['faculty']['members'][$i]['image_url'] = $toUrl($member['image']);
                        }
                    }
                }

                $academicData = $data;
            }
        }

        $facilitiesData = null;
        if ($slug === 'facilities') {
            $raw = SiteSetting::getValue('facilities_page');
            $data = $raw ? json_decode($raw, true) : null;
            $data = is_array($data) ? $data : null;

            if ($data) {
                $toUrl = function (?string $path): ?string {
                    if (!$path) {
                        return null;
                    }

                    $lower = Str::lower($path);
                    if (Str::startsWith($lower, ['http://', 'https://', '/'])) {
                        return $path;
                    }

                    return Storage::url($path);
                };

                if (!empty($data['sections']) && is_array($data['sections'])) {
                    foreach ($data['sections'] as $i => $section) {
                        if (!is_array($section)) {
                            continue;
                        }
                        if (!empty($section['image'])) {
                            $data['sections'][$i]['image_url'] = $toUrl($section['image']);
                        }
                    }
                }

                $facilitiesData = $data;
            }
        }

        $studentLifeData = null;
        if ($slug === 'student-life') {
            $raw = SiteSetting::getValue('student_life_page');
            $data = $raw ? json_decode($raw, true) : null;
            $data = is_array($data) ? $data : null;

            if ($data) {
                $toUrl = function (?string $path): ?string {
                    if (!$path) {
                        return null;
                    }

                    $lower = Str::lower($path);
                    if (Str::startsWith($lower, ['http://', 'https://', '/'])) {
                        return $path;
                    }

                    return Storage::url($path);
                };

                if (!empty($data['extracurricular']['items']) && is_array($data['extracurricular']['items'])) {
                    foreach ($data['extracurricular']['items'] as $i => $item) {
                        if (!is_array($item)) {
                            continue;
                        }
                        if (!empty($item['image'])) {
                            $data['extracurricular']['items'][$i]['image_url'] = $toUrl($item['image']);
                        }
                    }
                }

                if (!empty($data['achievements']['items']) && is_array($data['achievements']['items'])) {
                    foreach ($data['achievements']['items'] as $i => $item) {
                        if (!is_array($item)) {
                            continue;
                        }
                        if (!empty($item['image'])) {
                            $data['achievements']['items'][$i]['image_url'] = $toUrl($item['image']);
                        }
                    }
                }

                if (!empty($data['gallery']['image'])) {
                    $data['gallery']['image_url'] = $toUrl($data['gallery']['image']);
                }

                $studentLifeData = $data;
            }
        }

        // Load Information structured data
        $informationData = null;
        if ($slug === 'information') {
            $raw = SiteSetting::getValue('information_page');
            if ($raw) {
                $data = json_decode($raw, true);
                if (is_array($data)) {
                    $informationData = $data;
                }
            }
        }

        // Load Contact structured data
        $contactData = null;
        if ($slug === 'contact') {
            $raw = SiteSetting::getValue('contact_page');
            if ($raw) {
                $data = json_decode($raw, true);
                if (is_array($data)) {
                    $contactData = $data;
                }
            }
        }

        return view($view, [
            'page' => $page,
            'pageContent' => $pageContent,
            'homeData' => $homeData,
            'aboutData' => $aboutData,
            'academicData' => $academicData,
            'facilitiesData' => $facilitiesData,
            'studentLifeData' => $studentLifeData,
            'informationData' => $informationData,
            'contactData' => $contactData,
        ]);
    }
}
