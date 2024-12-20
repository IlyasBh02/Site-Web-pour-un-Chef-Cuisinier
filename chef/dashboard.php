<?php
include '../connection.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == 2) {
    header('Location: ../public/login.php');
    exit();
}

// Traitement de l'ajout de plat avec image
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_dishes'])) {
    $success_messages = [];
    $error_messages = [];

    foreach ($_POST['dish_name'] as $i => $name) {
        $name = mysqli_real_escape_string($db, trim($name));
        $description = mysqli_real_escape_string($db, trim($_POST['dish_description'][$i]));
        $price = floatval($_POST['dish_price'][$i]);

        if (empty($name) || empty($description) || $price <= 0) {
            $error_messages[] = "Tous les champs sont obligatoires pour chaque plat.";
            continue;
        }

        // Traitement de l'image
        if (isset($_FILES['dish_image']['name'][$i]) && $_FILES['dish_image']['error'][$i] === 0) {
            $image_name = $_FILES['dish_image']['name'][$i];
            $image_tmp_name = $_FILES['dish_image']['tmp_name'][$i];
            
            $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
            $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
            
            if (in_array($image_ext, $allowed_ext)) {
                $new_image_name = uniqid('dish_', true) . '.' . $image_ext;
                $image_path = '../uploads/' . $new_image_name;
                
                if (move_uploaded_file($image_tmp_name, $image_path)) {
                    $query = $db->prepare("INSERT INTO plat (name, description, price, image) VALUES (?, ?, ?, ?)");
                    $query->bind_param("ssds", $name, $description, $price, $image_path);
                    
                    if ($query->execute()) {
                        $success_messages[] = "Le plat '$name' a été ajouté avec succès.";
                    } else {
                        $error_messages[] = "Erreur lors de l'ajout du plat '$name'.";
                    }
                }
            }
        }
    }
}

// Traitement de l'annulation des réservations avec confirmation
if (isset($_POST['cancel_reservation'])) {
    $reservation_id = intval($_POST['reservation_id']);
    $query = $db->prepare("UPDATE reservation SET statut = 'annulée' WHERE id = ?");
    $query->bind_param("i", $reservation_id);
    
    if ($query->execute()) {
        $success_messages[] = "Réservation annulée avec succès!";
    } else {
        $error_messages[] = "Erreur lors de l'annulation de la réservation.";
    }
}

// Récupérer les réservations du jour
$today = date('Y-m-d');
$reservations_query = $db->prepare("
    SELECT r.id, c.nom, c.prenom, r.nombrePersone, r.datereservation, m.nom as menu_nom 
    FROM reservation r
    JOIN client c ON r.clientId = c.id
    JOIN menu m ON r.menuId = m.id
    WHERE r.status = 'confirmée' 
    AND DATE(r.datereservation) = ?
    ORDER BY r.datereservation ASC
");
$reservations_query->bind_param("s", $today);
$reservations_query->execute();
$reservations_result = $reservations_query->get_result();
?>

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
                    <a href="dashboard.php" class="px-3 py-2 rounded-md hover:bg-gray-700 transition">
                        <i class="fas fa-home mr-2"></i>Accueil
                    </a>
                    <a href="chef_menu.php" class="px-3 py-2 rounded-md hover:bg-gray-700 transition">
                        <i class="fas fa-utensils mr-2"></i>Menus
                    </a>
                    <!-- <a href="reservations.php" class="px-3 py-2 rounded-md hover:bg-gray-700 transition">
                        <i class="fas fa-calendar-alt mr-2"></i>Réservations
                    </a> -->
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


    <div class="container mx-auto px-6 py-8">
        <?php if (!empty($success_messages)): ?>
            <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                <?php foreach($success_messages as $message): ?>
                    <p><i class="fas fa-check-circle mr-2"></i><?php echo htmlspecialchars($message); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($error_messages)): ?>
            <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                <?php foreach($error_messages as $message): ?>
                    <p><i class="fas fa-exclamation-circle mr-2"></i><?php echo htmlspecialchars($message); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>


        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-bold mb-6 flex items-center">
                <i class="fas fa-plus-circle mr-3 text-green-600"></i>
                Ajouter un nouveau plat
            </h2>
            
            <form id="addDishesForm" action="" method="POST" enctype="multipart/form-data">
                <div id="dishesContainer">
                    <!-- Les champs de plat seront ajoutés ici  -->
                </div>
                <div class="flex space-x-4 mt-6">
                    <button type="button" id="addDishBtn" class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition flex items-center">
                        <i class="fas fa-plus mr-2"></i>Ajouter un plat
                    </button>
                    <button type="submit" name="add_dishes" class="px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition flex items-center">
                        <i class="fas fa-save mr-2"></i>Enregistrer
                    </button>
                </div>
            </form>
        </div>


        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-6 flex items-center">
                <i class="fas fa-calendar-check mr-3 text-blue-600"></i>
                Réservations du jour
            </h2>
            
            <?php if (mysqli_num_rows($reservations_result) > 0): ?>
                <div class="overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Menu</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Personnes</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Heure</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php while ($row = mysqli_fetch_assoc($reservations_result)): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php echo htmlspecialchars($row['prenom'] . ' ' . $row['nom']); ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php echo htmlspecialchars($row['menu_nom']); ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php echo htmlspecialchars($row['nombrePersone']); ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php echo date('H:i', strtotime($row['datereservation'])); ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?');">
                                            <input type="hidden" name="reservation_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="cancel_reservation" class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-times-circle mr-1"></i>Annuler
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="text-center py-4 text-gray-500">
                    <i class="fas fa-calendar-times text-4xl mb-3"></i>
                    <p>Aucune réservation pour aujourd'hui</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        document.getElementById('addDishBtn').addEventListener('click', function() {
            const container = document.getElementById('dishesContainer');
            const dishCount = container.children.length;
            
            const dishGroup = document.createElement('div');
            dishGroup.classList.add('bg-gray-50', 'p-4', 'rounded-lg', 'mb-4', 'relative');
            
            // Template du formulaire d'ajout de plat
            dishGroup.innerHTML = `
                <div class="absolute top-2 right-2">
                    <button type="button" onclick="this.closest('.bg-gray-50').remove()" class="text-red-500 hover:text-red-700">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Nom du plat</label>
                        <input type="text" name="dish_name[]" required
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                            placeholder="Nom du plat">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Prix</label>
                        <input type="number" name="dish_price[]" step="0.01" required
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                            placeholder="Prix">
                    </div>
                    <div class="space-y-2 md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="dish_description[]" required
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                            rows="3" placeholder="Description du plat"></textarea>
                    </div>
                    <div class="space-y-2 md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Image</label>
                        <input type="file" name="dish_image[]" accept="image/*" required
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
            `;
            
            container.appendChild(dishGroup);
        });
    </script>
</body>
</html>

<?php mysqli_close($db); ?>