<?php
include_once '../clases/Curs_class.php';

$data = json_decode(file_get_contents('php://input'), true);
['idCourse' => $course_id] = $data;

$course = new Curs($course_id);
$ok = $course->delete();

echo json_encode(array('ok' => $ok))
?>