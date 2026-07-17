@inject('copy', 'App\Services\Localization\LocalizedContent')
@extends('layouts.public')

@section('title', 'Casa Nawalli | Adults-only boutique hotel in Sayulita')
@section('meta_description', 'Casa Nawalli is a family-owned adults-only boutique hotel and living tropical garden one block from the sea in Sayulita.')

@section('content')
    <section class="image-wash min-h-[calc(100vh-73px)]" style="--image-url: url('{{ asset('assets/current-site/hero-garden-pool.webp') }}')">
        <div class="mx-auto flex min-h-[calc(100vh-73px)] max-w-7xl items-end px-5 pb-16 lg:px-8">
            <div class="max-w-3xl text-white">
                <p class="text-sm font-bold uppercase tracking-[0.2em]">Adults-only boutique hotel</p>
                <h1 class="mt-5 font-serif text-5xl leading-tight md:text-7xl">A hidden garden, one block from the sea.</h1>
                <p class="mt-6 max-w-2xl text-lg text-white/85">Casa Nawalli is a family-owned refuge in Sayulita where tropical gardens, handcrafted design and quiet hospitality shape a slower stay.</p>
                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('public.availability', ['locale' => app()->getLocale()]) }}" class="bg-nawalli-turquoise px-6 py-4 text-center font-bold text-nawalli-navy">Check availability</a>
                    <a href="{{ route('public.suites.index', ['locale' => app()->getLocale()]) }}" class="border border-white px-6 py-4 text-center font-bold text-white">Explore suites</a>
                </div>
            </div>
        </div>
    </section>

    <section class="botanical-paper px-5 py-24 lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-12 lg:grid-cols-[0.8fr_1.2fr]">
            <p class="editorial-eyebrow">A living garden by the sea</p>
            <div>
                <h2 class="font-serif text-4xl leading-tight md:text-6xl">An intimate Sayulita stay shaped by nature, craft and family hospitality.</h2>
                <p class="mt-8 max-w-3xl text-lg leading-8 text-nawalli-navy/75">Casa Nawalli preserves the relaxed rhythm of a coastal pueblo while offering comfort, security and carefully designed rooms. The property sits on Sayulita's north side, close to the beach and away from the busiest plaza noise.</p>
            </div>
        </div>
    </section>

    <section class="px-5 py-20 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
                <div>
                    <p class="editorial-eyebrow">Suites</p>
                    <h2 class="mt-3 font-serif text-4xl md:text-5xl">Rooms with their own garden rhythm.</h2>
                </div>
                <a href="{{ route('public.suites.index', ['locale' => app()->getLocale()]) }}" class="font-bold text-nawalli-turquoise">View all suites</a>
            </div>
            <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($featuredRooms as $room)
                    <a href="{{ route('public.suites.show', ['locale' => app()->getLocale(), 'slug' => $room->slug]) }}" class="group border border-nawalli-sand bg-white">
                        <div class="aspect-[4/5] bg-nawalli-sand">
                            <img class="h-full w-full object-cover" src="{{ $room->featured_image }}" alt="{{ $copy->get($room, 'name') }}" loading="lazy">
                        </div>
                        <div class="p-5">
                            <p class="text-xs font-bold uppercase tracking-[0.16em] text-nawalli-green">{{ $copy->get($room, 'subtitle') }}</p>
                            <h3 class="mt-2 font-serif text-2xl group-hover:text-nawalli-turquoise">{{ $copy->get($room, 'name') }}</h3>
                            <p class="mt-3 text-sm text-nawalli-navy/70">{{ $room->bed_type }} · {{ $room->room_type }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-nawalli-sand px-5 py-24 lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-3">
            <div>
                <p class="editorial-eyebrow">Experiences</p>
                <h2 class="mt-3 font-serif text-4xl">Wellness, breakfast, gardens and local culture.</h2>
            </div>
            <div class="lg:col-span-2 grid gap-6 md:grid-cols-2">
                @foreach (['Heated salt water pool', 'Edible tropical gardens', 'Main house living room', 'Responsible travel practices'] as $experience)
                    <article class="border-l-2 border-nawalli-gold bg-nawalli-ivory p-7">
                        <h3 class="font-serif text-2xl">{{ $experience }}</h3>
                        <p class="mt-4 text-nawalli-navy/70">Demo content from the current public site, ready to be edited in later phases.</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="px-5 py-24 lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-12 lg:grid-cols-[1.1fr_0.9fr]">
            <div>
                <p class="editorial-eyebrow">Nawalli</p>
                <h2 class="mt-3 font-serif text-4xl md:text-5xl">Named for transformation, rain and flowers.</h2>
                <p class="mt-7 text-lg leading-8 text-nawalli-navy/75">The name draws from Nahual, the being who transforms into elements of nature to learn from her, and Tate Naaliwa, Wirarika goddess of rain and mother of all flowers. Casa Nawalli turns that origin into a living garden for guests.</p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <img class="aspect-[3/4] w-full object-cover" src="{{ asset('assets/current-site/lifestyle-garden.webp') }}" alt="Casa Nawalli tropical garden" loading="lazy">
                <img class="mt-12 aspect-[3/4] w-full object-cover" src="{{ asset('assets/current-site/flower-cover.webp') }}" alt="Casa Nawalli floral pattern" loading="lazy">
            </div>
        </div>
    </section>

    <section class="bg-nawalli-green px-5 py-20 text-white lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-10 md:grid-cols-[1fr_1.2fr] md:items-center">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.2em] text-nawalli-aqua">Plaza Nawalli</p>
                <h2 class="mt-3 font-serif text-4xl">A small local plaza connected to the Casa Nawalli experience.</h2>
            </div>
            <p class="text-lg leading-8 text-white/80">This section is prepared for the dedicated Plaza Nawalli module: businesses, food, wellness, pickleball and local services will be managed from the admin panel in later phases.</p>
        </div>
    </section>

    <section class="px-5 py-24 text-center lg:px-8">
        <p class="editorial-eyebrow">Sayulita, Nayarit</p>
        <h2 class="mx-auto mt-3 max-w-4xl font-serif text-4xl md:text-6xl">Close to the beach, calm enough to feel hidden.</h2>
        <p class="mx-auto mt-6 max-w-2xl text-lg text-nawalli-navy/70">Miramar #13. Sayulita, Mexico. One block from the sea and close to restaurants and local services.</p>
        <a href="{{ route('public.availability', ['locale' => app()->getLocale()]) }}" class="mt-10 inline-block bg-nawalli-navy px-7 py-4 font-bold text-white">Plan your stay</a>
    </section>
@endsection
