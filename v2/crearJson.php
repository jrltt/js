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


$result = mysqli_query($conn, $sql) or die ('Error:'.$sql.' - '.mysqli_error($conn));

//fwrite($fh, "{\n");
//fwrite($fh, "\"insectes\": [\n");
$return = array();
$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
	//echo $row['genere']." ".$row['especie']."<br />";
	$newArr['genere'] = $row['genere'];
	$newArr['especie'] = $row['especie'];
	// if ( count($row['nom_fitxer']) > 1 ) {
	// 	$newArr['foto'] = $row['nom_fitxer'];
	// } 
	// $newArr['foto'] = $row['nom_fitxer'];
	array_push($return, $newArr);
	//if ($i > 0) fwrite($fh, ",\n"); //hem d'aconseguir que la última línia no tingui la coma
	// $stringInsecte = "{ \"genere\":\"".$row['genere']."\" , \"especie\":\"".$row['especie']."\" }";
	//fwrite($fh, $stringInsecte);
	$i++;
}
fwrite($fh, "{\n");
fwrite($fh, "\"insectes\": \n");
fwrite($fh, json_encode($return));
fwrite($fh, "}\n");
fclose($fh);
include("close_db.php");

?>