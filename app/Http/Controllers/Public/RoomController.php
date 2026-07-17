<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\View\View;

class RoomController extends Controller
{
    public function index(string $locale): View
    {
        app()->setLocale($locale);

        return view('public.suites.index', [
            'rooms' => Room::query()
                ->with(['category', 'amenities'])
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->get(),
        ]);
    }

    public function show(string $locale, string $slug): View
    {
        app()->setLocale($locale);

        return view('public.suites.show', [
            'room' => Room::query()
                ->with(['category', 'images', 'amenities'])
                ->where('is_active', true)
                ->where('slug', $slug)
                ->firstOrFail(),
        ]);
    }
}
