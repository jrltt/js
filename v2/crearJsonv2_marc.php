<?php
/*
Volem escriure un fitxer insectes.json amb la següent sintaxi:
{
"insectes": [
{ "genere":"Acherontia" , "especie":"atropos" },
{ "genere":"Adela" , "especie":"australis" },
{ "genere":"Adelphocoris" , "especie":"vandalicus" },
{ "genere":"Adonia" , "especie":"variegata" },
{ "genere":"Agrypnus" , "especie":"murinus" },
{ "genere":"Akis" , "especie":"tuberculata" }
]
}
és un onbjecte JSON, que conté una matriu de 6 objectes JSON amb dues parelles camp-valor.
*/

	include("open_db.php");
	$myFile = "/Users/joaquin/Sites/quickphp/js/form2/v2/json_bueno.json";
	$fh = fopen($myFile, 'w') or die("can't open file");
	//$sql = "SELECT genere, especie, b.nom_fitxer FROM BUG JOIN foto AS b ON b.id_bug = bug.id_bug WHERE genere IS NOT NULL AND especie IS NOT NULL";
	$sql = "SELECT genere, especie, titol, nom_cat, bug.notes, bug.id_bug, nom_fitxer 
		from bug 
		JOIN foto ON bug.id_bug=foto.id_bug 
		where genere is not NULL and especie is not NULL
		ORDER BY `bug`.`genere` ASC";

	$result = mysqli_query($conn, $sql) or die ('Error:'.$sql.' - '.mysqli_error($conn));

	

	//array que se llenara con los datos
	$arrayJSON = array();
	//arrays donde se guardan los datos de la BD
	$arrayVacio['genere'] = array();
	$arrayVacio['especie'] = array();
	$arrayVacio['fotos'] = array();

	$auxFotos = array();

	$i = 0;
	fwrite($fh, "{\n");
	fwrite($fh, "\"insectes\": ");
	$total = 0;
	while ( $row = mysqli_fetch_assoc($result) ) {
			$gen2 = $row['genere'];
		
		// if ( $gen != $row['genere'] ) {
		// 	$arrayVacio['genere'] = $gen;
		// 	$arrayVacio['especie'] = $esp;
		// 	$arrayVacio['fotos'] = $auxFotos;
		// 	array_push($arrayJSON, $arrayVacio);
		// 	$auxFotos = "";
		// 	$i = 0;
		// } else {
			if( $gen2 != $gen ) {
				// echo 'dif';
				// echo $gen.' ' .$esp.'<br/>';
				$arrayVacio['genere'] = $gen;
				$arrayVacio['especie'] = $esp;
				$arrayVacio['fotos'] = $auxFotos;
				array_push($arrayJSON, $arrayVacio);
				$auxFotos = "";
				$i = 0;
			}
			$gen = $row['genere'];
			$esp = $row['especie'];
			$fot = $row['nom_fitxer'];
			$auxFotos[$i++] = $fot;
		// }

	}
	// echo json_encode($arrayJSON);
	fwrite($fh, json_encode($arrayJSON));
	fwrite($fh, "}\n");
	fclose($fh);
	include("close_db.php");

?>