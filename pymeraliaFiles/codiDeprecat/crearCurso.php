<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="../css/estilo_crear_curso.css" rel="stylesheet" />
    <link href="../css/fontawesome.min.css" rel="stylesheet">
    <link href="../css/brands.min.css" rel="stylesheet">
    <link href="../css/solid.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="../css/main.css"><!--header, footer-->
    <link href="../css/estiloCursos.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
    <title>Crear Curso</title>
</head>

<?php 
  include_once '../includes/header.php'; 
?>

<body class="d-flex flex-column min-vh-100">
    <main>
        <div class="container">
        <h2>Crear Curso</h2>
            <form class="formulario-crear-curso">
                <div class="form-group campo-formulario">
                    <label for="exampleInputEmail1">Nombre del Curso</label>
                    <input type="text" class="form-control" name ="nombre-del-curso" id="nombre-del-curso" required>
                    <div id="longitud" style="visibility: hidden; color:red">
                        La longitud debe ser menor a 12 caracteres.
                    </div>
                    <div id="caracteres" style="visibility: hidden; color:red">
                        No se pueden introducir los simbolos .
                    </div>
                </div>

                <div class="form-group campo-formulario">
                    <label for="exampleInputPassword1">Descripción del Curso</label>
                    <textarea class="form-control" id="descripcion-del-curso" required></textarea>
                </div>

                <div class="form-group campo-formulario">
                        <label for="exampleInputPassword1">Imagen del Curso</label>
                        <input type="file" class="form-control" id="imagen-del-curso">
                </div>
                <div class="form-group campo-formulario">
                    <label for="exampleInputPassword1">Imagen Emblema</label>
                    <input type="file" class="form-control" id="imagen-del-curso">
                </div>

                <button type="submit" class="btn btn-primary btn btn-secondary btn-sm" onclick="prov()">Guardar Curso</button>
            </form>
        </div>
    </main>

  <?php 
    include_once '../includes/footer.php'; 
  ?>

 <script src="../validacions/validacions.js"></script>
 <script src="../validacions/main.js"></script>
 
</body>
<script>
    $( document ).ready(function() {
    console.log( "ready!" );
});
</script>
</html>