<?php
include_once '../clases/activityClass.php';

#$activity_id = $_POST['activity_id'];
$activity_id = 1;

$activity = new Activities($activity_id);
echo $activity->activity_name;
echo $activity->activity_description;
#$activity->showActivity();

#header("location: ../admin/detallesCurso.php?courseid=$courseID");
?>