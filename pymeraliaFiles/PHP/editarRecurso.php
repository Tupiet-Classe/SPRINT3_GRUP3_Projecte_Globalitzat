<?php

include_once '../clases/RecursosURL_class.php';

$id_resource = $_POST['id'];
$type = $_POST['type'];
$primary = $_POST['primary'];
$secondary = $_POST['secondary'];

$resource = new Recursos($id_resource, $type);
$resource->editRecursos($primary, $secondary);


header('location: ../admin/detallesCurso.php?courseid=' . $_POST['id-course']);
?>