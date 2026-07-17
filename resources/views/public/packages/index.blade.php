@inject('copy', 'App\Services\Localization\LocalizedContent')
@extends('layouts.public')

@section('title', 'Packages | Casa Nawalli')

@section('content')
    <section class="bg-nawalli-sand px-5 py-20 lg:px-8">
        <div class="mx-auto max-w-5xl">
            <p class="editorial-eyebrow">Packages</p>
            <h1 class="mt-3 font-serif text-5xl md:text-7xl">Packages without invented prices or promises.</h1>
            <p class="mt-6 text-lg text-nawalli-navy/70">These records preserve package signals from the current site. Details remain clearly marked when the public source does not publish them.</p>
        </div>
    </section>
    <section class="px-5 py-16 lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-8 md:grid-cols-2">
            @foreach ($packages as $package)
                <article class="grid border border-nawalli-sand bg-white md:grid-cols-[0.8fr_1.2fr]">
                    <img class="h-full min-h-72 w-full object-cover" src="{{ $package->image }}" alt="{{ $copy->get($package, 'name') }}" loading="lazy">
                    <div class="p-7">
                        <h2 class="font-serif text-3xl">{{ $copy->get($package, 'name') }}</h2>
                        <p class="mt-4 leading-7 text-nawalli-navy/70">{{ $copy->get($package, 'description') }}</p>
                        <p class="mt-5 border-l-2 border-nawalli-gold pl-4 text-sm font-semibold text-nawalli-green">{{ $copy->get($package, 'price_note') }}</p>
                        <a class="mt-7 inline-block bg-nawalli-navy px-6 py-3 font-bold text-white" href="{{ $package->external_url ?: route('public.availability', ['locale' => app()->getLocale()]) }}">{{ $copy->get($package, 'cta_label') ?: 'Request availability' }}</a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endsection
