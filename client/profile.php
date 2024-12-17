<!-- Page profil client -->
<?php
require('connection.php');
$sql = "SELECT * FROM `client`";
$result = $db->query($sql);
?>