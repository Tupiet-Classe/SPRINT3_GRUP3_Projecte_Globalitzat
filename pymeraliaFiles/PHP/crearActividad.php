<?php
include_once '../clases/activityClass.php';

$activity_name = $_POST['nombre-del-curso'];
$activity_description = $_POST['descripcion-del-curso'];
$courseID = $_POST['courseID'];


$activity = new Activities($activity_name, $activity_description, $courseID);
$activity->addActivityToDatabase();

header("location: ../admin/detallesCurso.php?courseid=$courseID");
?>