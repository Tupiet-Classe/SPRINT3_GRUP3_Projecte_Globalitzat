<?php
include_once '../clases/Curs_class.php';

$data = json_decode(file_get_contents('php://input'), true);
['idCourse' => $course_id, 'newName' => $new_name, 'newDescription' => $new_description] = $data;

$course = new Curs($course_id);
$ok = $course->update($new_name, $new_description);

echo json_encode(array('ok' => $ok))
?>