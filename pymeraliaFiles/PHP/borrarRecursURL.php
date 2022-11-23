<?php 

include_once '../clases/RecursosURL_class.php';

$recurs = new Recursos($_POST['id'],$_POST['type']);
$recurs->papeleraRecursos();
header('location: ../admin/detallesCurso.php?courseid=' . $_POST['id-course']);
?>