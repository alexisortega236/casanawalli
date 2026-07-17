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
    $title = trim($__env->yieldContent('title', 'Casa Nawalli'));
    $description = trim($__env->yieldContent('meta_description', 'Casa Nawalli is an adults-only boutique hotel in Sayulita, Nayarit, one block from the sea.'));
    $canonical = trim($__env->yieldContent('canonical', url()->current()));
    $ogImage = trim($__env->yieldContent('og_image', asset('assets/current-site/hero-garden-pool.webp')));
    $hotelSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Hotel',
        'name' => 'Casa Nawalli',
        'description' => 'Adults-only boutique hotel and living tropical garden in Sayulita, Nayarit.',
        'url' => route('public.home', ['locale' => $locale]),
        'image' => asset('assets/current-site/hero-garden-pool.webp'),
        'telephone' => '+52 329 298 8742',
        'email' => 'info@nawallisayulita.com',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Miramar #13',
            'addressLocality' => 'Sayulita',
            'addressRegion' => 'Nayarit',
            'addressCountry' => 'MX',
        ],
        'amenityFeature' => [
            ['@type' => 'LocationFeatureSpecification', 'name' => 'Adults-only boutique hotel', 'value' => true],
            ['@type' => 'LocationFeatureSpecification', 'name' => 'Heated salt water pool', 'value' => true],
            ['@type' => 'LocationFeatureSpecification', 'name' => 'Tropical edible gardens', 'value' => true],
        ],
    ];
@endphp
<!doctype html>
<html lang="{{ $locale }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $description }}">
    <link rel="canonical" href="{{ $canonical }}">
    <link rel="alternate" hreflang="en" href="{{ route('public.home', ['locale' => 'en']) }}">
    <link rel="alternate" hreflang="es" href="{{ route('public.home', ['locale' => 'es']) }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Casa Nawalli">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:url" content="{{ $canonical }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="twitter:image" content="{{ $ogImage }}">
    <title>{{ $title }}</title>
    <script type="application/ld+json">@json($hotelSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)</script>
    @stack('structured_data')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen font-sans antialiased">
    <a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-50 focus:bg-nawalli-ivory focus:px-4 focus:py-2">Skip to content</a>

    <header class="sticky top-0 z-40 border-b border-white/10 bg-nawalli-navy text-white shadow-[0_10px_30px_rgba(40,29,89,0.12)]">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 lg:px-8">
            <a href="{{ route('public.home', ['locale' => $locale]) }}" class="flex items-center gap-3">
                <img src="{{ asset('assets/current-site/logo-white.webp') }}" alt="Casa Nawalli" class="h-11 w-auto md:h-12">
            </a>
            <nav class="brand-nav hidden items-center gap-6 text-[0.72rem] font-bold text-white/82 lg:flex" aria-label="Primary">
                @foreach ($nav as $item)
                    <a class="transition hover:text-nawalli-turquoise" href="{{ route($item['route'], ['locale' => $locale]) }}">{{ $item['label'] }}</a>
                @endforeach
            </nav>
            <div class="hidden items-center gap-3 lg:flex">
                <a href="{{ route('public.home', ['locale' => $alternateLocale]) }}" class="text-xs font-bold uppercase tracking-[0.18em] text-white/75 hover:text-nawalli-turquoise">{{ $alternateLocale }}</a>
                <a href="{{ route('public.availability', ['locale' => $locale]) }}" class="bg-nawalli-turquoise px-5 py-3 text-sm font-bold text-nawalli-navy transition hover:bg-white">{{ $locale === 'es' ? 'Disponibilidad' : 'Availability' }}</a>
            </div>
            <details class="relative lg:hidden">
                <summary class="cursor-pointer list-none border border-white/35 px-4 py-2 text-sm font-bold text-white">Menu</summary>
                <nav class="absolute right-0 mt-3 w-64 border border-nawalli-sand bg-nawalli-ivory p-4 text-nawalli-navy shadow-xl">
                    @foreach ($nav as $item)
                        <a class="brand-nav block py-3 text-xs font-bold" href="{{ route($item['route'], ['locale' => $locale]) }}">{{ $item['label'] }}</a>
                    @endforeach
                    <a class="block py-3 text-sm font-bold uppercase tracking-[0.18em] text-nawalli-blue" href="{{ route('public.home', ['locale' => $alternateLocale]) }}">{{ $alternateLocale }}</a>
                    <a class="mt-3 block bg-nawalli-turquoise px-4 py-3 text-center text-sm font-bold text-nawalli-navy" href="{{ route('public.availability', ['locale' => $locale]) }}">{{ $locale === 'es' ? 'Disponibilidad' : 'Availability' }}</a>
                </nav>
            </details>
        </div>
    </header>

    <main id="main">
        @yield('content')
    </main>

    <a href="https://wa.me/523292988742" class="fixed bottom-5 right-5 z-30 bg-nawalli-turquoise px-4 py-3 text-sm font-bold text-nawalli-navy shadow-lg">WhatsApp</a>

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
