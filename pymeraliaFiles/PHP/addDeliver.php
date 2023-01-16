<?php
include_once '../clases/Deliver_Class.php';
$deliver_file = $_FILES['nombreArchivo'];
$activity_id = $_POST['idActividad'];
$user_id = $_POST['idUsuario'];

$deliver = new Deliver($deliver_file,$activity_id,$user_id);

#intentem fer l'envio i si funciona ens redireccionara a la pagina on estem
$trydeliver = $deliver->getFile();
if ($trydeliver){
header("location: ../cliente/actividad.php?activity_id=$activity_id");
}
?>