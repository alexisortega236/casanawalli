@inject('copy', 'App\Services\Localization\LocalizedContent')
@extends('layouts.public')

@section('title', 'FAQ | Casa Nawalli')

@section('content')
    <section class="bg-nawalli-sand px-5 py-20 lg:px-8">
        <div class="mx-auto max-w-5xl">
            <p class="editorial-eyebrow">FAQ</p>
            <h1 class="mt-3 font-serif text-5xl md:text-7xl">Practical questions before arriving in Sayulita.</h1>
        </div>
    </section>
    <section class="px-5 py-12 lg:px-8">
        <div class="mx-auto max-w-4xl divide-y divide-nawalli-sand">
            @foreach ($faqs as $faq)
                <details class="group py-6">
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-6 font-serif text-2xl">
                        {{ $copy->get($faq, 'question') }}
                        <span class="text-nawalli-turquoise group-open:rotate-45">+</span>
                    </summary>
                    <p class="mt-4 text-lg leading-8 text-nawalli-navy/70">{{ $copy->get($faq, 'answer') }}</p>
                </details>
            @endforeach
        </div>
    </section>
@endsection
