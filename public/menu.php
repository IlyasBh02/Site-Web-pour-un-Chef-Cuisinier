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
<?php 
    session_start();
    if (isset($_POST['reservation'])) {
        if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
        header("Location: ../client/reservation.php");
    }  
        else{
            header("Location: ../public/login.php");
        }
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
                $stmt = $db->prepare("SELECT * FROM plat WHERE menuId = ?");
                $stmt->bind_param("i", $menu['id']);
                $stmt->execute();
                $resultPlats = $stmt->get_result();

                if ($resultPlats->num_rows > 0):
                    $plats = $resultPlats->fetch_all(MYSQLI_ASSOC);
                    foreach ($plats as $plat):
                ?>
                    <div class="border rounded-lg p-4 shadow-md hover:scale-105 transition-transform duration-300 ease-in-out">
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
                       
                        <form method="POST">
            
                            <button type="submit" name="reservation" class="w-[50%] py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                                Reservation
                            </button>
                        </form>
                    </div>
                    
                <?php 
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    <?php endforeach; ?>
   
</section>

<section class="py-16">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-12">Futur Meal</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Menu Card 1 -->
            <div class="bg-white shadow-2xl rounded-lg overflow-hidden transform transition-all hover:scale-105 hover:shadow-xl hover:translate-y-2 duration-300 ease-in-out">
                <img src="../img/enrees1.png" alt="Entrées" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Entrées</h3>
                    <p class="text-gray-600 text-sm">Une variété de délicieuses entrées pour commencer votre repas.</p>
                </div>
            </div>
            <!-- Menu Card 2 -->
            <div class="bg-white shadow-2xl rounded-lg overflow-hidden transform transition-all hover:scale-105 hover:shadow-xl hover:translate-y-2 duration-300 ease-in-out">
                <img src="../img/plats-prn1.png" alt="Plats Principaux" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Plats Principaux</h3>
                    <p class="text-gray-600 text-sm">Des plats gourmands pour satisfaire toutes vos envies.</p>
                </div>
            </div>
            <!-- Menu Card 3 -->
            <div class="bg-white shadow-2xl rounded-lg overflow-hidden transform transition-all hover:scale-105 hover:shadow-xl hover:translate-y-2 duration-300 ease-in-out">
                <img src="../img/boisson1.png" alt="Boissons" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Boissons</h3>
                    <p class="text-gray-600 text-sm">Des boissons rafraîchissantes pour accompagner votre repas.</p>
                </div>
            </div>
            <!-- Menu Card 4 -->
            <div class="bg-white shadow-2xl rounded-lg overflow-hidden transform transition-all hover:scale-105 hover:shadow-xl hover:translate-y-2 duration-300 ease-in-out">
                <img src="../img/desserts1.png" alt="Desserts" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Desserts</h3>
                    <p class="text-gray-600 text-sm">Terminez votre repas en beauté avec nos desserts sucrés.</p>
                </div>
            </div>
            <!-- Menu Card 5 - Entrées Végétariennes -->
            <div class="bg-white shadow-2xl rounded-lg overflow-hidden transform transition-all hover:scale-105 hover:shadow-xl hover:translate-y-2 duration-300 ease-in-out">
                <img src="../img/entrees_vegetariennes.png" alt="Entrées Végétariennes" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Entrées Végétariennes</h3>
                    <p class="text-gray-600 text-sm">Découvrez des entrées savoureuses et saines, 100% végétariennes.</p>
                </div>
            </div>
            <!-- Menu Card 6 - Plats Végétariens -->
            <div class="bg-white shadow-2xl rounded-lg overflow-hidden transform transition-all hover:scale-105 hover:shadow-xl hover:translate-y-2 duration-300 ease-in-out">
                <img src="../img/plats_vegetariens.png" alt="Plats Végétariens" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Plats Végétariens</h3>
                    <p class="text-gray-600 text-sm">Des plats riches en saveurs, idéals pour un repas végétarien équilibré.</p>
                </div>
            </div>
            <!-- Menu Card 7 - Snacks -->
            <div class="bg-white shadow-2xl rounded-lg overflow-hidden transform transition-all hover:scale-105 hover:shadow-xl hover:translate-y-2 duration-300 ease-in-out">
                <img src="../img/snacks.png" alt="Snacks" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Snacks</h3>
                    <p class="text-gray-600 text-sm">De petites bouchées savoureuses à déguster à tout moment de la journée.</p>
                </div>
            </div>
            <!-- Menu Card 8 - Sodas -->
            <div class="bg-white shadow-2xl rounded-lg overflow-hidden transform transition-all hover:scale-105 hover:shadow-xl hover:translate-y-2 duration-300 ease-in-out">
                <img src="../img/sodas.png" alt="Sodas" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Sodas</h3>
                    <p class="text-gray-600 text-sm">Des boissons pétillantes pour un moment rafraîchissant.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include '../includes/footer.php'; ?>
