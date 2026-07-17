<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Models\Package;
use Illuminate\View\View;

class ExperienceController extends Controller
{
    public function index(string $locale): View
    {
        app()->setLocale($locale);

        return view('public.experiences.index', [
            'experiences' => Experience::query()->where('is_active', true)->orderBy('sort_order')->get(),
            'packages' => Package::query()->where('is_active', true)->orderBy('sort_order')->get(),
        ]);
    }

    public function show(string $locale, string $slug): View
    {
        app()->setLocale($locale);

        return view('public.experiences.show', [
            'experience' => Experience::query()->where('is_active', true)->where('slug', $slug)->firstOrFail(),
        ]);
    }

    public function packages(string $locale): View
    {
        app()->setLocale($locale);

        return view('public.packages.index', [
            'packages' => Package::query()->where('is_active', true)->orderBy('sort_order')->get(),
        ]);
    }
}
