<?php 

require "../connection.php";

$sql = "select id,nom from menu";
$result = mysqli_query($db,$sql);


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
                    
                    <a href="menu.php" class="px-3 py-2 rounded-md hover:bg-gray-700 transition">
                        <i class="fas fa-utensils mr-2"></i>Menus
                    </a>
                    <a href="/client/reservation.html" class="px-3 py-2 rounded-md hover:bg-gray-700 transition">
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
    <div class="w-screen">
            <div class="flex justify-center items-center opacity-90 my-4 p-2">
                    <!--================ start form =================-->
            <form action="./ReservationPros.php" method="POST" class="bg-gray-500 w-[50%] p-6 rounded-3xl shadow-lg space-y-2">
                <div class="transition-all duration-300 ease-in-out hover:scale-105">
                    <label for="menu">menu :</label>
                    <select name="menu" id="">
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['nom'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="transition-all duration-300 ease-in-out hover:scale-105">
                    <label for="prenom">datereservation :</label>
                    <input type="date" name="datereservation" id="datereservation" placeholder="Prenom" class="px-2 py-1 w-full border-solid rounded-lg">
                </div>
                <div class="transition-all duration-300 ease-in-out hover:scale-105">
                    <label for="heur">heur :</label>
                    <input type="time" name="heur" id="heur" placeholder="Email" class="px-2 py-1 w-full border-solid rounded-lg">
                </div>
                <div class="transition-all duration-300 ease-in-out hover:scale-105">
                    <label for="nombrePersone">nombrePersone :</label>
                    <input type="number" name="nombrePersone" id="nombrePersone" placeholder="nombre" class="px-2 py-1 w-full border-solid rounded-lg">
                </div>
                <div class="flex justify-center">
                <input value="Reserve" name="submit" type="submit" class="bg-green-500 text-white px-4 py-2 rounded-2xl text-lg font-semibold w-[60%] hover:bg-green-600 transform transition-all duration-300 hover:scale-105">
                </div>
            </form>
        </div>
</body>
</html>
<?php include '../includes/footer.php'; ?>
