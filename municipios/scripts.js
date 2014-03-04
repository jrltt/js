function canvi_comunitat(id_com)
{
	var xmlhttp;
	var txt,x,xx,i;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			}
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					txt=xmlhttp.responseText;
					document.getElementById('provincia').innerHTML=txt;
				} else {
					document.getElementById('provincia').innerHTML = '<img src="http://ajaxload.info/cache/FF/FF/FF/00/00/00/30-1.gif" />';
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
					document.getElementById('municipi').innerHTML = '<img src="http://ajaxload.info/cache/FF/FF/FF/00/00/00/30-1.gif" />';
				}
			}
			xmlhttp.open("GET","canvi_provincia.php?id_prov="+id_prov,true);
			xmlhttp.send();
		}
		function limpiarMunicipi(){
			var mun = document.getElementById('municipi');
			mun.removeChild(mun.firstChild);
		}
		function createFrame(nameMunicipi
		{
			var ruta = 'http://es.wikipedia.org/wiki/';
			var nomMun = nameMunicipi.replace(/\s+/g,'_');
			ifrm = document.createElement('iframe');
			ifrm.setAttribute("src", ruta+nomMun );
			ifrm.style.width = 640+"px";
			ifrm.style.height = 480+"px";
			document.getElementById('iframe').appendChild(ifrm);
		}