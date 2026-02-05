<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>OverStock</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900">

<!-- HEADER -->
<header class="bg-white border-b">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="text-2xl font-bold text-purple-600">
            OverStock
        </a>

        <!-- Right -->
        <div class="space-x-4">
            @auth
                <a href="{{ route('dashboard') }}"
                   class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 transition">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="text-gray-700">Login</a>

                <a href="{{ route('register') }}"
                   class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 transition">
                    Register
                </a>
            @endauth
        </div>
    </div>
</header>

<!-- HERO -->
<section class="relative py-20 bg-gradient-to-r from-purple-600 to-indigo-600 text-white overflow-hidden">
    <canvas id="heroCanvas" class="absolute inset-0 w-full h-full"></canvas>

    <div class="relative max-w-5xl mx-auto px-6 text-center z-10">
        <h1 class="text-5xl font-bold mb-6">Donnez une seconde vie à vos stocks</h1>
        <p class="text-lg mb-8 opacity-90">
            Publiez vos surplus, trouvez des produits, connectez entreprises et opportunités.
        </p>

        @auth
            <a href="{{ route('offers.create') }}"
               class="bg-white text-purple-600 px-6 py-3 rounded font-semibold">
                Créer une offre
            </a>
        @else
            <a href="{{ route('register') }}"
               class="bg-white text-purple-600 px-6 py-3 rounded font-semibold">
                Commencer
            </a>
        @endauth
    </div>
</section>

<!-- HOW IT WORKS -->
<section class="max-w-7xl mx-auto px-6 py-16">
    <h2 class="text-3xl font-bold text-center mb-12">Comment ça marche</h2>

    <div class="grid md:grid-cols-3 gap-8 text-center">
        <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
            <div class="mb-4 text-purple-600 text-4xl">📦</div>
            <h3 class="font-semibold mb-2">Publier vos surplus</h3>
            <p class="text-gray-600">Ajoutez facilement vos stocks excédentaires sur OverStock.</p>
        </div>

        <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
            <div class="mb-4 text-purple-600 text-4xl">🔍</div>
            <h3 class="font-semibold mb-2">Trouver des produits</h3>
            <p class="text-gray-600">Parcourez les offres disponibles et trouvez ce dont vous avez besoin.</p>
        </div>

        <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
            <div class="mb-4 text-purple-600 text-4xl">🤝</div>
            <h3 class="font-semibold mb-2">Connecter les entreprises</h3>
            <p class="text-gray-600">Créez des opportunités de vente et de rachat rapidement.</p>
        </div>
    </div>
</section>

<!-- OFFERS -->
<section class="max-w-7xl mx-auto px-6 py-14">
    <h2 class="text-2xl font-bold mb-8">Offres disponibles</h2>

    <div class="grid md:grid-cols-3 gap-6">
        @foreach($offers as $offer)
            <div class="bg-white rounded-lg shadow p-5 hover:shadow-lg transition">
                <h3 class="font-semibold text-lg">{{ $offer->title }}</h3>
                <p class="text-gray-600 mt-2">{{ $offer->quantity }} unités</p>
                <p class="text-sm text-gray-400 mt-2">par {{ $offer->user->name }}</p>
            </div>
        @endforeach
    </div>
</section>

<!-- STATS -->
<section class="bg-gray-100 py-14">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8 text-center">
        <div>
            <h3 class="text-4xl font-bold text-purple-600">+1000</h3>
            <p class="text-gray-700">Offres publiées</p>
        </div>
        <div>
            <h3 class="text-4xl font-bold text-purple-600">+500</h3>
            <p class="text-gray-700">Entreprises connectées</p>
        </div>
        <div>
            <h3 class="text-4xl font-bold text-purple-600">+2000</h3>
            <p class="text-gray-700">Produits échangés</p>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="max-w-7xl mx-auto px-6 py-16">
    <h2 class="text-3xl font-bold text-center mb-12">Ils utilisent OverStock</h2>

    <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
            <p class="text-gray-600 mb-4">"Grâce à OverStock, nous avons pu vendre nos surplus rapidement et facilement."</p>
            <h4 class="font-semibold">Entreprise A</h4>
        </div>

        <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
            <p class="text-gray-600 mb-4">"Plateforme simple et intuitive, nous recommandons fortement."</p>
            <h4 class="font-semibold">Entreprise B</h4>
        </div>

        <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
            <p class="text-gray-600 mb-4">"Nous avons trouvé exactement ce que nous cherchions en quelques clics."</p>
            <h4 class="font-semibold">Entreprise C</h4>
        </div>
    </div>
</section>

<!-- FOOTER -->
<x-footer />

<!-- HERO CANVAS SCRIPT -->
<script>
const canvas = document.getElementById('heroCanvas');
const ctx = canvas.getContext('2d');
canvas.width = window.innerWidth;
canvas.height = document.querySelector('section').offsetHeight;

let particles = [];
const particleCount = 50;

// Générer les particules
for (let i = 0; i < particleCount; i++) {
    particles.push({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        radius: Math.random() * 3 + 1,
        dx: (Math.random() - 0.5) * 0.5,
        dy: (Math.random() - 0.5) * 0.5
    });
}

// Animation
function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    particles.forEach(p => {
        p.x += p.dx;
        p.y += p.dy;

        if (p.x < 0 || p.x > canvas.width) p.dx *= -1;
        if (p.y < 0 || p.y > canvas.height) p.dy *= -1;

        ctx.beginPath();
        ctx.arc(p.x, p.y, p.radius, 0, Math.PI*2);
        ctx.fillStyle = "rgba(255,255,255,0.7)";
        ctx.fill();
    });

    requestAnimationFrame(animate);
}
animate();

// Point lumineux qui suit la souris
canvas.addEventListener('mousemove', (e) => {
    particles.push({
        x: e.clientX,
        y: e.clientY,
        radius: 4,
        dx: (Math.random() - 0.5) * 0.5,
        dy: (Math.random() - 0.5) * 0.5
    });
});

// Ajuster le canvas au resize
window.addEventListener('resize', () => {
    canvas.width = window.innerWidth;
    canvas.height = document.querySelector('section').offsetHeight;
});
</script>

</body>
</html>