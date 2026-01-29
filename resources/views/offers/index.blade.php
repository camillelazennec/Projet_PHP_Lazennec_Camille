<h1>Offres disponibles</h1>

<a href="{{ route('offers.create') }}">Créer une offre</a>

<ul>
@foreach ($offers as $offer)
    <li>
        <strong>{{ $offer->title }}</strong> —
        {{ $offer->quantity }} unités —
        par {{ $offer->user->name }}
    </li>
    @if ($offer->user_id === auth()->id())
    <a href="{{ route('offers.edit', $offer) }}">Modifier</a>

    <form method="POST" action="{{ route('offers.destroy', $offer) }}" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
    </form>
@endif
@endforeach
</ul>