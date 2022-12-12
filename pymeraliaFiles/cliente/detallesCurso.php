<?php
include("../clases/Curs_class.php");

$courseId;

if (isset($_GET['courseid'])) {
    $courseId = $_GET['courseid'];
} else {
    header('location: ./cursos.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVA Pymeralia</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <link href="../css/fontawesome.min.css" rel="stylesheet">
    <link href="../css/brands.min.css" rel="stylesheet">
    <link href="../css/solid.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="../css/detallesCurso.css">

</head>

<?php 
  include_once '../includes/header.php'; 
?>

<body class="d-flex flex-column min-vh-100">
    <main class="container">

        <?php
            $curs = new Curs($courseId);
            $resultat = $curs->showAllRecursosURL();
            $title = $curs->get_title();
            $courseId = $_GET['courseid'];

            echo "
            <div class='course-element text' id='course-element'>     
                <h1 id='course-title'>$title</h1>
            </div>
            ";

            foreach ($resultat as $row){
                if($row['hidden'] != null){

                }else{
                echo "<div class='course-element text' id='course-element-$row[type]-$row[id]'>";

                if ($row['type']=='url') {
                    echo" <a id='resource-secondary-$row[type]-$row[id]' href=$row[location_or_description]>$row[location_or_description]</a>";
                } elseif ($row['type']=='file') {
                    echo" <a id='resource-secondary-$row[type]-$row[id]' class='orange-button' href='$row[location_or_description]' download >$row[name]</a>";
                }
                else {
                    echo "<p id='resource-secondary-$row[type]-$row[id]'>$row[location_or_description]</p>";
                }
                
                echo "</div>"; 
            }

            };
            ?>

        

    </main>

</body>
</main>

<?php 
  include_once '../includes/footer.php'; 
?>

<script>


    function playVid() {
        video.play();
    }

    function pauseVid() {
        video.pause();
    } 
</script>
</body>

</html>
