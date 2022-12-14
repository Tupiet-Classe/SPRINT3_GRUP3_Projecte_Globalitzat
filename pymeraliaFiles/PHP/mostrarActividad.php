<?php
include_once '../clases/activityClass.php';

#$activity_id = $_POST['activity_id'];
$activity_id = 1;

$activity = new Activities($activity_id);
$activity->showActivity();

#header("location: ../admin/detallesCurso.php?courseid=$courseID");
?>