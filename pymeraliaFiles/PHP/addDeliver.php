<?php
include_once '../clases/Deliver_Class.php';
$deliver_file = $_FILES['nombreArchivo'];
$activity_id = $_POST['idActividad'];
$user_id = $_POST['idUsuario'];

$deliver = new Deliver($deliver_file,$activity_id,$user_id);
$deliver->getFile();
?>