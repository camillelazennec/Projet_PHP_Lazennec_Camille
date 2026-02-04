<x-app-layout>
    {{-- HEADER --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mon tableau de bord
        </h2>
    </x-slot>

    {{-- CONTENT --}}
    <div class="py-6 max-w-7xl mx-auto space-y-8">

        {{-- Bienvenue --}}
        <div>
            <p class="text-lg">
                Bienvenue <strong>{{ auth()->user()->name }}</strong>
            </p>
        </div>

        {{-- Actions --}}
        <div class="flex flex-wrap gap-4">
            <a href="{{ route('offers.index') }}" class="text-blue-600 underline">
                Voir toutes les offres
            </a>

            <a href="{{ route('offers.create') }}" class="text-blue-600 underline">
                Créer une offre
            </a>

            <a href="{{ route('profile.edit') }}" class="text-blue-600 underline">
                Modifier mes informations
            </a>
        </div>

        <hr>

        {{-- MES OFFRES --}}
        <div>
            <h3 class="text-lg font-semibold mb-3">Mes offres</h3>

            <ul class="space-y-2">
                @forelse (auth()->user()->offers as $offer)
                    <li class="border p-3 rounded">
                        <strong>{{ $offer->title }}</strong>
                        — {{ $offer->quantity }} unités

                        <div class="mt-2 space-x-2">
                            <a href="{{ route('offers.edit', $offer) }}" class="text-blue-600">
                                Modifier
                            </a>

                            <form method="POST"
                                  action="{{ route('offers.destroy', $offer) }}"
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </li>
                @empty
                    <li>Aucune offre publiée</li>
                @endforelse
            </ul>
        </div>

        <hr>

        {{-- MES FAVORIS --}}
        <div>
            <h3 class="text-lg font-semibold mb-3">Mes favoris</h3>

            <ul class="space-y-2">
                @forelse (auth()->user()->favoriteOffers as $offer)
                    <li class="border p-3 rounded">
                        {{ $offer->title }}
                        <span class="text-sm text-gray-500">
                            (par {{ $offer->user->name }})
                        </span>

                        <form method="POST"
                              action="{{ route('offers.favorite', $offer) }}"
                              class="inline ml-2">
                            @csrf
                            <button type="submit" class="text-red-600">
                                Retirer
                            </button>
                        </form>
                    </li>
                @empty
                    <li>Aucun favori</li>
                @endforelse
            </ul>
        </div>

    </div>
</x-app-layout>