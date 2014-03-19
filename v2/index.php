<?php include("open_db.php"); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css" />
</head>
	<body>
		<div class="menu">
			<h2>Navegació taxonòmica del philum arthropoda</h2>
			<h3>Versió 2</h3>
			<p>Es solucionen els problemes de usabilitat ficant en el primer item de les llistes desplegables: <em>Selecciona una classe</em>, <em>Selecciona una ordre</em>, <em>Selecciona una família</em>. Hem de preveure què passa si l'usuari selecciona un d'aquests items no vàlids.
			</p>
			<div id="classe">
				<span>Classe:</span>
				<select name="classe" onchange="canvi_classe(this.value)">
				<?php
					$sql = "SELECT DISTINCT id_class, class FROM VTAXO V, BUG B WHERE V.id_family=B.id_taxo";
					$result = mysqli_query($conn, $sql) or die ('Error:'.$result.' - '.mysqli_error($conn));

					echo "<option value=''>Selecciona una classe</option>";
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<option value=".$row['id_class'].">".$row['class']."</option>";
					}
				?>
				</select>
			</div>
			<div id="ordre"></div>
			<div id="familia"></div>

		</div>
		<div class="things">
			<div id="bitxos"></div>
		</div>
	</body>
	<script src="script.js"></script>
</html>
<?php include("close_db.php"); ?>
