<!-- Tableau de bord client -->

<?php include '../includes/header.php'; ?>
<!-- <h1>Tableau de bord client</h1>
<p>Bienvenue, [Nom du client]</p>
<a href="reservation.php">Faire une réservation</a> -->


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Chef - Restaurant</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <nav class="bg-gray-900 text-white shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <span class="text-xl font-bold">Restaurant</span>
                    <!-- <a href="dashboard.php" class="px-3 py-2 rounded-md hover:bg-gray-700 transition">
                        <i class="fas fa-home mr-2"></i>Accueil
                    </a> -->
                    <a href="menu.php" class="px-3 py-2 rounded-md hover:bg-gray-700 transition">
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
                    <button onclick="window.location.href='../public/index.php';" class="px-4 py-2 bg-red-600 rounded-md hover:bg-red-700 transition">
                        <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
                    </button>
                </div>
            </div>
        </div>
    </nav>

<section class="flex ">
    <div class="w-[15%] bg-black">
        <div>
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </div>
    <div class="w-full bg-gray-100 ">

    </div>
</section>
</body>
</html>

<?php include '../includes/footer.php'; ?>
