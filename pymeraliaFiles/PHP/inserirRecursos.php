<?php 

include_once '../clases/RecursosURL_class.php';
include_once '../validacions/validacions.php';

$recurs = new Recursos(filtrado($_POST['titulo']),filtrado($_POST['descripcionURL']),filtrado($_POST['type']), filtrado($_POST['id-category']));
$recurs->addRecursos();
header('location: ../admin/detallesCurso.php?courseid=' . $_POST['id-course']);
?>