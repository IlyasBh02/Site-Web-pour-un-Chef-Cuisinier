<!-- Tableau de bord chef -->

<?php include '../includes/header.php';
session_start();
if (isset ($_POST['']))
{
    $email = $_POST["email"];
    $password = htmlspecialchars($_POST["password"]);
    $result = $db->query("select * from client where email=".$email." and password=".$password);
    if($result->numrows() > 0)
    {
        $_SESSION["id"] = $result["id"];
        if ($result["role"] == "chef")
            header("Location: chef/dashboard.php");
        else 
            header("Location: client/dashboard.php");


    }
}

?>
<h1>Tableau de bord chef</h1>
<p>Gestion des menus, des clients et des messages.</p>
<a href="menus.php">Gérer les menus</a>
<a href="clients.php">Gérer les clients</a>



<?php include '../includes/footer.php'; ?>
