<?php 
function db_query($query) {
    
    $connection = mysqli_connect("mariadb","pymeralia","pymeralia1","pymeralia");
    $result = mysqli_query($connection,$query);
    return $result;
    
}
?>