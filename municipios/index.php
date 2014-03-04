<?php include("open_db.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<title>Comunitats, províncies, municipis</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta http-equiv="content-type" content="text/html charset=utf-8" />
	<link rel="stylesheet" href="style.css" />
	<script>
		function canvi_comunitat(id_com)
		{
			var xmlhttp;
			var txt,x,xx,i;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			}
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					txt=xmlhttp.responseText;
					document.getElementById('provincia').innerHTML=txt;
				} else {
					document.getElementById('provincia').innerHTML = '<img src="http://www.ajaxload.info/cache/FF/FF/FF/00/00/00/21-1.gif" />';
				}
			}
			xmlhttp.open("GET","cercar_provincies.php?id_com="+id_com,true);
			xmlhttp.send();
		}
		function canvi_provincia(id_prov)
		{
			var xmlhttp;
			var txt,x,xx,i;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			}
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					txt=xmlhttp.responseText;
					document.getElementById('municipi').innerHTML=txt;
				} else {
					document.getElementById('municipi').innerHTML = '<img src="http://www.ajaxload.info/cache/FF/FF/FF/00/00/00/21-1.gif" />';
				}
			}
			xmlhttp.open("GET","canvi_provincia.php?id_prov="+id_prov,true);
			xmlhttp.send();
		}
		function limpiar(param){
			var mun = document.getElementById('municipi'),
				iframe = document.getElementById('iframe');
				if (param == 1) {
					mun.removeChild(mun.firstChild);
					iframe.removeChild(iframe.firstChild);
				} else if( param == 2) {
					iframe.removeChild(iframe.firstChild);
				}
			
		}
		function createFrame(nameMunicipi)
		{
			var iframe = document.getElementById('iframe');
			if(iframe.hasChildNodes()) {
				limpiar(2);
			}
			var ruta = 'http://ca.wikipedia.org/wiki/';
			var nomMun = nameMunicipi.replace(/\s+/g,'_');
			ifrm = document.createElement('iframe');
			ifrm.setAttribute("src", ruta+nomMun );
			ifrm.style.width = 900+"px";
			ifrm.style.height = 600+"px";
			document.getElementById('iframe').appendChild(ifrm);
		}
	</script>
</head>
	<body>
		<h1>Navega per les províncies</h1>
		<aside>
			<div id="comunitat">
				<select name="comunitat" onchange="canvi_comunitat(this.value),limpiar(1)">
					<?php
					$sql = "SELECT * FROM comunitats order by id_com";
					$result = mysql_query($sql);

					if (!$result) {
					    $message  = 'Invalid query: ' . mysql_error() . "\n";
					    die($message);
					}
					echo '<option></option>';
					while ($row = mysql_fetch_assoc($result)) {
						echo "<option value=".$row['id_com'].">".$row['comunitat']."</option>";
					}

					?>
				</select>
			</div>
			<div id="provincia"></div>
			<div id="municipi"><span></span></div>
		</aside>
		
		<div id="iframe"><span></span></div>
	</body>
</html>
<?php include("close_db.php"); ?>