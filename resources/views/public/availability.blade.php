@extends('layouts.public')

@section('title', 'Availability request | Casa Nawalli')

@section('content')
    <section class="bg-nawalli-sand px-5 py-20 lg:px-8">
        <div class="mx-auto max-w-4xl">
            <p class="editorial-eyebrow">Reservations</p>
            <h1 class="mt-3 font-serif text-5xl md:text-7xl">Request availability.</h1>
            <p class="mt-6 text-lg text-nawalli-navy/70">This is a manual inquiry form. It does not confirm availability or rates.</p>
        </div>
    </section>
    <section class="px-5 py-16 lg:px-8">
        <div class="mx-auto max-w-4xl">
            @include('public.partials.availability-form', ['rooms' => $rooms, 'selectedRoom' => $selectedRoom])
        </div>
    </section>
@endsection
