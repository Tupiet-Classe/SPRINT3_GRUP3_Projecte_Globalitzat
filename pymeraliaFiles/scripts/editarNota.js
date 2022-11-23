function editarNota() {
    document.getElementById("guardar-notas").disabled = false;
    document.getElementById("editar-notas").disabled = true;
    document.querySelectorAll("input").forEach(element => element.disabled = false);
    document.getElementById("correcto").style.display = "none";
}
function guardarNota() {
    document.getElementById("guardar-notas").disabled = true;
    document.getElementById("editar-notas").disabled = false;
    document.querySelectorAll("input").forEach(element => element.disabled = true);
    document.getElementById("correcto").style.display = "block";
}