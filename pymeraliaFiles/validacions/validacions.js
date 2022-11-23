//Validació per a que el camp no estigui buit.
function notEmpty(valor) {
  if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
    return false;
  }
}

function length(campo, longitudMaxima) {
  try {
      if (campo.value.length > (longitudMaxima)){
        (campo).style.borderColor = "red";
        document.getElementById("longitud").style.visibility = "visible";
          return false;

        }
      else{
        (campo).style.borderColor = "green";
        document.getElementById("longitud").style.visibility = "hidden";
          return true;  
        }           
  } catch (e) {
      return false;
  }
}

//Validació per a email
function email(string) {
  let regex = /^\w+@\w+\.\w+$/
  return regex.test(string.trim())
}

//Validació per a que no es puguin introduir scripts
function caracters(valor) {
  var iChars = "<>";

  for (var i = 0; i < valor; i++) {
    if (iChars.indexOf(valor.charAt(i)) != -1) {
      (valor).style.borderColor = "red";
        document.getElementById("caracteres").style.visibility = "visible";
      return false;
    }
    else{
      (valor).style.borderColor = "green";
        document.getElementById("caracteres").style.visibility = "hidden";
        return true; 
    }
  }
}

//Validació per a acceptar URL
function isValidUrl(url){
  let pattern = /^(http|https)\:\/\/[a-z0-9\.-]+\.[a-z]{2,4}/gi;
  return pattern.test(url.trim())
}

//Validació per a l'extensió d'una imatge i el tamany màxim (REVISAR)
function extension(){

	// this.files[0].size recupera el tamany de l'arxiu
	// alert(this.files[0].size);
	var fileName = this.files[0].name;
	var fileSize = this.files[0].size;

	if(fileSize > 3000000){
		
    alert('El archivo no debe superar los 3MB');
		this.value = '';
		this.files[0].name = '';

	}
  else{

    //recuperem l'extensió de l'arxiu
		var ext = fileName.split('.').pop();
		
    // Convertim en minuscula perque
    // l'extensió de l'arxiu pot estar en majuscula
		ext = ext.toLowerCase();
    
		// console.log(ext);
		switch (ext) {
			case 'jpg':
			case 'jpeg':
			case 'png':
			case 'pdf': break;
			default:
				alert('El archivo no tiene la extensión adecuada');
				this.value = ''; // reset del valor
				this.files[0].name = '';
		}
	}
}

// Validació per a contrasenya segura
const blackList = /<+>/ig

function sanitizeInput(valor) {
  const valor = document.getElementById('valor').value;
  console.log('valor', valor)
  document.getElementById('caracteres').innerHTML = valor?.replace(blackList, '')
  
}