<?php
	include("open_db.php");
		
	$id_classe = $_GET["id_classe"];

	if ($id_classe != "") {
		$sql = "SELECT distinct id_order, ordre from VTAXO V, BUG B where V.id_family=B.id_taxo and id_class=$id_classe order by id_order";

		$result = mysql_query($sql);

		if (!$result) {
			 $message  = 'Invalid query: ' . mysql_error() . "\n";
			 die($message);
		}
		
		echo "<span>ordre: </span>";
		echo "<select name=\"ordre\" onchange=\"canvi_ordre(this.value)\">";
		echo "<option value=''>Selecciona un ordre</option>";
		while ($row = mysql_fetch_assoc($result)) {
			echo "<option value=".$row['id_order'].">".$row['ordre']."</option>";
		}
		echo "</select>";
	}
	include("close_db.php");
?>
