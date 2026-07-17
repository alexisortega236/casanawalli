@inject('copy', 'App\Services\Localization\LocalizedContent')
@extends('layouts.public')

@section('title', 'Suites | Casa Nawalli')

@section('content')
    <section class="bg-nawalli-sand px-5 py-20 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <p class="editorial-eyebrow">Suites</p>
            <h1 class="mt-3 max-w-4xl font-serif text-5xl md:text-7xl">Compare quiet rooms shaped by garden, craft and comfort.</h1>
        </div>
    </section>
    <section class="px-5 py-16 lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($rooms as $room)
                <article class="border border-nawalli-sand bg-white">
                    <img class="aspect-[4/3] w-full object-cover" src="{{ $room->featured_image }}" alt="{{ $copy->get($room, 'name') }}" loading="lazy">
                    <div class="p-6">
                        <p class="text-xs font-bold uppercase tracking-[0.16em] text-nawalli-green">{{ $copy->get($room, 'subtitle') }}</p>
                        <h2 class="mt-2 font-serif text-3xl">{{ $copy->get($room, 'name') }}</h2>
                        <p class="mt-4 text-sm leading-6 text-nawalli-navy/70">{{ str($copy->get($room, 'description'))->limit(150) }}</p>
                        <dl class="mt-5 grid grid-cols-2 gap-3 text-sm">
                            <div><dt class="font-bold">Guests</dt><dd>{{ $room->capacity }}</dd></div>
                            <div><dt class="font-bold">Bed</dt><dd>{{ $room->bed_type }}</dd></div>
                        </dl>
                        <a class="mt-6 inline-block font-bold text-nawalli-turquoise" href="{{ route('public.suites.show', ['locale' => app()->getLocale(), 'slug' => $room->slug]) }}">View suite</a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endsection
