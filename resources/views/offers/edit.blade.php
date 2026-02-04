<x-app-layout>
    <x-slot name="header">
        <h2>Modifier l'offre</h2>
    </x-slot>

    <div class="p-6">
        <form method="POST" action="{{ route('offers.update', $offer) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Titre</label>
            <input type="text" name="title" value="{{ $offer->title }}">
        </div>

        <div>
            <label>Description</label>
            <textarea name="description">{{ $offer->description }}</textarea>
        </div>

        <div>
            <label>Quantité</label>
            <input type="number" name="quantity" value="{{ $offer->quantity }}">
        </div>

        <button type="submit">Mettre à jour</button>
        </form>
    </div>
</x-app-layout>
