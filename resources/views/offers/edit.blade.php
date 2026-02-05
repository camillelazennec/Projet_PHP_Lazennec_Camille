<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Modifier l'offre</h2>
    </x-slot>

    <div class="p-6 max-w-3xl mx-auto bg-white shadow-md rounded-lg">
        <form method="POST" action="{{ route('offers.update', $offer) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Titre -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                <input type="text" name="title" id="title" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                       placeholder="Nom de l'offre" value="{{ $offer->title }}" required>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                          placeholder="Décrivez l'offre ici..." required>{{ $offer->description }}</textarea>
            </div>

            <!-- Quantité -->
            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantité</label>
                <input type="number" name="quantity" id="quantity"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                       placeholder="0" min="1" value="{{ $offer->quantity }}" required>
            </div>

            <!-- Boutons -->
            <div class="flex gap-2">
                <a href="{{ route('offers.index') }}" 
                   class="flex-1 text-center bg-gray-300 text-gray-700 px-4 py-2 rounded-md shadow hover:bg-gray-400 transition">
                    Annuler
                </a>

                <button type="submit"
                        class="flex-1 bg-indigo-600 text-white px-4 py-2 rounded-md shadow hover:bg-indigo-700 transition">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
</x-app-layout>