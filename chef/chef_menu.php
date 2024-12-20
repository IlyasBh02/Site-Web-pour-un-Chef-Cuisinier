<?php
// Démarrer la session et inclure les fichiers nécessaires
session_start();

// Vérifier l'accès au rôle de chef
if (!isset($_SESSION['user_id'])) {
    header("Location: ../public/login.php");
    exit();
}

// Inclure la connexion à la base de données
include_once '../connection.php';

// Logique pour ajouter ou mettre à jour un menu
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $menuName = $_POST['menu_name'];
    $plats = $_POST['plats']; // Tableau de plats

    // Ajouter le menu
    $sqlMenu = "INSERT INTO menu (nom, chef_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sqlMenu);
    $stmt->execute([$menuName, $_SESSION['chef_id']]);
    $menuId = $conn->lastInsertId();

    // Ajouter les plats liés
    $sqlPlat = "INSERT INTO plat (nom, description, prix, menu_id) VALUES (?, ?, ?, ?)";
    $stmtPlat = $conn->prepare($sqlPlat);
    foreach ($plats as $plat) {
        $stmtPlat->execute([$plat['nom'], $plat['description'], $plat['prix'], $menuId]);
    }

    echo "<div class='text-green-500'>Menu ajouté avec succès !</div>";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Chef - Restaurant</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        // Script pour ajouter dynamiquement des champs pour les plats
        function addPlatField() {
            const container = document.getElementById('plats-container');
            const platField = `
                <div class="plat-field border p-3 mb-3">
                    <input type="text" name="plats[][nom]" placeholder="Nom du plat" class="border p-2 rounded w-full mb-2" required>
                    <textarea name="plats[][description]" placeholder="Description" class="border p-2 rounded w-full mb-2"></textarea>
                    <input type="number" name="plats[][prix]" placeholder="Prix (€)" class="border p-2 rounded w-full" required>
                    <button type="button" onclick="removePlatField(this)" class="text-red-500 mt-2">Supprimer</button>
                </div>`;
            container.insertAdjacentHTML('beforeend', platField);
        }

        function removePlatField(button) {
            button.parentElement.remove();
        }
    </script>
</head>
<body>
<nav class="bg-gray-900 text-white shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <span class="text-xl font-bold">Restaurant</span>
                    <a href="dashboard.php" class="px-3 py-2 rounded-md hover:bg-gray-700 transition">
                        <i class="fas fa-home mr-2"></i>Accueil
                    </a>
                    <a href="chef_menu.php" class="px-3 py-2 rounded-md hover:bg-gray-700 transition">
                        <i class="fas fa-utensils mr-2"></i>Menus
                    </a>
                    <a href="reservations.php" class="px-3 py-2 rounded-md hover:bg-gray-700 transition">
                        <i class="fas fa-calendar-alt mr-2"></i>Réservations
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="profile.php" class="flex items-center px-3 py-2 rounded-md hover:bg-gray-700 transition">
                        <i class="fas fa-user mr-2"></i>Profil
                    </a>
                    <button onclick="window.location.href='../public/logout.php';" class="px-4 py-2 bg-red-600 rounded-md hover:bg-red-700 transition">
                        <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mx-auto my-10">
        <h1 class="text-3xl font-bold mb-5">Créer un nouveau menu</h1>
        <form method="POST" class="bg-white p-5 rounded shadow">
            <label for="chef_menu.php" class="block font-bold mb-2">Nom du Menu :</label>
            <input type="text" name="menu_name" id="menu_name" class="border p-2 rounded w-full mb-5" required>

            <h2 class="text-xl font-bold mb-3">Ajouter des plats :</h2>
            <div id="plats-container" class="mb-5"></div>
            <button type="button" onclick="addPlatField()" class="bg-blue-500 text-white px-3 py-2 rounded">Ajouter un plat</button>

            <button type="submit" class="bg-green-500 text-white px-5 py-2 rounded mt-5 block">Enregistrer</button>
        </form>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
