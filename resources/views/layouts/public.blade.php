@php
    $locale = app()->getLocale();
    $alternateLocale = $locale === 'es' ? 'en' : 'es';
    $nav = [
        ['label' => 'Home', 'route' => 'public.home'],
        ['label' => 'Suites', 'route' => 'public.suites.index'],
        ['label' => 'Experiences', 'route' => 'public.experiences.index'],
        ['label' => 'Plaza Nawalli', 'route' => 'public.plaza'],
        ['label' => 'Gallery', 'route' => 'public.gallery'],
        ['label' => 'About', 'route' => 'public.about'],
        ['label' => 'Contact', 'route' => 'public.contact'],
    ];
@endphp
<!doctype html>
<html lang="{{ $locale }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Casa Nawalli is an adults-only boutique hotel in Sayulita, Nayarit, one block from the sea.')">
    <meta property="og:title" content="@yield('title', 'Casa Nawalli')">
    <meta property="og:description" content="@yield('meta_description', 'A living garden by the sea in Sayulita.')">
    <title>@yield('title', 'Casa Nawalli')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen font-sans antialiased">
    <a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-50 focus:bg-nawalli-ivory focus:px-4 focus:py-2">Skip to content</a>

    <header class="sticky top-0 z-40 border-b border-white/40 bg-nawalli-ivory/90 backdrop-blur">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 lg:px-8">
            <a href="{{ route('public.home', ['locale' => $locale]) }}" class="font-serif text-2xl text-nawalli-navy">Casa Nawalli</a>
            <nav class="hidden items-center gap-7 text-sm font-semibold text-nawalli-navy lg:flex" aria-label="Primary">
                @foreach ($nav as $item)
                    <a class="hover:text-nawalli-turquoise" href="{{ route($item['route'], ['locale' => $locale]) }}">{{ $item['label'] }}</a>
                @endforeach
            </nav>
            <div class="hidden items-center gap-3 lg:flex">
                <a href="{{ route('public.home', ['locale' => $alternateLocale]) }}" class="text-sm font-bold uppercase text-nawalli-green">{{ $alternateLocale }}</a>
                <a href="{{ route('public.availability', ['locale' => $locale]) }}" class="bg-nawalli-navy px-5 py-3 text-sm font-bold text-white hover:bg-nawalli-green">{{ $locale === 'es' ? 'Disponibilidad' : 'Availability' }}</a>
            </div>
            <details class="relative lg:hidden">
                <summary class="cursor-pointer list-none border border-nawalli-navy px-4 py-2 text-sm font-bold">Menu</summary>
                <nav class="absolute right-0 mt-3 w-64 border border-nawalli-sand bg-nawalli-ivory p-4 shadow-xl">
                    @foreach ($nav as $item)
                        <a class="block py-3 text-sm font-semibold" href="{{ route($item['route'], ['locale' => $locale]) }}">{{ $item['label'] }}</a>
                    @endforeach
                    <a class="block py-3 text-sm font-bold uppercase text-nawalli-green" href="{{ route('public.home', ['locale' => $alternateLocale]) }}">{{ $alternateLocale }}</a>
                    <a class="mt-3 block bg-nawalli-navy px-4 py-3 text-center text-sm font-bold text-white" href="{{ route('public.availability', ['locale' => $locale]) }}">{{ $locale === 'es' ? 'Disponibilidad' : 'Availability' }}</a>
                </nav>
            </details>
        </div>
    </header>

    <main id="main">
        @yield('content')
    </main>

    <a href="https://wa.me/523292988742" class="fixed bottom-5 right-5 z-30 bg-nawalli-green px-4 py-3 text-sm font-bold text-white shadow-lg">WhatsApp</a>

    <footer class="bg-nawalli-navy text-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-5 py-14 md:grid-cols-[1.2fr_1fr_1fr] lg:px-8">
            <div>
                <p class="font-serif text-3xl">Casa Nawalli</p>
                <p class="mt-4 max-w-sm text-white/75">A living garden by the sea. Adults-only boutique hospitality in Sayulita, Nayarit.</p>
            </div>
            <div class="text-sm text-white/75">
                <p class="font-bold text-white">Contact</p>
                <p class="mt-4">Miramar #13. Sayulita, Mexico</p>
                <p>(+52) 329 298 87 42</p>
                <p>info@nawallisayulita.com</p>
            </div>
            <div class="text-sm text-white/75">
                <p class="font-bold text-white">Explore</p>
                <a class="mt-4 block" href="{{ route('public.suites.index', ['locale' => $locale]) }}">Suites</a>
                <a class="mt-2 block" href="{{ route('public.plaza', ['locale' => $locale]) }}">Plaza Nawalli</a>
                <a class="mt-2 block" href="{{ route('public.privacy', ['locale' => $locale]) }}">Privacy policy</a>
            </div>
        </div>
    </footer>
</body>
</html>
