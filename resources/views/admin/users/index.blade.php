<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Administration — Utilisateurs
        </h2>
        <p>Bienvenue, {{ auth()->user()->name }}</p>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <!-- Search -->
            <div class="bg-white shadow-sm rounded-lg p-6 mb-6">
                <form method="GET" class="flex items-center gap-4">
                    <input
                        type="text"
                        name="search"
                        placeholder="Rechercher un utilisateur..."
                        value="{{ request('search') }}"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200"
                    >

                    <button
                        type="submit"
                        class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition"
                    >
                        Rechercher
                    </button>
                </form>
            </div>

            <!-- Users list -->
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Liste des utilisateurs</h3>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class="p-3">Nom</th>
                                <th class="p-3">Email</th>
                                <th class="p-3 text-right">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                        @forelse ($users as $user)
                            <tr class="border-b">
                                <td class="p-3 font-medium">{{ $user->name }}</td>
                                <td class="p-3 text-gray-600">{{ $user->email }}</td>

                                <td class="p-3 text-right space-x-2">

                                    <a href="{{ route('admin.users.show', $user) }}"
                                       class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">
                                        Voir
                                    </a>

                                    <form method="POST"
                                          action="{{ route('admin.users.destroy', $user) }}"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition">
                                            Bannir
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="p-4 text-center text-gray-500">
                                    Aucun utilisateur trouvé
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
