@extends('layouts.public')

@section('title', 'About | Casa Nawalli')

@section('content')
    <section class="botanical-paper px-5 py-24 lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-12 lg:grid-cols-[0.8fr_1.2fr]">
            <p class="editorial-eyebrow">About</p>
            <div>
                <h1 class="font-serif text-5xl leading-tight md:text-7xl">A family-owned adults-only boutique hotel in a living tropical garden.</h1>
                <p class="mt-8 text-lg leading-8 text-nawalli-navy/75">Casa Nawalli is presented on the current site as a family owned and operated adults-only boutique hotel with high standards in comfort, security and convenience while preserving a relaxed Sayulita pueblo feeling.</p>
            </div>
        </div>
    </section>
    <section class="px-5 py-20 lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-12 lg:grid-cols-2">
            <img class="aspect-[4/5] w-full object-cover" src="{{ asset('assets/current-site/flower-cover.webp') }}" alt="Casa Nawalli flowers" loading="lazy">
            <div class="self-center">
                <p class="editorial-eyebrow">Nawalli</p>
                <h2 class="mt-3 font-serif text-4xl md:text-5xl">A name rooted in transformation, rain and flowers.</h2>
                <p class="mt-6 text-lg leading-8 text-nawalli-navy/75">The public site explains Nawalli through Nahual, a being who transforms into elements of nature to learn from her, and Tate Naaliwa, Wirarika goddess of rain and mother of all flowers.</p>
            </div>
        </div>
    </section>
@endsection
