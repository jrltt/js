	function canvi_classe(id_classe)
	{
		var xmlhttp;
		var txt,x,xx,i;
		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				txt=xmlhttp.responseText;
				if (txt!='') {
					document.getElementById('ordre').innerHTML=txt;
					document.getElementById('familia').innerHTML="";
					document.getElementById('bitxos').innerHTML="";
				} else {
					document.getElementById('ordre').innerHTML="";
					document.getElementById('familia').innerHTML="";
					document.getElementById('bitxos').innerHTML="";
				}
			} else {
				document.getElementById('ordre').innerHTML = "<img src=\"img/ajax_wait.gif\" />";
			}
		}
		xmlhttp.open("GET","cercar_ordres.php?id_classe="+id_classe,true);
		xmlhttp.send();

	}

	function canvi_ordre(id_ordre)
	{
		var xmlhttp;
		var txt,x,xx,i;
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		}
		
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				txt=xmlhttp.responseText;
				if (txt!='') {
					document.getElementById('familia').innerHTML=txt;
					document.getElementById('bitxos').innerHTML="";
				} else {
					document.getElementById('ordre').innerHTML="";
					document.getElementById('familia').innerHTML="";
					document.getElementById('bitxos').innerHTML="";
				}
			} else {
				document.getElementById('familia').innerHTML = "<img src=\"img/ajax_wait.gif\" />";
			}
		}
		xmlhttp.open("GET","cercar_families.php?id_ordre="+id_ordre,true);
		xmlhttp.send();

	}

	function canvi_familia(id_familia)
	{
		var xmlhttp;
		var txt,x,xx,i;
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		}
		
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				txt=xmlhttp.responseText;
				document.getElementById('bitxos').innerHTML=txt;
			} else {
				document.getElementById('bitxos').innerHTML = "<img src=\"img/ajax_wait.gif\" />";
			}
		}
		xmlhttp.open("GET","cercar_bitxos.php?id_familia="+id_familia,true);
		xmlhttp.send();

	}