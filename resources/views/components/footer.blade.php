<!-- FOOTER -->
<footer class="bg-gray-800 text-gray-200 mt-16">
    <div class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- Section 1 : Logo et description -->
        <div>
            <h3 class="text-2xl font-bold text-purple-500 mb-3">OverStock</h3>
            <p class="text-gray-400">
                Donnez une seconde vie à vos stocks. Publiez, trouvez et connectez les entreprises et opportunités.
            </p>
        </div>

        <!-- Section 2 : Liens utiles -->
        <div>
            <h4 class="font-semibold mb-3">Liens rapides</h4>
            <ul class="space-y-2">
                <li><a href="{{ route('home') }}" class="hover:text-white transition">Accueil</a></li>
                <li><a href="{{ route('offers.index') }}" class="hover:text-white transition">Toutes les offres</a></li>
                @auth
                    <li><a href="{{ route('offers.create') }}" class="hover:text-white transition">Créer une offre</a></li>
                    <li><a href="{{ route('dashboard') }}" class="hover:text-white transition">Dashboard</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="hover:text-white transition">Login</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-white transition">Register</a></li>
                @endauth
            </ul>
        </div>

        <!-- Section 3 : Réseaux sociaux -->
        <div>
            <h4 class="font-semibold mb-3">Suivez-nous</h4>
            <div class="flex space-x-4">
                <a href="#" class="hover:text-white transition">
                    <svg class="w-6 h-6 fill-current text-gray-400 hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M24 4.56v14.88c0 1.2-.97 2.16-2.16 2.16H2.16C.97 21.6 0 20.63 0 19.44V4.56C0 3.36.97 2.4 2.16 2.4h19.68C23.03 2.4 24 3.36 24 4.56zM7.68 18.72V9.6H5.28v9.12h2.4zm-1.2-10.32c.81 0 1.32-.54 1.32-1.2-.03-.66-.51-1.2-1.32-1.2s-1.32.54-1.32 1.2c0 .66.51 1.2 1.32 1.2zm13.44 10.32v-5.04c0-1.2-.42-2.04-1.47-2.04-.81 0-1.29.54-1.5 1.08-.06.15-.09.36-.09.57v5.43h-2.4V9.6h2.4v1.26c.36-.54 1.02-1.32 2.49-1.32 1.83 0 3.18 1.2 3.18 3.78v6.42h-2.4z"/></svg>
                </a>
                <a href="#" class="hover:text-white transition">
                    <svg class="w-6 h-6 fill-current text-gray-400 hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22.23 0H1.77C.79 0 0 .77 0 1.72v20.55C0 23.23.79 24 1.77 24h20.46c.97 0 1.77-.77 1.77-1.72V1.72C24 .77 23.21 0 22.23 0zM7.12 20.45H3.56v-9h3.56v9zm-1.78-10.3c-1.15 0-2.08-.93-2.08-2.08s.93-2.08 2.08-2.08 2.08.93 2.08 2.08-.93 2.08-2.08 2.08zm15.11 10.3h-3.55v-4.83c0-1.15-.41-1.94-1.43-1.94-.78 0-1.24.53-1.45 1.04-.08.19-.09.46-.09.73v4.99h-3.55v-9h3.42v1.23h.05c.48-.91 1.64-1.85 3.38-1.85 2.45 0 3.85 1.61 3.85 5.07v4.55z"/></svg>
                </a>
                <a href="#" class="hover:text-white transition">
                    <svg class="w-6 h-6 fill-current text-gray-400 hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2.2c-5.44 0-9.8 4.36-9.8 9.8 0 4.33 2.84 8.02 6.78 9.31v-6.6H8.6v-2.7h1.38v-1.88c0-1.36.8-2.12 2.03-2.12.58 0 1.18.1 1.18.1v1.3h-.66c-.65 0-.85.4-.85.81v.99h1.47l-.24 2.7h-1.23v6.6c3.94-1.29 6.78-4.98 6.78-9.31 0-5.44-4.36-9.8-9.8-9.8z"/></svg>
                </a>
            </div>
        </div>

    </div>

    <div class="border-t border-gray-700 mt-8 pt-4 text-center text-gray-400 text-sm">
        &copy; {{ date('Y') }} OverStock. Tous droits réservés.
    </div>
</footer>