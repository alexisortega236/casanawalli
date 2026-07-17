@inject('copy', 'App\Services\Localization\LocalizedContent')
@extends('layouts.public')

@section('title', 'Blog | Casa Nawalli')

@section('content')
    <section class="bg-nawalli-sand px-5 py-20 lg:px-8">
        <div class="mx-auto max-w-5xl">
            <p class="editorial-eyebrow">Blog</p>
            <h1 class="mt-3 font-serif text-5xl md:text-7xl">Notes from Sayulita.</h1>
        </div>
    </section>
    <section class="px-5 py-16 lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-8 md:grid-cols-3">
            @foreach ($posts as $post)
                <article class="border border-nawalli-sand bg-white">
                    <img class="aspect-[4/3] w-full object-cover" src="{{ $post->featured_image }}" alt="{{ $copy->get($post, 'title') }}" loading="lazy">
                    <div class="p-6">
                        <p class="text-xs font-bold uppercase tracking-[0.16em] text-nawalli-green">{{ $post->published_at?->format('M j, Y') }}</p>
                        <h2 class="mt-3 font-serif text-3xl">{{ $copy->get($post, 'title') }}</h2>
                        <p class="mt-4 text-sm leading-6 text-nawalli-navy/70">{{ $copy->get($post, 'excerpt') }}</p>
                        <a class="mt-6 inline-block font-bold text-nawalli-turquoise" href="{{ route('public.blog.show', ['locale' => app()->getLocale(), 'slug' => $post->slug]) }}">Read</a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endsection
