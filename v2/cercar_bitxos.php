<?php
	//sleep(1);
	include("open_db.php");
		
	$id_familia = $_GET["id_familia"];
	//echo $id_com;
	$url800 = 'http://wikijoan.dyndns.org/fotosarthropoda/pics800/';
	$url400 = 'http://wikijoan.dyndns.org/fotosarthropoda/pics400/';
	$thumb = 'http://wikijoan.dyndns.org/fotosarthropoda/thumbnails/';
	if ($id_familia != "") {
		$sql = 
		"SELECT B.id_bug, genere, especie, titol, concat('$url400',substr(nom_fitxer,1,2),'/',substr(nom_fitxer,3,2),'/',replace(nom_fitxer,'.JPG','_pic.JPG')) pic, concat('$thumb',substr(nom_fitxer,1,2),'/',substr(nom_fitxer,3,2),'/',replace(nom_fitxer,'.JPG','_th.JPG')) thumb, B.notes 
		from BUG B, FOTO F 
		where id_taxo=$id_familia and B.id_bug=F.id_bug and ordre=1";

		$result = mysql_query($sql);

		if (!$result) {
			 $message  = 'Invalid query: ' . mysql_error() . "\n";
			 die($message);
		}
		
		echo "<h3>Bichos</h3>";
		//echo "<table border='1'>";
		while ($row = mysql_fetch_assoc($result)) {
			echo '<div class="bug-box">';
			echo '<h3>'.$row['genere'].'</h3>';
			echo '<a href="'.$row['pic'].'"><img src="'.$row['thumb'].'" /></a>';
			echo '<h1>'.$row['titol'].'</h1>';
			echo '<h4>'.$row['especie'].'</h4>';
			echo '<p>notas:'.$row['notes'].'</p>';
			echo '</div>';
		}
		//echo "</table>";
	}
	include("close_db.php");
?>
