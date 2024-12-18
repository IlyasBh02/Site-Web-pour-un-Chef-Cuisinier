<?php include '../includes/header.php'; ?>

<section class="min-h-screen bg-gray-100">
    <div class="container mx-auto py-8 px-6">
        <!-- Title -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Tableau de bord - Chef</h1>
            <p class="text-gray-600">Bienvenue, visualisez et gérez vos activités.</p>
        </div>

        <!-- Statistics Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Card: Clients -->
            <div class="bg-white shadow-md rounded-lg p-4 flex items-center">
                <div class="bg-blue-500 text-white rounded-full w-12 h-12 flex items-center justify-center mr-4">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-800">25</h3>
                    <p class="text-gray-600">Clients</p>
                </div>
            </div>
            <!-- Card: Plats -->
            <div class="bg-white shadow-md rounded-lg p-4 flex items-center">
                <div class="bg-green-500 text-white rounded-full w-12 h-12 flex items-center justify-center mr-4">
                    <i class="fas fa-utensils"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-800">15</h3>
                    <p class="text-gray-600">Plats</p>
                </div>
            </div>
            <!-- Card: Messages -->
            <div class="bg-white shadow-md rounded-lg p-4 flex items-center">
                <div class="bg-yellow-500 text-white rounded-full w-12 h-12 flex items-center justify-center mr-4">
                    <i class="fas fa-envelope"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-800">8</h3>
                    <p class="text-gray-600">Messages non lus</p>
                </div>
            </div>
            <!-- Card: Réservations -->
            <div class="bg-white shadow-md rounded-lg p-4 flex items-center">
                <div class="bg-red-500 text-white rounded-full w-12 h-12 flex items-center justify-center mr-4">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-800">12</h3>
                    <p class="text-gray-600">Réservations</p>
                </div>
            </div>
        </div>

        <!-- Actions Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Manage Menus -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Gérer les menus</h2>
                <p class="text-gray-600 mb-6">Ajoutez, modifiez ou supprimez des plats du menu.</p>
                <a href="menu.php" class="inline-block px-6 py-3 bg-primary text-white font-bold rounded-lg hover:bg-primary-dark transition-colors">
                    Gérer le menu
                </a>
            </div>

            <!-- View Messages -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Messages des clients</h2>
                <p class="text-gray-600 mb-6">Consultez les messages reçus des clients.</p>
                <a href="message.php" class="inline-block px-6 py-3 bg-primary text-white font-bold rounded-lg hover:bg-primary-dark transition-colors">
                    Voir les messages
                </a>
            </div>
        </div>

        <!-- Recent Activity Section -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Activité récente</h2>
            <div class="bg-white shadow-md rounded-lg p-6">
                <ul>
                    <li class="flex items-center justify-between py-2 border-b border-gray-200">
                        <span class="text-gray-800">Nouvelle réservation de Marie Dupont</span>
                        <span class="text-gray-600 text-sm">Il y a 2 heures</span>
                    </li>
                    <li class="flex items-center justify-between py-2 border-b border-gray-200">
                        <span class="text-gray-800">Message de Jean Martin</span>
                        <span class="text-gray-600 text-sm">Hier</span>
                    </li>
                    <li class="flex items-center justify-between py-2">
                        <span class="text-gray-800">Plat ajouté : Tarte aux fraises</span>
                        <span class="text-gray-600 text-sm">Il y a 3 jours</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
