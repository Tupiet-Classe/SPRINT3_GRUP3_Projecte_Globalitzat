<?php
include_once '../clases/Curs_class.php';
// Recuperem les dades enviades des del client
$data = json_decode(file_get_contents('php://input'), true);

['courseID' => $courseID, 'userID' => $userID] = $data;

$curso = new Curs($courseID);
$curso->unassignCurso($userID);

?>