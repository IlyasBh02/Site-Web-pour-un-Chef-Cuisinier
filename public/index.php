<?php include '../includes/header.php'; ?>

<!-- Hero Section -->
<section class="flex flex-col items-center justify-center h-screen bg-cover bg-center" 
         style="background-image: url('../img/resteauBr.jpg');">
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

<!-- Restaurant Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-12">Bienvenue dans notre Restaurant</h2>
        <p class="text-center text-lg text-gray-600 mb-8">Venez découvrir notre espace, une atmosphère conviviale où chaque détail est pensé pour vous offrir une expérience culinaire unique.</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Restaurant Image 1 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:scale-105 transition-transform duration-300 ease-in-out">
                <img src="../img/Ambiance.jpg" alt="Restaurant Image 1" class="w-full h-60 object-cover">
                <div class="p-4 text-center">
                    <h3 class="text-xl font-semibold text-gray-800">Ambiance Moderne</h3>
                    <p class="text-gray-600">Un cadre élégant et moderne pour chaque repas.</p>
                </div>
            </div>
            <!-- Restaurant Image 2 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:scale-105 transition-transform duration-300 ease-in-out">
                <img src="../img/sale.jpg" alt="Restaurant Image 2" class="w-full h-60 object-cover">
                <div class="p-4 text-center">
                    <h3 class="text-xl font-semibold text-gray-800">Salle Principal</h3>
                    <p class="text-gray-600">Une salle principale spacieuse pour des repas inoubliables.</p>
                </div>
            </div>
            <!-- Restaurant Image 3 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:scale-105 transition-transform duration-300 ease-in-out">
                <img src="../img/Terrasse.jpg" alt="Restaurant Image 3" class="w-full h-60 object-cover">
                <div class="p-4 text-center">
                    <h3 class="text-xl font-semibold text-gray-800">Espace Terrasse</h3>
                    <p class="text-gray-600">Profitez de notre terrasse extérieure en toute saison.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="reviews-contact" class="py-16 bg-red-100">
    <div class="container mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12">
        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Ce que disent nos clients</h2>
            <div class="space-y-6">
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <p class="text-gray-600 italic">"La nourriture était délicieuse et le service impeccable ! Un incontournable."</p>
                    <div class="mt-4">
                        <h4 class="text-lg font-semibold text-gray-800">Marie Dupont</h4>
                        <p class="text-sm text-gray-500">⭐⭐⭐⭐⭐</p>
                    </div>
                </div>
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

        <!-- Contact Form Section -->
        <div class="bg-gray-800 text-white rounded-lg shadow-lg p-8">
            <h2 class="text-3xl font-bold mb-6">Contactez-nous</h2>
            <p class="text-gray-300 mb-8">
                Vous avez des questions ou souhaitez réserver une table ? Envoyez-nous un message, et nous vous répondrons rapidement.
            </p>
            <form action="process_contact.php" method="POST">
                <div class="mb-6">
                    <label for="name" class="block text-gray-400 mb-2">Nom complet</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        class="w-full px-4 py-2 bg-gray-500 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-primary" 
                        required>
                </div>
                <div class="mb-6">
                    <label for="email" class="block text-gray-400 mb-2">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="w-full px-4 py-2 bg-gray-500 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-primary" 
                        required>
                </div>
                <div class="mb-6">
                    <label for="message" class="block text-gray-400 mb-2">Message</label>
                    <textarea 
                        id="message" 
                        name="message" 
                        rows="4" 
                        class="w-full px-4 py-2 bg-gray-500 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-primary" 
                        required></textarea>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="w-[50%] py-2 bg-white text-black font-bold rounded-md hover:bg-primary-dark transition-colors">
                        Envoyer
                    </button>
                    </div>
            </form>
        </div>
    </div>
</section>


<!-- About Us Section -->
<section id="about-us" class="py-16 px-16 bg-gray-100">
    <div class="container mx-auto text-center">
        <!-- Introduction -->
        <h2 class="text-3xl font-bold text-gray-800 mb-6">À propos de nous</h2>
        <p class="text-lg text-gray-600 leading-relaxed mb-12">
            Chez Foodie Heaven, nous croyons en la magie de la nourriture. Notre objectif est de transformer chaque repas 
            en une expérience inoubliable. Découvrez notre passion pour la cuisine et notre engagement envers la qualité.
        </p>

        <!-- Mission Section -->
        <div class="mb-16">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Notre Mission</h3>
            <p class="text-gray-600 text-lg leading-relaxed">
                Offrir une cuisine exceptionnelle qui allie tradition et innovation, tout en créant une atmosphère chaleureuse 
                et accueillante. Nous nous efforçons de surprendre nos clients avec des saveurs uniques et des ingrédients de 
                haute qualité, soigneusement sélectionnés par nos chefs.
            </p>
        </div>

        <!-- Our Team Section -->
        <div class="mb-16">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6">Notre Équipe</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Team Member 1 -->
                <div class="text-center">
                    <img src="../img/chefs-01.jpg" alt="Chef Alain Ducasse" class="w-44 h-44 mx-auto rounded-full mb-4">
                    <h4 class="text-xl font-semibold text-gray-800">Chef Alain Ducasse</h4>
                    <p class="text-gray-600">Spécialiste de la cuisine française et fondateur de Foodie Heaven.</p>
                </div>
                <!-- Team Member 2 -->
                <div class="text-center">
                    <img src="../img/chefs-02.jpg" alt="Chef Julia Child" class="w-44 h-44 mx-auto rounded-full mb-4">
                    <h4 class="text-xl font-semibold text-gray-800">Chef Julia Child</h4>
                    <p class="text-gray-600">Experte en saveurs internationales et pâtisseries élégantes.</p>
                </div>
                <!-- Team Member 3 -->
                <div class="text-center">
                    <img src="../img/chefs-03.jpg" alt="Chef Massimo Bottura" class="w-44 h-44 mx-auto rounded-full mb-4">
                    <h4 class="text-xl font-semibold text-gray-800">Chef Massimo Bottura</h4>
                    <p class="text-gray-600">Maître de la cuisine italienne moderne avec une touche artistique.</p>
                </div>
            </div>
        </div>

        <!-- Image Section -->
        <div class="mb-16">
            <img src="../img/restauAB.jpg"  alt="Restaurant Interior" class="w-full h-96 object-cover rounded-lg shadow-lg">
        </div>

        <!-- Final Statement -->
        <div>
            <p class="text-lg text-gray-600 leading-relaxed">
                Que vous soyez ici pour un dîner romantique, un repas en famille ou une célébration spéciale, notre équipe 
                est dévouée à rendre chaque moment inoubliable. Rejoignez-nous pour explorer le meilleur de la cuisine 
                et laissez-nous vous surprendre.
            </p>
        </div>
    </div>
</section>


<!-- Footer Section -->
<?php include '../includes/footer.php'; ?>
