<?php
include_once '../clases/Deliver_Class';
$deliver_file = $_FILES['nomArchiu'];
$activity_id = $_POST['idActivitat'];
$user_id = $_POST['idUsuari'];

$deliver = new Deliver($deliver_file,$activity_id,$user_id);
$deliver->getFile();
?>