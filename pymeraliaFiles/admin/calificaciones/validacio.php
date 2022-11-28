<?php
include_once "../../clases/Qualificacions_class.php";


$idQualificacions = $_POST['idqualificacio'];
$notaQualificacions= $_POST['notaqualificacio'];
$descripcionQualificacions = $_POST['descripcioqualificacio'];


$qualificacio = new Qualificacions();
$qualificacio->addQualificacions($idQualificacions, $notaQualificacions, $descripcionQualificacions);
?>