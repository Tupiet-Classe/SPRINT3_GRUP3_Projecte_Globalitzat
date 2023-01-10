<?php
include "../clases/Deliver_Class.php";

$grade = $_POST['nota'];
$delivery_id = $_POST['id-tramesa'];
$IdCurs= $_POST['IdCurs'];

$aplicar = new Deliver($delivery_id, $grade);
$aplicar->apply_grade();
 
header('location: ../admin/calificar.php?id='.$IdCurs)

 ?>