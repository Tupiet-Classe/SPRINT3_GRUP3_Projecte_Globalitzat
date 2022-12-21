<?php
include "../clases/DeliverClass.php";

$nota = $_POST['nota'];
$idDelivery = $_POST['idDelivery'];
$aplicar = new Deliver($idDelivery);

if(!empty($nota)){
    $objecte = $aplicar->apply_grade();
 }

 ?>