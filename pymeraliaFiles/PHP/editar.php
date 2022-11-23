<?php
    include "../clases/RecursosURL.php";
    if(isset($_POST['submit'])){
        $field = array("name_resource_url"=>$_POST['name_resource_url'], "location"=>$_POST['location']);
       
        $recurs = New Recursos($_POST['id']);
        $recurs -> edit($field);

    }
?>