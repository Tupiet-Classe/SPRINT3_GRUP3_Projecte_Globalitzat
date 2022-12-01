<?php
/* include_once "../../PHP/connexio.php";

$sql = "SELECT avg(qualification) as avg FROM grade WHERE id_user LIKE 1"; 
$result = $conn->query($sql);

$first_row = $result->fetch_assoc();

echo $first_row['avg'] */

include_once '../clases/Curs_class.php';
$curs = new Curs();
echo $curs->get_average(2);


?>