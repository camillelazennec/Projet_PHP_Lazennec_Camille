<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OverStock — Accueil</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 font-sans antialiased">

<!-- HEADER PUBLIC -->
<header class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <!-- Logo -->
        <div class="flex items-center gap-3">
            <div class="text-2xl font-bold text-indigo-600">
                OverStock
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex items-center gap-4">

            @auth
                <a href="{{ route('dashboard') }}"
                   class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="text-gray-700 hover:text-indigo-600">
                    Login
                </a>

                <a href="{{ route('register') }}"
                   class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
                    Register
                </a>
            @endauth

        </nav>
    </div>
</header>

<!-- HERO -->
<section class="py-16 text-center bg-gradient-to-r from-indigo-500 to-purple-600 text-white">
    <h1 class="text-4xl font-bold mb-4">
        Donnez une seconde vie à vos surplus
    </h1>

    <p class="text-lg opacity-90">
        Publiez, découvrez et sauvegardez des offres autour de vous.
    </p>
</section>

<!-- OFFERS PREVIEW -->
<section class="py-12">
    <div class="max-w-6xl mx-auto px-6">

        <h2 class="text-2xl font-semibold mb-6 text-gray-800">
            Dernières offres publiées
        </h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

            @php
                $offers = \App\Models\Offer::with('user')->latest()->take(6)->get();
            @endphp

            @forelse ($offers as $offer)
                <div class="bg-white shadow-sm rounded-lg p-5">

                    <h3 class="font-semibold text-lg mb-2">
                        {{ $offer->title }}
                    </h3>

                    <p class="text-gray-600 text-sm mb-3">
                        {{ Str::limit($offer->description, 100) }}
                    </p>

                    <p class="text-sm text-gray-500">
                        {{ $offer->quantity }} unités — par {{ $offer->user->name }}
                    </p>

                </div>
            @empty
                <p>Aucune offre pour le moment.</p>
            @endforelse

        </div>

        <div class="text-center mt-8">
            <a href="{{ route('offers.index') }}"
               class="bg-indigo-600 text-white px-6 py-3 rounded-md hover:bg-indigo-700 transition">
                Voir toutes les offres
            </a>
        </div>

    </div>
</section>

</body>
</html>
