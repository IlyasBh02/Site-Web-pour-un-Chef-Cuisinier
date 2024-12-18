<!-- Gestion des menus -->
<?php 
session_start();
if (isset($_SESSION["id"])) {
    echo $_SESSION["x"];
    session_destroy();
}
else 
    header("Location: dashboard.php");

?>