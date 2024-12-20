

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
                    <button onclick="window.location.href='../public/index.php';" class="px-4 py-2 bg-red-600 rounded-md hover:bg-red-700 transition">
                        <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <div class="w-screen">
            <div class="flex justify-center items-center opacity-90 my-4 p-2">
                    <!--================ start form =================-->
            <form action="login.php" method="post" class="bg-gray-500 w-[50%] p-6 rounded-3xl shadow-lg space-y-2">
                <div class="transition-all duration-300 ease-in-out hover:scale-105">
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" id="nom" placeholder="Nom" class="px-2 py-1 w-full border-solid rounded-lg">
                </div>
                <div class="transition-all duration-300 ease-in-out hover:scale-105">
                    <label for="prenom">Prenom :</label>
                    <input type="text" name="prenom" id="prenom" placeholder="Prenom" class="px-2 py-1 w-full border-solid rounded-lg">
                </div>
                <div class="transition-all duration-300 ease-in-out hover:scale-105">
                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" placeholder="Email" class="px-2 py-1 w-full border-solid rounded-lg">
                </div>
                <div class="transition-all duration-300 ease-in-out hover:scale-105">
                    <label for="tele">Heur :</label>
                    <input type="date" name="tele" id="tele" placeholder="Telephone" class="px-2 py-1 w-full border-solid rounded-lg">
                </div>
                <div class="transition-all duration-300 ease-in-out hover:scale-105">
                    <label for="adress">Adress :</label>
                    <input type="text" name="adress" id="adress" placeholder="Adress" class="px-2 py-1 w-full border-solid rounded-lg">
                </div>
                <div class="transition-all duration-300 ease-in-out hover:scale-105">
                    <label for="password">Password :</label>
                    <input type="text" name="password" id="password" placeholder="Mot de passe" class="px-2 py-1 w-full border-solid rounded-lg">
                </div>
                <div class="flex justify-center">
                <input value="Se connecter" name="submit" type="submit" class="bg-green-500 text-white p-2 rounded-2xl text-lg font-semibold w-[60%] hover:bg-green-600 transform transition-all duration-300 hover:scale-105">
                </div>
            </form>
        </div>


  <?php  
  if(isset($_POST['submit'])){
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $email = $_POST['email'];
      $tele = $_POST['tele'];
      $adress = $_POST['adress'];
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT); 

      $query = "INSERT INTO `client`(`nom`, `prenom`,`email`,`tele`,`adress`,`password`)  
              VALUE ('$nom', '$prenom','$email','$tele','$adress','$password')";
      $res = $db->query($query);
      // echo $res;
      header("Refresh: 0");
  }

  ?>

  
</body>
</html>
<?php include '../includes/footer.php'; ?>
