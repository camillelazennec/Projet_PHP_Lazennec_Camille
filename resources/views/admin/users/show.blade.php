<h1>{{ $user->name }}</h1>
<p>{{ $user->email }}</p>

<h2>Offres</h2>

<ul>
@forelse ($user->offers as $offer)
    <li>
        {{ $offer->title }} — {{ $offer->quantity }} unités
    </li>
@empty
    <li>Aucune offre</li>
@endforelse
</ul>

<a href="{{ route('admin.users.index') }}">Retour</a>