<?php
include "../clases/DeliverClass.php";

$grade = $_POST['nota'];
$delivery_id = $_POST['id-tramesa'];

$aplicar = new Deliver($delivery_id, $grade);
$aplicar->apply_grade();
 
header('location: ../admin/calificar.php')

 ?>