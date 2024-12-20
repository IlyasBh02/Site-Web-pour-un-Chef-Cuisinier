<?php
require "../connection.php";

$sql1 = "SELECT menu.nom, reservation.datereservation, reservation.id ,reservation.heur, reservation.nombrePersone 
         FROM menu 
         JOIN reservation ON reservation.menuId = menu.id";
$result = mysqli_query($db, $sql1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Client - Réservations</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto my-10">
        <h1 class="text-2xl font-bold text-center mb-6">Mes Réservations</h1>
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-700 bg-white border border-gray-300">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                    <tr>
                        <th class="px-6 py-3">Menu</th>
                        <th class="px-6 py-3">Date de réservation</th>
                        <th class="px-6 py-3">Heure</th>
                        <th class="px-6 py-3">Nombre de personnes</th>
                        <th class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4"><?= $row['nom'] ?></td>
                            <td class="px-6 py-4"><?= $row['datereservation'] ?></td>
                            <td class="px-6 py-4"><?= $row['heur'] ?></td>
                            <td class="px-6 py-4"><?= $row['nombrePersone'] ?></td>
                            <td class="px-6 py-4">
                                <a href="./Editer.php?id=<?php  echo $row['id'] ?> ">Editer</button>
                                <a href="./supprimer.php?id=<?php echo $row['id'] ?> ">supprimer</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
