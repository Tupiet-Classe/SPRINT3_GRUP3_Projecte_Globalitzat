<?php
include '../clases/Curs_class.php';

$offset = $_GET['offset'];
$limit = $_GET['limit'];
$search; $count; $users;

$curs = new Curs(1);

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];  
    ['data' => $users, 'count' => $count] = $curs->search_users_from_course_with_limit($search, $offset, $limit);

} else {
    ['data' => $users, 'count' => $count] = $curs->get_users_from_course_with_limit($offset, $limit);
}


echo json_encode(array("total" => $count, "rows" => $users));
?>