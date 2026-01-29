<h1>Utilisateurs</h1>

<ul>
@foreach ($users as $user)
    <li>
        {{ $user->name }} ({{ $user->email }})
        <a href="{{ route('admin.users.show', $user) }}">Voir</a>

        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">Bannir</button>
        </form>
    </li>
@endforeach
</ul>