<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Toutes les offres</h2>
    </x-slot>

    <div class="p-6 max-w-6xl mx-auto space-y-6">

        <!-- Bouton créer une offre -->
        <a href="{{ route('offers.create') }}"
           class="inline-block bg-purple-600 text-white px-4 py-2 rounded-md shadow hover:bg-purple-700 transition">
            Créer une offre
        </a>

        <!-- Liste des offres -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($offers as $offer)
                <div class="bg-white shadow-md rounded-lg p-4 flex flex-col justify-between">
                    <!-- Détails de l'offre -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">{{ $offer->title }}</h3>
                        <p class="text-gray-600 mt-1">
                            {{ $offer->quantity }} unité{{ $offer->quantity > 1 ? 's' : '' }} —
                            par <span class="font-medium">{{ $offer->user->name }}</span>
                        </p>
                    </div>

                    <!-- Actions -->
                    <div class="mt-4 flex flex-wrap gap-2 items-center">
                        @if ($offer->user_id === auth()->id())
                            <a href="{{ route('offers.edit', $offer) }}"
                               class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition text-sm">
                                Modifier
                            </a>

                            <form method="POST" action="{{ route('offers.destroy', $offer) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition text-sm">
                                    Supprimer
                                </button>
                            </form>
                        @endif

                        <form method="POST" action="{{ route('offers.favorite', $offer) }}" class="inline">
                            @csrf
                            <button type="submit"
                                    class="bg-blue-300 text-white px-3 py-1 rounded-md hover:bg-blue-400 transition text-sm">
                                @if (auth()->user()->favoriteOffers->contains($offer->id))
                                    Retirer des favoris
                                @else
                                    Ajouter aux favoris
                                @endif
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        @if($offers->isEmpty())
            <p class="text-gray-500 text-center mt-6">Aucune offre pour le moment.</p>
        @endif
    </div>
</x-app-layout>