<?php
include '../includes/header.php';
include '../connection.php';

// Récupérer tous les menus
$stmt = $db->prepare('SELECT * FROM menu');
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $menus = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $menus = [];
}
?>

<section class="p-8 bg-gray-50">
    <h1 class="text-4xl text-center font-bold mb-10 text-gray-800">Nos Menus Complets</h1>

    <?php foreach ($menus as $menu): ?>
        <div class="mb-16 bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-3xl font-bold text-primary mb-6 border-b-2 border-primary pb-2">
                <?= htmlspecialchars($menu['nom']) ?>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php
                // Requête préparée pour récupérer tous les plats du menu
                $stmt = $db->prepare("SELECT * FROM plat WHERE menuId = ?");
                $stmt->bind_param("i", $menu['id']);
                $stmt->execute();
                $resultPlats = $stmt->get_result();

                if ($resultPlats->num_rows > 0):
                    $plats = $resultPlats->fetch_all(MYSQLI_ASSOC);
                    foreach ($plats as $plat):
                ?>
                    <div class="border rounded-lg p-4 shadow-md">
                        <h3 class="text-2xl font-semibold text-gray-700 mb-4 text-center">
                            <?= htmlspecialchars($plat['nom']) ?>
                        </h3>

                        <p class="text-gray-600 text-sm mb-4"><?= htmlspecialchars($plat['ingridiant']) ?></p>

                        <?php if (!empty($plat['image'])): ?>
                            <img 
                                src="<?= htmlspecialchars($plat['image']) ?>" 
                                alt="<?= htmlspecialchars($plat['nom']) ?>" 
                                class="w-full h-32 object-cover rounded-md mt-4"
                            >
                        <?php endif; ?>
                    </div>
                <?php 
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    <?php endforeach; ?>
</section>

<?php include '../includes/footer.php'; ?>
