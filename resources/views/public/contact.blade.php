@extends('layouts.public')

@section('title', 'Contact | Casa Nawalli')

@section('content')
    <section class="bg-nawalli-sand px-5 py-20 lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-12 lg:grid-cols-[0.9fr_1.1fr]">
            <div>
                <p class="editorial-eyebrow">Contact</p>
                <h1 class="mt-3 font-serif text-5xl md:text-7xl">Start with a short availability request.</h1>
            </div>
            <div class="self-end text-lg leading-8 text-nawalli-navy/75">
                <p>{{ $settings['address'] ?? 'Miramar #13. Sayulita, Mexico' }}</p>
                <p>{{ $settings['phone'] ?? '(+52) 329 298 87 42' }}</p>
                <p>{{ $settings['email'] ?? 'info@nawallisayulita.com' }}</p>
            </div>
        </div>
    </section>
    <section class="px-5 py-16 lg:px-8">
        <div class="mx-auto max-w-4xl">
            @include('public.partials.availability-form', ['rooms' => $rooms, 'selectedRoom' => null])
        </div>
    </section>
@endsection
