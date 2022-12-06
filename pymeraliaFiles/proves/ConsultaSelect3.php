<?php
include_once "../clases/Curs_class.php";


$llistatActivitats = Curs::check_activities(1);


foreach ($llistatActivitats as $activitats) {
   echo  "<p>  $activitats[Activitat] </p>";
}
?>