function validarInputObligatorio(){
    var inputObligatorio = document.getElementById("nombre-curso").value;

    if (inputObligatorio.length == 0 || /^\s+$/.test(inputObligatorio)) {
        document.getElementById("nombre-curso").style.borderColor="red";
    } else{
        document.getElementById("nombre-curso").style.default
    }
}