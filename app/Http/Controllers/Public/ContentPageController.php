<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\GalleryImage;
use App\Models\PlazaBusiness;
use App\Models\Room;
use App\Models\SiteSetting;
use Illuminate\View\View;

class ContentPageController extends Controller
{
    public function plaza(string $locale): View
    {
        app()->setLocale($locale);

        return view('public.plaza.index', [
            'businesses' => PlazaBusiness::query()->where('is_active', true)->orderBy('sort_order')->get(),
        ]);
    }

    public function gallery(string $locale): View
    {
        app()->setLocale($locale);

        return view('public.gallery.index', [
            'images' => GalleryImage::query()->where('is_active', true)->orderBy('sort_order')->get(),
        ]);
    }

    public function about(string $locale): View
    {
        app()->setLocale($locale);

        return view('public.about');
    }

    public function faq(string $locale): View
    {
        app()->setLocale($locale);

        return view('public.faq.index', [
            'faqs' => Faq::query()->where('is_active', true)->orderBy('sort_order')->get(),
        ]);
    }

    public function contact(string $locale): View
    {
        app()->setLocale($locale);

        return view('public.contact', [
            'settings' => SiteSetting::query()->pluck('value', 'key'),
            'rooms' => Room::query()->where('is_active', true)->orderBy('sort_order')->get(),
        ]);
    }

    public function privacy(string $locale): View
    {
        app()->setLocale($locale);

        return view('public.privacy');
    }
}
