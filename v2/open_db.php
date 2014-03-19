<?php
	$conn = mysqli_connect("localhost", "root", "1234") or die ('No se puede conectar con la BBDD'. mysqli_error($conn));
	mysqli_select_db($conn , "arthropoda") or die ('Could not select jbalmes database.');
	mysqli_set_charset($conn,'utf8');
?>

