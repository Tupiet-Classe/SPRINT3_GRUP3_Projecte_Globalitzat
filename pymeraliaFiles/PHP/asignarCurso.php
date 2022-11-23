<?php
include_once '../clases/Curs_class.php';
// Recuperem les dades enviades des del client
$data = json_decode(file_get_contents('php://input'), true);

['courseID' => $courseID, 'user' => $user] = $data;

$curso = new Curs($courseID);
$ok = $curso->assignCurso($user);

echo json_encode(array('ok' => $ok))
?>