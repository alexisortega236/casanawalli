@inject('copy', 'App\Services\Localization\LocalizedContent')
@extends('layouts.public')

@section('title', $copy->get($post, 'title') . ' | Casa Nawalli')
@section('meta_description', $copy->get($post, 'seo_description') ?: $copy->get($post, 'excerpt'))

@section('content')
    <article>
        <section class="bg-nawalli-sand px-5 py-20 lg:px-8">
            <div class="mx-auto max-w-4xl">
                <p class="editorial-eyebrow">{{ $post->published_at?->format('M j, Y') }}</p>
                <h1 class="mt-3 font-serif text-5xl md:text-7xl">{{ $copy->get($post, 'title') }}</h1>
                <p class="mt-6 text-lg text-nawalli-navy/70">{{ $copy->get($post, 'excerpt') }}</p>
            </div>
        </section>
        <section class="px-5 py-16 lg:px-8">
            <div class="mx-auto max-w-3xl text-lg leading-8 text-nawalli-navy/75">
                <p>{{ $copy->get($post, 'body') }}</p>
            </div>
        </section>
    </article>
@endsection
