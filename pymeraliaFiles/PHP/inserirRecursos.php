<?php 

include_once '../clases/RecursosURL_class.php';
include_once '../validacions/validacions.php';

$title = $_POST['titulo'];
$type = $_POST['type'];
$id_category = $_POST['id-category'];

if ($type == 'file') {
    $location = $_FILES['descripcionURL'];
} else {
    $location = $_POST['descripcionURL'];
}

$recurs = new Recursos(filtrado($title), $location, filtrado($type), filtrado($id_category));
$recurs->addRecursos();
header('location: ../admin/detallesCurso.php?courseid=' . $_POST['id-course']);
?>