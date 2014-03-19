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
$myFile = "/Users/joaquin/Sites/quickphp/js/form2/v2/inv2.json";
$fh = fopen($myFile, 'w') or die("can't open file");
$sql = "SELECT genere, especie, b.nom_fitxer FROM BUG JOIN foto AS b ON b.id_bug = bug.id_bug WHERE genere IS NOT NULL AND especie IS NOT NULL";


$result = mysql_query($sql);

if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    die($message);
}
	
$arrayAJson = array();
$i = -1;
$gen = null;
while ($row = mysql_fetch_assoc($result)) {
	
	if ( $gen != $row['genere']  ) {
		//$arrayBD['foto'] = $imgs; //insertr la primera

		array_push($arrayBD, $imgs);
		unset($imgs);
		$imgs[0] = $row['nom_fitxer'];
	} else {
		$gen = $row['genere'];
		$esp = $row['especie'];
		$arrayBD['genere'] = $gen;
		$arrayBD['especie'] = $esp;
		$triki = $row['nom_fitxer'];
		$imgs[$i++] = $triki;
		print_r($imgs);
		array_push($arrayAJson,$arrayBD);
	}
	// $arrayBD['genere'] = $row['genere'];
	// $arrayBD['especie'] = $row['especie'];
	// array_push($arrayAJson, $arrayBD);
}
echo json_encode($arrayAJson);
// fwrite($fh, "{\n");
// fwrite($fh, "\"insectes\": \n");
// fwrite($fh, json_encode($arrayAJson));
// fwrite($fh, "}\n");
// fclose($fh);
include("close_db.php");

?>