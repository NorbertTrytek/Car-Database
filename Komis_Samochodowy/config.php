<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "komis_samochodowy";
$connect = new mysqli($servername, $username, $password, $db);
if($connect == FALSE) {
	echo "Connection lost";
}
?>