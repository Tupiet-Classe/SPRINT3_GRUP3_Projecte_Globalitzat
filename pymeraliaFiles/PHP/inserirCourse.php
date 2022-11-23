<?php 

include_once '../clases/Curs_class.php';
include_once '../validacions/validacions.php';


$curs = new Curs(($_POST['name_course']),($_POST['description_course']));
$curs->addCurso();
header('location: ../admin/cursos.php');
?>