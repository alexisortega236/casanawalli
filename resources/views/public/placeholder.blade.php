@extends('layouts.public')

@section('title', $page . ' | Casa Nawalli')

@section('content')
    <section class="bg-nawalli-sand px-5 py-24 lg:px-8">
        <div class="mx-auto max-w-4xl">
            <p class="editorial-eyebrow">Phase placeholder</p>
            <h1 class="mt-3 font-serif text-5xl md:text-7xl">{{ $page }}</h1>
            <p class="mt-6 text-lg text-nawalli-navy/70">This public page is reserved for the next implementation phase and intentionally contains no invented final content.</p>
        </div>
    </section>
@endsection
