<?php
include_once '../clases/Curs_class.php';
// Recuperem les dades enviades des del client
$data = json_decode(file_get_contents('php://input'), true);

['rating' => $rating, 'feedback' => $feedback, 'courseID'=> $courseID] = $data;

$course = new Curs($courseID);
$success = $course->send_feedback($rating, $feedback);

echo json_encode(array('ok' => $success));

?>