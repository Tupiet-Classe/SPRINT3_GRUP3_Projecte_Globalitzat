<?php 

include_once '../clases/Curs_class.php';
include_once '../validacions/validacions.php';

// Recuperem les variables enviades via POST
$name_course = $_POST['name_course'];
$description_course = $_POST['description_course'];
$image = $_FILES['image'];

$curs = new Curs($name_course, $description_course, $image);
$curs->addCurso();
header('location: ../admin/cursos.php');
?>