<?php
include "../clases/Tramesa_class.php";

$nota = $_POST['nota'];
$idDelivery = $_POST['id'];
$aplicar = new Deliver($idDelivery);

if(!empty($nota)){
    $objecte = $aplicar->apply_grade();
 }

 ?>