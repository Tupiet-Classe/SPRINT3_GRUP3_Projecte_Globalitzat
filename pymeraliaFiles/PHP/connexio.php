<?php

    $servername = "mariadb";
    $database = "pymeralia";
    $username = "pymeralia";
    $password = "pymeralia1";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("La connexió ha fallat:" . mysqli_connect_error());
    }    
?>