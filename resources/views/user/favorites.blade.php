<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Mes favoris</h2>
    </x-slot>

    <div class="p-6 max-w-6xl mx-auto space-y-6">

        @forelse (auth()->user()->favoriteOffers as $offer)
            <div class="bg-white shadow-md rounded-lg p-4 flex flex-col md:flex-row justify-between items-start md:items-center">
                <!-- Détails de l'offre -->
                <div class="mb-2 md:mb-0">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $offer->title }}</h3>
                    <p class="text-gray-600">
                        {{ $offer->quantity }} unité{{ $offer->quantity > 1 ? 's' : '' }} —
                        par <span class="font-medium">{{ $offer->user->name }}</span>
                    </p>
                </div>

                <!-- Bouton retirer des favoris -->
                <form method="POST" action="{{ route('offers.favorite', $offer) }}" class="inline">
                    @csrf
                    <button type="submit"
                            class="bg-blue-300 text-white px-4 py-2 rounded-md hover:bg-blue-400 transition text-sm">
                        Retirer des favoris
                    </button>
                </form>
            </div>
        @empty
            <p class="text-gray-500 text-center mt-6">Aucun favori pour le moment.</p>
        @endforelse

    </div>
</x-app-layout>
