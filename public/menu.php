<?php include '../includes/header.php'; ?>

<section >
    <div class="flex h-screen">
        <!-- Sidebar Navigation -->
        <div class="w-[15%] bg-gray-800 text-white p-4">
            <h2 class="text-2xl font-semibold mb-6">Menu</h2>
            <ul class="text-lg">
                <li class="p-2">
                    <a href="entree.php" class="hover:text-yellow-400">Entrée</a>
                </li>
                <li class="p-2">
                    <a href="plat.php" class="hover:text-yellow-400">Plat</a>
                </li>
                <li class="p-2">
                    <a href="boisson.php" class="hover:text-yellow-400">Boisson</a>
                </li>
                <li class="p-2">
                    <a href="dessert.php" class="hover:text-yellow-400">Dessert</a>
                </li>
            </ul>
        </div>

        <!-- Main Content Section -->
        <div class="flex-1 p-6">
            <h1 class="text-3xl font-bold text-gray-800">Notre Menu pour Vous</h1>
            <p class="mt-4 text-lg text-gray-600">Découvrez nos délicieux plats !</p>

            <!-- Sélecteur de type de menu -->
            <form method="GET" class="mb-6">
                <label for="menuType" class="text-xl text-gray-700">Choisissez un menu :</label>
                <select name="menuType" id="menuType" class="p-2 ml-4 border rounded-md">
                    <option value="gourmand" <?php echo isset($_GET['menuType']) && $_GET['menuType'] == 'gourmand' ? 'selected' : ''; ?>>Menu Gourmand</option>
                    <option value="vegetarien" <?php echo isset($_GET['menuType']) && $_GET['menuType'] == 'vegetarien' ? 'selected' : ''; ?>>Menu Végétarien</option>
                </select>
                <button type="submit" class="ml-4 p-2 bg-yellow-500 text-white rounded-md">Appliquer</button>
            </form>

            <?php
            // Vérifier le type de menu sélectionné
            $menuType = isset($_GET['menuType']) ? $_GET['menuType'] : 'gourmand'; // Par défaut 'gourmand'

            // Définir les plats en fonction du type de menu
            $plats = [
                'gourmand' => [
                    'entree' => [
                        ['nom' => 'Salade César', 'description' => 'Salade romaine, poulet grillé, sauce César, croutons.', 'prix' => '8.50€', 'image' => 'path_to_image/salade_cesar.jpg'],
                        ['nom' => 'Soupe de légumes', 'description' => 'Mélange de légumes frais, bouillon de légumes maison.', 'prix' => '6.00€', 'image' => 'path_to_image/soupe_legumes.jpg']
                    ],
                    'plat' => [
                        ['nom' => 'Steak Frites', 'description' => 'Steak grillé accompagné de frites maison.', 'prix' => '15.00€', 'image' => 'path_to_image/steak_frites.jpg'],
                        ['nom' => 'Poulet Rôti', 'description' => 'Poulet fermier rôti, légumes grillés, purée de pommes de terre.', 'prix' => '12.00€', 'image' => 'path_to_image/poulet_roti.jpg']
                    ],
                    'boisson' => [
                        ['nom' => 'Jus d\'orange frais', 'description' => '100% pur jus, sans conservateurs.', 'prix' => '3.50€', 'image' => 'path_to_image/jus_orange.jpg'],
                        ['nom' => 'Cocktail Mojito', 'description' => 'Rhum, menthe fraîche, citron vert, sucre.', 'prix' => '7.00€', 'image' => 'path_to_image/mojito.jpg']
                    ],
                    'dessert' => [
                        ['nom' => 'Tiramisu', 'description' => 'Crème mascarpone, cacao, biscuits à la cuillère.', 'prix' => '5.50€', 'image' => 'path_to_image/tiramisu.jpg'],
                        ['nom' => 'Crème Brûlée', 'description' => 'Crème à la vanille, sucre caramélisé.', 'prix' => '6.00€', 'image' => 'path_to_image/creme_brulee.jpg']
                    ]
                ],
                'vegetarien' => [
                    'entree' => [
                        ['nom' => 'Bruschetta', 'description' => 'Pain grillé, tomates fraîches, basilic, huile d\'olive.', 'prix' => '7.00€', 'image' => 'path_to_image/bruschetta.jpg']
                    ],
                    'plat' => [
                        ['nom' => 'Lasagne Végétarienne', 'description' => 'Lasagne avec légumes de saison, fromage fondu.', 'prix' => '12.00€', 'image' => 'path_to_image/lasagne_vegetarienne.jpg']
                    ],
                    'boisson' => [
                        ['nom' => 'Thé vert glacé', 'description' => 'Infusion de thé vert, citron, menthe.', 'prix' => '3.00€', 'image' => 'path_to_image/the_vert.jpg']
                    ],
                    'dessert' => [
                        ['nom' => 'Fondant au chocolat', 'description' => 'Gâteau au chocolat avec cœur fondant.', 'prix' => '6.50€', 'image' => 'path_to_image/fondant_chocolat.jpg']
                    ]
                ]
            ];
            ?>

            <!-- Affichage des plats en fonction du type de menu -->
            <section class="mt-8">
                <h2 class="text-2xl font-semibold text-gray-700"><?php echo $menuType == 'gourmand' ? 'Menu Gourmand' : 'Menu Végétarien'; ?></h2>

                <!-- Entrée -->
                <h3 class="text-xl font-semibold text-gray-700 mt-6">Entrées</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php foreach ($plats[$menuType]['entree'] as $plat) : ?>
                        <div class="card p-4 bg-white shadow-lg hover:scale-105 transition-transform duration-300 ease-in-out">
                            <img src="<?php echo $plat['image']; ?>" alt="<?php echo $plat['nom']; ?>" class="w-full h-48 object-cover rounded-md mb-4">
                            <h4 class="text-lg font-semibold text-gray-800"><?php echo $plat['nom']; ?></h4>
                            <p class="text-gray-600"><?php echo $plat['description']; ?></p>
                            <p class="mt-2 text-gray-800"><?php echo $plat['prix']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!---------------------------- Plat Principal ---------------------------->
                <h3 class="text-xl font-semibold text-gray-700 mt-6">Plats Principaux</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php foreach ($plats[$menuType]['plat'] as $plat) : ?>
                        <div class="card p-4 bg-white shadow-lg hover:scale-105 transition-transform duration-300 ease-in-out">
                            <img src="<?php echo $plat['image']; ?>" alt="<?php echo $plat['nom']; ?>" class="w-full h-48 object-cover rounded-md mb-4">
                            <h4 class="text-lg font-semibold text-gray-800"><?php echo $plat['nom']; ?></h4>
                            <p class="text-gray-600"><?php echo $plat['description']; ?></p>
                            <p class="mt-2 text-gray-800"><?php echo $plat['prix']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!---------------------------- Boissons ---------------------------->
                <h3 class="text-xl font-semibold text-gray-700 mt-6">Boissons</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php foreach ($plats[$menuType]['boisson'] as $plat) : ?>
                        <div class="card p-4 bg-white shadow-lg hover:scale-105 transition-transform duration-300 ease-in-out">
                            <img src="<?php echo $plat['image']; ?>" alt="<?php echo $plat['nom']; ?>" class="w-full h-48 object-cover rounded-md mb-4">
                            <h4 class="text-lg font-semibold text-gray-800"><?php echo $plat['nom']; ?></h4>
                            <p class="text-gray-600"><?php echo $plat['description']; ?></p>
                            <p class="mt-2 text-gray-800"><?php echo $plat['prix']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!------------------------------- Desserts ----------------------------------->
                <h3 class="text-xl font-semibold text-gray-700 mt-6">Desserts</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php foreach ($plats[$menuType]['dessert'] as $plat) : ?>
                        <div class="card p-4 bg-white shadow-lg hover:scale-105 transition-transform duration-300 ease-in-out">
                            <img src="<?php echo $plat['image']; ?>" alt="<?php echo $plat['nom']; ?>" class="w-full h-48 object-cover rounded-md mb-4">
                            <h4 class="text-lg font-semibold text-gray-800"><?php echo $plat['nom']; ?></h4>
                            <p class="text-gray-600"><?php echo $plat['description']; ?></p>
                            <p class="mt-2 text-gray-800"><?php echo $plat['prix']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    </div>
</section>

