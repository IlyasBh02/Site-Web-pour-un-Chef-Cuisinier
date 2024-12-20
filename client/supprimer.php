<?php

require "../connection.php";


$id = $_GET['id'];

$sql = "DELETE FROM reservation where id='$id'";

mysqli_query($db,$sql);