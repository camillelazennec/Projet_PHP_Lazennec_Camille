<x-app-layout>
    <x-slot name="header">
        <h2>Créer une offre</h2>
    </x-slot>

    <div class="p-6">
        <form method="POST" action="{{ route('offers.store') }}">
        @csrf

        <div>
            <label>Titre</label>
            <input type="text" name="title">
        </div>

        <div>
            <label>Description</label>
            <textarea name="description"></textarea>
        </div>

        <div>
            <label>Quantité</label>
            <input type="number" name="quantity">
        </div>

        <button type="submit">Publier</button>
    </form>
    </div>
</x-app-layout>