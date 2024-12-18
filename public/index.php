<?php include '../includes/header.php'; ?>

<!-- Hero Section -->
<section class="flex flex-col items-center justify-center h-screen bg-cover bg-center" 
         style="background-image: url('../img/resteau.jpg');">
    <div class="bg-black bg-opacity-70 p-6 rounded-lg text-center">
        <h1 class="text-5xl md:text-6xl font-bold text-white mb-4">Bienvenue à Foodie</h1>
        <p class="text-lg md:text-2xl text-gray-300">Découvrez des plats incroyables et une expérience culinaire inoubliable.</p>
    </div>
</section>


<!-- About Section -->
<section class="py-16 px-8 bg-gray-100">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">À propos de nous</h2>
        <p class="text-lg text-gray-600 leading-relaxed">
            Chez Foodie Heaven, nous croyons en la magie de la nourriture. Notre équipe dévouée s'efforce de créer des plats 
            délicieux et des souvenirs qui durent toute une vie. Nous servons des plats gourmands, végétariens et bien plus encore !
        </p>
    </div>
</section>

<!-- Menu Categories Section -->
<section class="py-16">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-12">Explorez Nos Menus</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Menu Card 1 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:scale-105 transition-transform duration-300 ease-in-out">
                <img src="../img/enrees1.png" alt="Entrées" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800">Entrées</h3>
                    <p class="text-gray-600">Une variété de délicieuses entrées pour commencer votre repas.</p>
                </div>
            </div>
            <!-- Menu Card 2 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:scale-105 transition-transform duration-300 ease-in-out">
                <img src="../img/plats-prn1.png" alt="Plats Principaux" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800">Plats Principaux</h3>
                    <p class="text-gray-600">Des plats gourmands pour satisfaire toutes vos envies.</p>
                </div>
            </div>
            <!-- Menu Card 3 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:scale-105 transition-transform duration-300 ease-in-out">
                <img src="../img/boisson1.png" alt="Boissons" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800">Boissons</h3>
                    <p class="text-gray-600">Des boissons rafraîchissantes pour accompagner votre repas.</p>
                </div>
            </div>
            <!-- Menu Card 4 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:scale-105 transition-transform duration-300 ease-in-out">
                <img src="../img/desserts1.png" alt="Desserts" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800">Desserts</h3>
                    <p class="text-gray-600">Terminez votre repas en beauté avec nos desserts sucrés.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Chef Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-12">Rencontrez Nos Chefs</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Chef Card -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:scale-105 transition-transform duration-300 ease-in-out">
                <img src="../img/chefs-01.jpg" alt="Chef 1" class="w-full h-30 object-cover">
                <div class="p-4 text-center">
                    <h3 class="text-xl font-semibold text-gray-800">Chef Alain Ducasse</h3>
                    <p class="text-gray-600">Spécialiste de la cuisine française, connu pour ses plats créatifs.</p>
                </div>
            </div>
            <!-- Additional Chef Cards -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:scale-105 transition-transform duration-300 ease-in-out">
                <img src="../img/chefs-02.jpg" alt="Chef 2" class="w-full h-30 object-cover">
                <div class="p-4 text-center">
                    <h3 class="text-xl font-semibold text-gray-800">Chef Julia Child</h3>
                    <p class="text-gray-600">Maîtresse des saveurs internationales et des desserts exquis.</p>
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:scale-105 transition-transform duration-300 ease-in-out">
                <img src="../img/chefs-03.jpg" alt="Chef 3" class="w-full h-30 object-cover">
                <div class="p-4 text-center">
                    <h3 class="text-xl font-semibold text-gray-800">Chef Massimo Bottura</h3>
                    <p class="text-gray-600">Expert en cuisine italienne moderne avec une touche artistique.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Customer Reviews Section -->
<section class="py-16">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-12">Ce que disent nos clients</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Review Card -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <p class="text-gray-600 italic">"La nourriture était délicieuse et le service impeccable ! Un incontournable."</p>
                <div class="mt-4">
                    <h4 class="text-lg font-semibold text-gray-800">Marie Dupont</h4>
                    <p class="text-sm text-gray-500">⭐⭐⭐⭐⭐</p>
                </div>
            </div>
            <!-- Additional Review Cards -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <p class="text-gray-600 italic">"Une expérience culinaire unique et mémorable. Nous reviendrons !"</p>
                <div class="mt-4">
                    <h4 class="text-lg font-semibold text-gray-800">Jean Martin</h4>
                    <p class="text-sm text-gray-500">⭐⭐⭐⭐⭐</p>
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <p class="text-gray-600 italic">"Les desserts étaient incroyables, et l'atmosphère très agréable."</p>
                <div class="mt-4">
                    <h4 class="text-lg font-semibold text-gray-800">Sophie Leblanc</h4>
                    <p class="text-sm text-gray-500">⭐⭐⭐⭐⭐</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer Section -->
<?php include '../includes/footer.php'; ?>
