<?php 

include_once '../clases/Emblema_class.php';

$recurs = new Emblema($_POST['id'],$_POST['type']);
$recurs->papeleraEmblema();
header('location: ../admin/emblemasAdmin.php');
?>