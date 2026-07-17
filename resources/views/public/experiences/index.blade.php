@inject('copy', 'App\Services\Localization\LocalizedContent')
@extends('layouts.public')

@section('title', 'Experiences | Casa Nawalli')
@section('meta_description', 'Amenities, wellness, gardens, gastronomy and local experiences connected to Casa Nawalli.')

@section('content')
    <section class="bg-nawalli-sand px-5 py-20 lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[0.9fr_1.1fr]">
            <p class="editorial-eyebrow">Experiences</p>
            <div>
                <h1 class="font-serif text-5xl leading-tight md:text-7xl">A slower stay shaped by gardens, water and local life.</h1>
                <p class="mt-6 max-w-3xl text-lg leading-8 text-nawalli-navy/70">This page normalizes the current public services and linked experiences from Casa Nawalli without inventing rates or availability.</p>
            </div>
        </div>
    </section>

    <section class="px-5 py-16 lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($experiences as $experience)
                <article class="border border-nawalli-sand bg-white">
                    <img class="aspect-[4/3] w-full object-cover" src="{{ $experience->image }}" alt="{{ $copy->get($experience, 'name') }}" loading="lazy">
                    <div class="p-6">
                        <p class="text-xs font-bold uppercase tracking-[0.16em] text-nawalli-green">{{ $copy->get($experience, 'subtitle') }}</p>
                        <h2 class="mt-2 font-serif text-3xl">{{ $copy->get($experience, 'name') }}</h2>
                        <p class="mt-4 text-sm leading-6 text-nawalli-navy/70">{{ str($copy->get($experience, 'description'))->limit(180) }}</p>
                        <div class="mt-6 flex flex-wrap gap-4">
                            <a class="font-bold text-nawalli-turquoise" href="{{ route('public.experiences.show', ['locale' => app()->getLocale(), 'slug' => $experience->slug]) }}">Explore</a>
                            @if ($experience->external_url)
                                <a class="font-bold text-nawalli-green" href="{{ $experience->external_url }}" target="_blank" rel="noopener">{{ $copy->get($experience, 'cta_label') ?: 'Visit' }}</a>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    @if ($packages->isNotEmpty())
        <section class="bg-nawalli-navy px-5 py-16 text-white lg:px-8">
            <div class="mx-auto flex max-w-7xl flex-col justify-between gap-6 md:flex-row md:items-end">
                <div>
                    <p class="text-sm font-bold uppercase tracking-[0.2em] text-nawalli-aqua">Packages</p>
                    <h2 class="mt-3 font-serif text-4xl">Packages preserved from the current site structure.</h2>
                </div>
                <a class="font-bold text-nawalli-aqua" href="{{ route('public.packages.index', ['locale' => app()->getLocale()]) }}">View packages</a>
            </div>
        </section>
    @endif
@endsection
