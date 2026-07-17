@inject('copy', 'App\Services\Localization\LocalizedContent')
@extends('layouts.public')

@section('title', 'Plaza Nawalli | Casa Nawalli')
@section('meta_description', 'Plaza Nawalli gathers food, wellness, boutiques and local businesses connected to Casa Nawalli.')

@section('content')
    <section class="image-wash min-h-[62vh]" style="--image-url: url('https://nawallisayulita.com/wp-content/uploads/2023/08/background-palmer-nawalli-2.webp')">
        <div class="mx-auto flex min-h-[62vh] max-w-7xl items-end px-5 pb-14 text-white lg:px-8">
            <div class="max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.2em] text-nawalli-aqua">Plaza Nawalli</p>
                <h1 class="mt-4 font-serif text-5xl md:text-7xl">A local plaza woven into the Casa Nawalli stay.</h1>
            </div>
        </div>
    </section>
    <section class="px-5 py-16 lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($businesses as $business)
                <article class="border-l-2 border-nawalli-gold bg-nawalli-sand p-7">
                    <p class="text-xs font-bold uppercase tracking-[0.16em] text-nawalli-green">{{ $business->category }}</p>
                    <h2 class="mt-2 font-serif text-3xl">{{ $business->name }}</h2>
                    <p class="mt-4 text-sm leading-6 text-nawalli-navy/70">{{ $copy->get($business, 'description') }}</p>
                    @if ($business->instagram_url)
                        <a class="mt-6 inline-block font-bold text-nawalli-turquoise" href="{{ $business->instagram_url }}" target="_blank" rel="noopener">Instagram</a>
                    @endif
                </article>
            @endforeach
        </div>
    </section>
@endsection
