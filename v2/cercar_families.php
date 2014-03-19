<?php
	//sleep(1);
	include("open_db.php");
		
	$id_ordre = $_GET["id_ordre"];
	//echo $id_com;
	if ($id_ordre != "") {
		$sql = "SELECT distinct id_family, family from VTAXO V, BUG B where V.id_family=B.id_taxo and id_order=$id_ordre order by id_family;";

		$result = mysql_query($sql);

		if (!$result) {
			 $message  = 'Invalid query: ' . mysql_error() . "\n";
			 die($message);
		}
		
		echo "<span>Família: </span>";
		echo "<select name=\"familia\" onchange=\"canvi_familia(this.value)\">";
		echo "<option value=''>Selecciona una família</option>";
		while ($row = mysql_fetch_assoc($result)) {
			echo "<option value=".$row['id_family'].">".$row['family']."</option>";
		}
		echo "</select>";
	}
	include("close_db.php");
?>
