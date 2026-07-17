<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Public\StoreAvailabilityRequest;
use App\Models\Experience;
use App\Models\GalleryImage;
use App\Models\Room;
use App\Models\SiteSetting;
use App\Services\Booking\BookingProviderInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(string $locale): View
    {
        app()->setLocale($locale);

        return view('public.home', [
            'featuredRooms' => Room::query()
                ->with('category')
                ->where('is_active', true)
                ->where('is_featured', true)
                ->orderBy('sort_order')
                ->take(4)
                ->get(),
            'featuredExperiences' => Experience::query()
                ->where('is_active', true)
                ->where('is_featured', true)
                ->orderBy('sort_order')
                ->take(4)
                ->get(),
            'featuredImages' => GalleryImage::query()
                ->where('is_active', true)
                ->where('is_featured', true)
                ->orderBy('sort_order')
                ->take(4)
                ->get(),
            'settings' => SiteSetting::query()->pluck('value', 'key'),
        ]);
    }

    public function availability(string $locale, Request $request): View
    {
        app()->setLocale($locale);

        return view('public.availability', [
            'rooms' => Room::query()->where('is_active', true)->orderBy('sort_order')->get(),
            'selectedRoom' => Room::query()->where('slug', $request->query('room'))->first(),
        ]);
    }

    public function storeAvailability(
        string $locale,
        StoreAvailabilityRequest $request,
        BookingProviderInterface $bookingProvider
    ): RedirectResponse {
        app()->setLocale($locale);

        $bookingProvider->createInquiry([
            ...$request->validated(),
            'locale' => $locale,
            'status' => 'new',
        ]);

        return redirect()
            ->route('public.availability', ['locale' => $locale])
            ->with('status', $locale === 'es'
                ? 'Gracias. Recibimos tu solicitud y Casa Nawalli la revisara manualmente.'
                : 'Thank you. Your request was received and Casa Nawalli will review it manually.');
    }
}
