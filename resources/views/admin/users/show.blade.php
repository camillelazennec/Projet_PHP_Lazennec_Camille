<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Détail utilisateur
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <!-- User info -->
            <div class="bg-white shadow-sm rounded-lg p-6 mb-6">
                <h3 class="text-lg font-semibold mb-2">Informations</h3>

                <p class="text-gray-800"><strong>Nom :</strong> {{ $user->name }}</p>
                <p class="text-gray-600"><strong>Email :</strong> {{ $user->email }}</p>
            </div>

            <!-- Offers -->
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Offres publiées</h3>

                <ul class="space-y-3">
                @forelse ($user->offers as $offer)
                    <li class="border rounded-md p-3 flex justify-between items-center">
                        <div>
                            <p class="font-medium">{{ $offer->title }}</p>
                            <p class="text-sm text-gray-500">
                                {{ $offer->quantity }} unités
                            </p>
                        </div>
                    </li>
                @empty
                    <li class="text-gray-500">Aucune offre publiée</li>
                @endforelse
                </ul>
            </div>

            <!-- Back -->
            <div class="mt-6">
                <a href="{{ route('admin.users.index') }}"
                   class="text-indigo-600 hover:underline">
                    ← Retour à la liste
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
