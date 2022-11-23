<?php

    include("connexio.php");
    include_once '../clases/Emblema_class.php';
   

if(isset($_FILES['emblem'])){

    $name = $_POST['name'];
    $description = $_POST['description'];
    $file = $_FILES['emblem'];
    $course = $_POST['course'];
    $filename = $file['name'];
    $file_type = $file['type'];
    $file_size = $file['size'];
    $hash = md5(uniqid(mt_rand()));
    $route = "../images/emblemas/";
    $final_file_name = $hash.'_'.$filename;

    
    

    // Crear directori images/emblemas i donar-li permisos (si no existeix ja).
    if(!is_dir($route)){
        mkdir($route, 0777);
    }

    // Validació per a que sigui una imatge amb uns formats concrets
    $allowed_types = array("image/jpg" , "image/jpeg" , "image/png");

    if(in_array($file_type, $allowed_types)){

        if($file_size <= 1000000){
            // Moure arxiu a directori image/emblemas
            move_uploaded_file($file['tmp_name'], $route . $final_file_name);
            $emblema = new Emblema($name, $description, $final_file_name, $course);
            $emblema->addEmblema();
            header("location:../admin/emblemasAdmin.php");
        }
    }   else{
            header("location:../admin/emblemasAdmin.php");
        }

} 


/*
if(isset($_POST['submitBtn'])){
    $file = $_FILES['image']['tmp_name'];
    $route = "../images/emblemas/" . $_FILES['image']['name'];
    move_uploaded_file($file, $route);
    $emblem_name= $_POST['name'];
    $emblem_description= $_POST['description'];
    $emblem_course= $_POST['course'];
    mysqli_query("INSERT INTO emblems ('id_emblem', 'name_emblem', 'description_emblem', 'image', 'id_course', 'hidden') 
    VALUES(NULL, $emblem_name, $emblem_description, $route, $emblem_course, NULL)");
    header("location:../admin/emblemasAdmin.php");
}

include_once '../clases/Emblema_class.php';

$upload = New Emblema(1);
$addEmblemas = $addEmblema->addEmblema();

$query=mysqli_query($addEmblemas);

*/

?>
