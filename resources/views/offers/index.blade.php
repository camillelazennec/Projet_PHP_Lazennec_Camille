<h1>Offres disponibles</h1>

<a href="{{ route('offers.create') }}">Créer une offre</a>

<ul>
@foreach ($offers as $offer)
    <li>
        <strong>{{ $offer->title }}</strong> —
        {{ $offer->quantity }} unités —
        par {{ $offer->user->name }}
    </li>
@endforeach
</ul>