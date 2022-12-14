<?php
// Aquest arxiu és el que permet crear una nova categoria

include_once '../clases/Categoria_class.php';

$name = $_POST['titulo'];
$id_course = $_POST['id-course'];

$category = new Categoria($name, $id_course);
$category->create();

header("location: ../admin/detallesCurso.php?courseid=$id_course");

?>