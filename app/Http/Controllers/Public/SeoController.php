<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Experience;
use App\Models\Room;
use Illuminate\Http\Response;

class SeoController extends Controller
{
    public function sitemap(): Response
    {
        $locales = ['en', 'es'];
        $staticRoutes = [
            'public.home',
            'public.suites.index',
            'public.experiences.index',
            'public.packages.index',
            'public.plaza',
            'public.gallery',
            'public.about',
            'public.blog.index',
            'public.faq',
            'public.contact',
            'public.privacy',
        ];

        $urls = [];

        foreach ($locales as $locale) {
            foreach ($staticRoutes as $route) {
                $urls[] = route($route, ['locale' => $locale]);
            }

            Room::query()->where('is_active', true)->pluck('slug')->each(
                fn (string $slug) => $urls[] = route('public.suites.show', ['locale' => $locale, 'slug' => $slug])
            );

            Experience::query()->where('is_active', true)->pluck('slug')->each(
                fn (string $slug) => $urls[] = route('public.experiences.show', ['locale' => $locale, 'slug' => $slug])
            );

            BlogPost::query()->where('is_active', true)->pluck('slug')->each(
                fn (string $slug) => $urls[] = route('public.blog.show', ['locale' => $locale, 'slug' => $slug])
            );
        }

        return response()
            ->view('public.seo.sitemap', ['urls' => array_unique($urls)])
            ->header('Content-Type', 'application/xml');
    }

    public function robots(): Response
    {
        $content = implode("\n", [
            'User-agent: *',
            'Allow: /',
            'Disallow: /admin',
            'Sitemap: '.url('/sitemap.xml'),
            '',
        ]);

        return response($content, 200)->header('Content-Type', 'text/plain');
    }
}
