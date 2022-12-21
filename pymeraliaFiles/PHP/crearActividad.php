<?php
include_once '../clases/activityClass.php';

$activity_name = $_POST['nombre-del-curso'];
$activity_description = $_POST['descripcion-del-curso'];
$category_id = $_POST['category_id'];
$courseID = $_POST['courseID'];


$activity = new Activities($activity_name, $activity_description, $category_id);
$activity->addActivityToDatabase();

header("location: ../admin/detallesCurso.php?courseid=$courseID");
?>