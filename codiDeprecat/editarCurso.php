<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main copy.css">
    <link href="../css/fontawesome.min.css" rel="stylesheet">
    <link href="../css/brands.min.css" rel="stylesheet">
    <link href="../css/solid.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="../scripts/editarCurso.js"></script>
    <link rel="stylesheet" href="../css/main.css"><!--header, footer-->
    <title>Editar curso</title>
</head>

<?php 
  include_once '../includes/header.php'; 
?>

<body class="d-flex flex-column min-vh-100">

    <div class="container mt-3" id="form-editar-curso">
        <h2>Editar curso</h2>
        <div class="row" id="row-buttons">
            <div class="col-md-12">
                <button class="btn btn-secondary btn-lg" onclick="validarInputObligatorio()">Guardar cambios</button>
                <button class="btn btn-secondary btn-lg">Eliminar curso</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12">
                <h4>Nombre del curso</h4>
                <input id="nombre-curso" class="form-control" placeholder="Nombre actual: Ciberseguridad" type="text">  
            </div>
            <div class="col-12 col-md-12">
                <h4>Enlaces (max. 4)</h4>
                <input class="form-control" placeholder="Enlaces actuales" type="url">
                <input class="form-control" placeholder="Enlaces actuales" type="url">
                <input class="form-control" placeholder="Enlaces actuales" type="url">
                <input class="form-control" placeholder="Enlaces actuales" type="url"> 
            </div>
            <div class="col-12 col-md-12">
                <h4>Imagen curs<input class="form-control" value="Hola" type="file"></h4> 
            </div>
            <div class="col-12 col-md-12">
                <h4>Emblema<input class="form-control" value="Hola" type="file"></h4> 
            </div>
        </div>
    </div>

    <?php 
      include_once '../includes/footer.php'; 
    ?>
    
</body>

</html>