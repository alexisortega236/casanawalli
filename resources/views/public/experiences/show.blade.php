@inject('copy', 'App\Services\Localization\LocalizedContent')
@extends('layouts.public')

@section('title', $copy->get($experience, 'name') . ' | Casa Nawalli')
@section('meta_description', $copy->get($experience, 'seo_description') ?: str($copy->get($experience, 'description'))->limit(150))

@section('content')
    <section class="grid min-h-[70vh] lg:grid-cols-2">
        <div class="px-5 py-16 lg:px-16 lg:py-24">
            <p class="editorial-eyebrow">{{ $copy->get($experience, 'subtitle') }}</p>
            <h1 class="mt-4 font-serif text-5xl md:text-7xl">{{ $copy->get($experience, 'name') }}</h1>
            <p class="mt-7 text-lg leading-8 text-nawalli-navy/75">{{ $copy->get($experience, 'description') }}</p>
            <div class="mt-8 flex flex-wrap gap-4">
                <a href="{{ route('public.availability', ['locale' => app()->getLocale()]) }}" class="bg-nawalli-navy px-7 py-4 font-bold text-white">Request availability</a>
                @if ($experience->external_url)
                    <a href="{{ $experience->external_url }}" target="_blank" rel="noopener" class="border border-nawalli-navy px-7 py-4 font-bold text-nawalli-navy">{{ $copy->get($experience, 'cta_label') ?: 'Visit' }}</a>
                @endif
            </div>
        </div>
        <img class="h-full min-h-[420px] w-full object-cover" src="{{ $experience->image }}" alt="{{ $copy->get($experience, 'name') }}">
    </section>
@endsection
