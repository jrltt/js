<?php
	include("open_db.php");
	$id_com = $_GET["id_com"];

	$sql = "SELECT * FROM provincies where id_com=$id_com order by id_prov";

	$result = mysql_query($sql);

	if (!$result) {
	    $message  = 'Invalid query: ' . mysql_error() . "\n";
	    die($message);
	}
		
	echo "<select name=\"provincia\" onchange=\"canvi_provincia(this.value), limpiar(2)\">";
	echo '<option></option>';
	while ($row = mysql_fetch_assoc($result)) {
		echo "<option value=".$row['id_prov'].">".$row['provincia']."</option>";
	}
	echo "</select>";

	include("close_db.php");
?>