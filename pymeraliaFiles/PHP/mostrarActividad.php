<?php
include_once '../clases/activityClass.php';

$activity_id = $_POST['activityid'];

$activity = new Activities($activity_id);
echo $activity->activity_name;
echo $activity->activity_description;
$activity->showActivity();

header("location: ../admin/detallesCurso.php?courseid=$courseID");
?>