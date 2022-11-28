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
    <link rel="stylesheet" href="../css/index.css">
    <link href="../css/fontawesome.min.css" rel="stylesheet">
    <link href="../css/brands.min.css" rel="stylesheet">
    <link href="../css/solid.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<?php 
  include_once '../includes/header.php'; 
?>

<body class="d-flex flex-column min-vh-100">
    <div class="container overflow-hidden text-center py-3 m-5" id="cuerpo">
        <div class="row g-2" id="cuadros">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <a href="index.php">
                    <div class="p-3 border" id="bg-inicio"><span id="borde-texto">Inicio</span></div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <a href="cursos.php">
                    <div class="p-3 border" id="bg-cursos"><span id="borde-texto">Cursos</span></div>
                </a>
            </div>
            <div class="w-100"></div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <a href="emblemas.php">
                    <div class="p-3 border" id="bg-emblemas"><span id="borde-texto">Emblemas</span></div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <a href="calificaciones.php">
                    <div class="p-3 border" id="bg-calificaciones"><span id="borde-texto">Calificaciones</span></div>
                </a>
            </div>
        </div>
    </div>
 
<?php 
  include_once '../includes/footer.php'; 
?>

</body>

</html>