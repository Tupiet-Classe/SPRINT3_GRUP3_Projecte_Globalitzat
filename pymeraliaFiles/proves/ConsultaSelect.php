<?php
include_once "../clases/Curs_class.php";


$llistatCursos = Curs::subscription_course_user(1);


foreach ($llistatCursos as $curs) {
   echo  "<p>  $curs[name] </p>";
}
?>