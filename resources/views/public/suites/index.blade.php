@inject('copy', 'App\Services\Localization\LocalizedContent')
@extends('layouts.public')

@section('title', 'Suites | Casa Nawalli')

@section('content')
    <section class="bg-nawalli-sand px-5 py-20 lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[0.9fr_1.1fr]">
            <p class="editorial-eyebrow">Suites</p>
            <div>
                <h1 class="font-serif text-5xl leading-tight md:text-7xl">Compare quiet rooms shaped by garden, craft and comfort.</h1>
                <p class="mt-6 max-w-3xl text-lg leading-8 text-nawalli-navy/70">Each room keeps its own mood: garden terraces, handcrafted interiors, main house rooms and intimate details from the current Casa Nawalli property.</p>
            </div>
        </div>
    </section>
    <section class="px-5 py-16 lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($rooms as $room)
                <article class="group border border-nawalli-sand bg-white">
                    <div class="aspect-[4/3] overflow-hidden bg-nawalli-sand">
                        <img class="h-full w-full object-cover transition duration-500 group-hover:scale-[1.03]" src="{{ $room->featured_image }}" alt="{{ $copy->get($room, 'name') }}" loading="lazy">
                    </div>
                    <div class="p-6 lg:p-7">
                        <p class="text-xs font-bold uppercase tracking-[0.16em] text-nawalli-green">{{ $copy->get($room, 'subtitle') }}</p>
                        <h2 class="mt-2 font-serif text-3xl">{{ $copy->get($room, 'name') }}</h2>
                        <p class="mt-4 min-h-24 text-sm leading-6 text-nawalli-navy/70">{{ str($copy->get($room, 'description'))->limit(170) }}</p>
                        <dl class="mt-5 grid grid-cols-2 gap-3 border-y border-nawalli-sand py-4 text-sm">
                            <div><dt class="font-bold text-nawalli-navy">Guests</dt><dd class="text-nawalli-navy/70">{{ $room->capacity }}</dd></div>
                            <div><dt class="font-bold text-nawalli-navy">Bed</dt><dd class="text-nawalli-navy/70">{{ $room->bed_type }}</dd></div>
                        </dl>
                        <a class="mt-6 inline-block font-bold text-nawalli-turquoise" href="{{ route('public.suites.show', ['locale' => app()->getLocale(), 'slug' => $room->slug]) }}">View suite</a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="bg-nawalli-navy px-5 py-16 text-white lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-8 md:grid-cols-3">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.2em] text-nawalli-aqua">Stay notes</p>
                <h2 class="mt-3 font-serif text-4xl">Clear basics before choosing.</h2>
            </div>
            <p class="text-white/75">Casa Nawalli is adults-only and designed for a slower, quieter stay close to Sayulita's beach and local restaurants.</p>
            <p class="text-white/75">Published room pages mention continental breakfast, filtered water, Wi-Fi, safety box and access to the salt water pool among the core facilities.</p>
        </div>
    </section>
@endsection
