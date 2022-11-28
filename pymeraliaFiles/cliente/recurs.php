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
    <link rel="stylesheet" href="../css/detallesCursos.css">
    <link rel="stylesheet" href="../css/recurs.css">
    <script src="../scripts/recurs.js"></script>
</head>

<?php 
  include_once '../includes/header.php'; 
?>

<div class="contenedor" id="contenedor1">
    <h2>Entregar actividad</h2>
    <form action="insertar.php" class="form-register" method="post" enctype="multipart/form-data">
        <h1 class="form__title">Introduce la actividad</h1>
        <input type="file" name="archivo" class="form__file" required>
        <input type="submit" class="form__submit">
    
    </form>      

</div>

</body>

<?php 
  include_once '../includes/footer.php'; 
?>

</body>

</html>
