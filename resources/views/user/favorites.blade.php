<h1>Mes offres favorites</h1>

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