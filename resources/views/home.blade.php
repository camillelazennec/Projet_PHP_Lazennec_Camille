<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>OverStock</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900">

<header class="bg-white border-b">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <!-- Logo -->
        <a href="{{ route('home') }}" class="text-2xl font-bold text-purple-600">
            OverStock
        </a>

        <!-- Right -->
        <div class="space-x-4">
            @auth
                <a href="{{ route('dashboard') }}"
                   class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="text-gray-700">Login</a>

                <a href="{{ route('register') }}"
                   class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
                    Register
                </a>
            @endauth
        </div>

    </div>
</header>


<!-- HERO -->
<section class="py-20 bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
    <div class="max-w-5xl mx-auto px-6 text-center">

        <h1 class="text-5xl font-bold mb-6">
            Donnez une seconde vie à vos stocks
        </h1>

        <p class="text-lg mb-8 opacity-90">
            Publiez vos surplus, trouvez des produits, connectez entreprises et opportunités.
        </p>

        @auth
            <a href="{{ route('offers.create') }}"
               class="bg-white text-purple-600 px-6 py-3 rounded font-semibold">
                Créer une offre
            </a>
        @else
            <a href="{{ route('register') }}"
               class="bg-white text-purple-600 px-6 py-3 rounded font-semibold">
                Commencer
            </a>
        @endauth

    </div>
</section>


<!-- OFFERS -->
<section class="max-w-7xl mx-auto px-6 py-14">

    <h2 class="text-2xl font-bold mb-8">
        Offres disponibles
    </h2>

    <div class="grid md:grid-cols-3 gap-6">

        @foreach($offers as $offer)
            <div class="bg-white rounded-lg shadow p-5">

                <h3 class="font-semibold text-lg">
                    {{ $offer->title }}
                </h3>

                <p class="text-gray-600 mt-2">
                    {{ $offer->quantity }} unités
                </p>

                <p class="text-sm text-gray-400 mt-2">
                    par {{ $offer->user->name }}
                </p>

            </div>
        @endforeach

    </div>
</section>

</body>
</html>
