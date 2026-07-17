@inject('copy', 'App\Services\Localization\LocalizedContent')
@extends('layouts.public')

@section('title', 'Gallery | Casa Nawalli')

@section('content')
    <section class="bg-nawalli-sand px-5 py-20 lg:px-8">
        <div class="mx-auto max-w-5xl">
            <p class="editorial-eyebrow">Gallery</p>
            <h1 class="mt-3 font-serif text-5xl md:text-7xl">Pool, garden, breakfast and quiet corners.</h1>
        </div>
    </section>
    <section class="px-5 py-12 lg:px-8">
        <div class="mx-auto grid max-w-7xl grid-cols-2 gap-4 md:grid-cols-3">
            @foreach ($images as $image)
                <figure class="{{ $loop->first ? 'md:col-span-2 md:row-span-2' : '' }}">
                    <img class="h-full min-h-64 w-full object-cover" src="{{ $image->image }}" alt="{{ $copy->get($image, 'alt') }}" loading="lazy">
                </figure>
            @endforeach
        </div>
    </section>
@endsection
