@inject('copy', 'App\Services\Localization\LocalizedContent')
@extends('layouts.public')

@section('title', $copy->get($room, 'name') . ' | Casa Nawalli')
@section('meta_description', $copy->get($room, 'seo_description') ?: str($copy->get($room, 'description'))->limit(150))

@section('content')
    <section class="grid min-h-[70vh] lg:grid-cols-2">
        <div class="px-5 py-16 lg:px-16 lg:py-24">
            <p class="editorial-eyebrow">{{ $copy->get($room, 'subtitle') }}</p>
            <h1 class="mt-4 font-serif text-5xl md:text-7xl">{{ $copy->get($room, 'name') }}</h1>
            <p class="mt-7 text-lg leading-8 text-nawalli-navy/75">{{ $copy->get($room, 'description') }}</p>
            <dl class="mt-8 grid grid-cols-2 gap-5 border-y border-nawalli-sand py-6 text-sm">
                <div><dt class="font-bold">Guests</dt><dd>{{ $room->capacity }}</dd></div>
                <div><dt class="font-bold">Bed</dt><dd>{{ $room->bed_type }}</dd></div>
                <div><dt class="font-bold">Type</dt><dd>{{ $room->room_type }}</dd></div>
                <div><dt class="font-bold">Location</dt><dd>{{ $room->location_description }}</dd></div>
            </dl>
            <a href="{{ route('public.availability', ['locale' => app()->getLocale(), 'room' => $room->slug]) }}" class="mt-8 inline-block bg-nawalli-navy px-7 py-4 font-bold text-white">Check availability</a>
        </div>
        <img class="h-full min-h-[420px] w-full object-cover" src="{{ $room->featured_image }}" alt="{{ $copy->get($room, 'name') }}">
    </section>

    <section class="bg-nawalli-sand px-5 py-16 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <h2 class="font-serif text-4xl">Facilities</h2>
            <div class="mt-8 grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($room->amenities as $amenity)
                    <p class="border-l-2 border-nawalli-gold bg-nawalli-ivory px-4 py-3 text-sm font-semibold">{{ $copy->get($amenity, 'name') }}</p>
                @endforeach
            </div>
        </div>
    </section>
@endsection
