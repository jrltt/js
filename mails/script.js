function addEvent (element, evnt, funct)
{
	return element.addEventListener(evnt, funct, false);
}
//contador de inputs a generar
var count = 0;

addEvent (
		//selecciono el formulario
		//document.forms['formMails'],
		document.getElementById('add'),
		'click',
		function () 
		{
			var input = document.forms['formMails'].getElementsByTagName('input'),
				 newInput = document.createElement('input');

			if ( count < 2) { // solo se pueden hacer 3

				newInput.type = 'text';
				newInput.name = 'mail[]';
<<<<<<< HEAD
				if ( count == 1) { //chapuza para esconder el boton de +
					newInput.className = 'mclass';
					document.getElementById('add').className = 'hidden';
				} else {
					newInput.className = 'current';
				}
=======
				//if ( count == 1) { //chapuza para esconder el boton de +
				//	newInput.className = 'mclass';
				//	document.getElementById('add').className = 'hidden';
				//} else {
				newInput.className = 'current';
				//}
>>>>>>> b743124babf4ed231b05304b9ac2100b1329fc58
				console.log('new input: '+newInput);
				for (i = 0; i < input.length; i++) {
					if (input[i].className.match('current')) {
						lastInputCurrent = i;
						console.log(lastInputCurrent);
						valueInput = input[i].value; //guardo lo introducido por el usuario para ponerlo luego en el value=
					}
				}
				
				if ( count == 1) {
<<<<<<< HEAD
					document.getElementById('add').className = 'hidden';
=======
					document.getElementById('add').className = 'minus';
>>>>>>> b743124babf4ed231b05304b9ac2100b1329fc58
				} 
				//ultima posicion
				var e = document.forms['formMails'].getElementsByTagName('input')[lastInputCurrent];
				//nuevo input
				var i = newInput;
				//inserto el nuevo input
				insertAfter(e,i);
				

				input[lastInputCurrent].setAttribute('value', valueInput); //le añado el atributo value con el valor introducido por el usuario
				input[lastInputCurrent].className = 'mclass';
				
				//console.log(input[i]);
				
				count++;
				console.log(count);
			} else {
				console.log('error');
				document.getElementById('add').className = 'minus';
			}
		}
	);
<<<<<<< HEAD
// var lastIndex = 0;
// addEvent (
// 	document.getElementById('add'),
// 	'click',
// 	function ()
// 	{
// 		var boton = document.getElementById('add'),
// 				padre = document.forms.formMails,
// 					input = padre.getElementsByTagName('input');

// 		if ( boton.className.match('minus') ) {		
// 			padre.removeChild(input[this.lastInputCurrent]);
// 		}
// 		//input[lastIndex].className = 'current';
// 	}
// );
=======
var lastIndex = 0;
addEvent (
	document.getElementById('add'),
	'click',
	function ()
	{
		var boton = document.getElementById('add'),
				padre = document.forms.formMails,
					input = padre.getElementsByTagName('input');

		if ( boton.className.match('minus') ) {
			for (i=0; i < input.length; i++) {
				if (input[i].className == 'current' && input[i].className == 'mclass') {
					lastIndex = i;
					boton.parentNode.removeChild(input[i]);
				}
			}		
			
		}
		input[lastIndex].className = 'current';
	}
);
>>>>>>> b743124babf4ed231b05304b9ac2100b1329fc58

//evento para añadir el valor, en el caso que añada varios campos a la vez
addEvent (
	document.forms.formMails,
<<<<<<< HEAD
	'click',
=======
	'blur',
>>>>>>> b743124babf4ed231b05304b9ac2100b1329fc58
	function ()
	{
		var mailName = document.getElementsByName('mail[]');
		for (i = 0; i < mailName.length; i++) {
			valor = mailName[i].value;
			mailName[i].setAttribute('value', valor);
		}
	}
);

function insertAfter(e,i)
{ 
	if(e.nextSibling){ 
		e.parentNode.insertBefore(i,e.nextSibling); 
	} else { 
		e.parentNode.appendChild(i); 
	}
}
