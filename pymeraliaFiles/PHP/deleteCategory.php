<?php
include_once '../clases/Categoria_class.php';
// Recuperem les dades enviades des del client
$data = json_decode(file_get_contents('php://input'), true);

['idCategory' => $category_id] = $data;

$category = new Categoria($category_id);
$ok = $category->delete();

echo json_encode(array('ok' => $ok))
?>