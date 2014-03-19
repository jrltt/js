function llistar_insectes()
	{
		var xmlhttp,
			txt,
			jsondata,
			rsinsectes,
			output,
			rsfotos,
			inici = "http://wikijoan.dyndns.org/fotosarthropoda/thumbnails/",
			nom_arxiu,
			part1,
			part2,
			part3,
			fin_arxiu;

		xmlhttp=new XMLHttpRequest();

		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				txt=xmlhttp.responseText;
				//http://www.javascriptkit.com/dhtmltutors/ajaxgetpost4.shtml
				jsondata = eval("("+txt+")"); //retrieve result as an JavaScript object
				rsinsectes = jsondata.insectes;
				output = '<ul>';
				for (var i = 0; i < rsinsectes.length; i++) {
					output += '<li class="item">';
				 	output += rsinsectes[i].genere + ' ' + rsinsectes[i].especie;
					rsfotos = rsinsectes[i].fotos;
					output += '<br />';

					for (var j = 0; j < rsfotos.length; j++) {
	                    nom_arxiu = rsinsectes[i].fotos[j];
	                    part1 = nom_arxiu.substring(0,2);
	                    part2 = nom_arxiu.substring(2,4);
	                    part3 = nom_arxiu.replace(".JPG","_th.JPG");
	                    fin_arxiu = inici + part1 +"/"+ part2 + "/" + part3;
						output += '<img src="' + fin_arxiu + '" />';
					}
					//outputfotos += '</ul>';
				 	// output += outputfotos;
				 	output += '</li>';
				}
				output += '</ul>';
				document.getElementById("insectes").innerHTML = output;
			} else { //imagen de ajax

			}
		}
		xmlhttp.open("GET","jsonMarc.json",true);
		xmlhttp.send();
	}
