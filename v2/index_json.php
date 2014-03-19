<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
	<head>
		<title>Llista Insectes Col.lecció</title>
		<meta http-equiv="content-type" content="text/html charset=utf-8" />
		<link rel="stylesheet" href="style.css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	</head>
	<body onload='llistar_insectes()'>
			<h1>Lista de insectos</h1>
			<div id="insectes"></div>
		<script src="masonry.pkgd.min.js"></script>	
		<script src="scriptJSON.js"></script>
		<script>
		var container = document.querySelector('#insectes');
		var msnry = new Masonry( container, {
		  // options
		  columnWidth: 240,
		  itemSelector: '.item'
		});
	</script>
	</body>
</html>