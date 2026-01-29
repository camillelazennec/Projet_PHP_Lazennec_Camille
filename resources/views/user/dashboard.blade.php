<h1>Mon tableau de bord</h1>

<p>Bienvenue {{ auth()->user()->name }}</p>

<h2>Mes offres</h2>

<ul>
@forelse (auth()->user()->offers as $offer)
    <li>
        <strong>{{ $offer->title }}</strong> —
        {{ $offer->quantity }} unités

        <a href="{{ route('offers.edit', $offer) }}">Modifier</a>

        <form method="POST" action="{{ route('offers.destroy', $offer) }}" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
        </form>
    </li>
@empty
    <li>Aucune offre pour le moment.</li>
@endforelse
</ul>