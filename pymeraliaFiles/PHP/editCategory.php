<?php
include_once '../clases/Categoria_class.php';

$data = json_decode(file_get_contents('php://input'), true);
['idCategory' => $category_id, 'newName' => $new_name] = $data;

$category = new Categoria($category_id);
$ok = $category->update($new_name);

echo json_encode(array('ok' => $ok))
?>