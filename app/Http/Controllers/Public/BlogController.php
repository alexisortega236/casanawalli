<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(string $locale): View
    {
        app()->setLocale($locale);

        return view('public.blog.index', [
            'posts' => BlogPost::query()
                ->where('is_active', true)
                ->orderByDesc('published_at')
                ->orderBy('sort_order')
                ->get(),
        ]);
    }

    public function show(string $locale, string $slug): View
    {
        app()->setLocale($locale);

        return view('public.blog.show', [
            'post' => BlogPost::query()
                ->where('is_active', true)
                ->where('slug', $slug)
                ->firstOrFail(),
        ]);
    }
}
