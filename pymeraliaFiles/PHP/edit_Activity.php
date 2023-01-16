<?php
include_once '../clases/activityClass.php';

$activity_id = $_POST['id-activity'];
$activity_name = $_POST['new-activity-name'];
$activity_description = $_POST['new-activity-description'];
#per a tornar a la pagina de la que venim
#$courseID = $_POST['course-id'];

$activity = new Activities($activity_id);
$activity->setActivityName($activity_name);
$activity->setActivityDescription($activity_description);
$activity->updateActivity();


#tornar a la pagina de la que venim
header("location: ../admin/actividad.php?activity_id=$activity_id   ");
?>