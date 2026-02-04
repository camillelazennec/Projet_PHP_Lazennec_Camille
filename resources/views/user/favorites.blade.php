<x-app-layout>
    <x-slot name="header">
        <h2>Mes favoris</h2>
    </x-slot>

    <div class="p-6">
        <ul>
        @forelse (auth()->user()->favoriteOffers as $offer)
            <li>
                <strong>{{ $offer->title }}</strong> —
                {{ $offer->quantity }} unités
                (par {{ $offer->user->name }})
            </li>
        @empty
            <li>Aucun favori pour le moment.</li>
        @endforelse
        </ul>
    </div>
</x-app-layout>
