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