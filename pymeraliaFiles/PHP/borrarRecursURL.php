<?php 



$id = $_POST['id'];
$type = $_POST['type'];

if ($type == 'activity') {
    include_once '../clases/activityClass.php';
    $activity = new Activities($id);
    $activity->delete();
} else {
    include_once '../clases/RecursosURL_class.php';
    $recurs = new Recursos($id, $type);
    $recurs->papeleraRecursos();
}


header('location: ../admin/detallesCurso.php?courseid=' . $_POST['id-course']);
?>