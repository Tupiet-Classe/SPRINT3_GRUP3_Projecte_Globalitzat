<!DOCTYPE html>
<html lang="es">

<head>
    <title>NombreDeActivitatAqui</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <link href="../css/fontawesome.min.css" rel="stylesheet">
    <link href="../css/solid.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="../css/detallesCurso.css">

</head>

<?php 
  include_once '../includes/header.php'; 
?>

<body class="d-flex flex-column min-vh-100">
    <?php
        /*Aquesta es la part de codi php que importa la id de l'activitat que hem de mostrar i
        l'utilitza per a construir un objecte de classe "Activities" amb el __construct1.
        Aquest construct obte, entre altres el nom i la descripcio de l'activitat, llavors importem 
        aquesta informacio amb getters i la depositem a variables que podrem fer servir als echos
        que contenen codi html

        */

        #importem la classe de les activitats per a poder utilitzar-la
        include_once '../clases/activityClass.php';
        
        #importem les dades de la activitat a visualitzar a partir la id d'aquesta
        $activity_id = $_GET['activity_id'];
        $activity = new Activities($activity_id);



        #usem els getters per a obtenir l'informació i la guardem en variables per a
        #utilitzar-les mes avall
        $activity_name = $activity->getActivityName();
        $activity_description = $activity->getActivityDescription();


        echo "<main class='container m-5'>";
        echo    "<div class='course-element text' id='course-element'>" ;    
        echo        "<h1 id='course-title'>$activity_name</h1>";
        echo    "</div>";

        echo "<div class='text mt-5'>";     
        echo    "<text>$activity_description</text>";
        echo "</div>";

        echo "</main>";
    ?>

    <?php
        $activity_id = $_GET['activity_id'];
        echo "<a href= 'calificar.php?id=$activity_id'> Avaluar alumnos </a>";
        exit;
        

?>
</body>
</main>

<?php 
  include_once '../includes/footer.php'; 
?>

</body>

</html>