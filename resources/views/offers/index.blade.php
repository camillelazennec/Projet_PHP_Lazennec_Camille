<x-app-layout>
    <x-slot name="header">
        <h2>Toutes les offres</h2>
    </x-slot>

    <div class="p-6">

        <a href="{{ route('offers.create') }}">Créer une offre</a>

        <ul>
        @foreach ($offers as $offer)
            <li style="margin-bottom: 15px;">
                <strong>{{ $offer->title }}</strong> —
                {{ $offer->quantity }} unités —
                par {{ $offer->user->name }}

                <br>

                @if ($offer->user_id === auth()->id())
                    <a href="{{ route('offers.edit', $offer) }}">Modifier</a>

                    <form method="POST" action="{{ route('offers.destroy', $offer) }}" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                @endif

                <form method="POST" action="{{ route('offers.favorite', $offer) }}" style="display:inline">
                    @csrf
                    <button type="submit">
                        @if (auth()->user()->favoriteOffers->contains($offer->id))
                            Retirer des favoris
                        @else
                            Ajouter aux favoris
                        @endif
                    </button>
                </form>
            </li>
        @endforeach
        </ul>

    </div>
</x-app-layout>
