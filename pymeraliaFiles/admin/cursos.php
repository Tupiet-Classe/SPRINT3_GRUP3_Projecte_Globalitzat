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
    <link rel="stylesheet" href="../css/main.css"><!--header, footer-->
    <link href="../css/estiloCursos.css" rel="stylesheet" />

    <title>Dashboard Curso.</title>
</head>

<?php 
  include_once '../includes/header.php'; 
?>

<body class="d-flex flex-column min-vh-100">
 <main>
        <h1 class="text-center">Listado de cursos</h3>

      <?php
      include_once '../clases/Curs_class.php';

      
      echo'<div class="row justify-content-evenly" id="contenedor-cursos">';

          echo 
              '<div class="col-12 card d-flex justify-content-center align-items-center" style="width: fit-content; height: 3rem">',
              '<button type="button" onclick="addCurso()"> <i class="fas fa-link"></i>Añadir Curso</button>',
              '</div>',
              '</div>';
      $cursos = Curs::get_all_non_hidden_courses();
      
      if ($cursos) {
        echo'<div class="row justify-content-evenly" id="contenedor-cursos">';

        foreach ($cursos as $curso) {
            echo 
                '<div class="col-12 card vista-curso" style="width: 18rem;">',
                    '<img src="../images/imagenes-curso/' . $curso['image'] . '" class="card-img" alt="imagen seguridad empresa">',
                    '<div class="card-body">',
                        '<h5 class="card-title">' . $curso['name_course'] . '</h5>',
                        '<p class="card-text">' . $curso['description_course'] .'</p>',
                        '<a href="detallesCurso.php?courseid=' . $curso['id_course'] . '"><button class="btn btn-primary">Ir al Curso</button></a>',
                    '</div>',
                '</div>';
        }

        echo '</div>';
      } 
      ?>
    </main><!--Contenido-->

    <div class="modal fade" id="addCurso" tabindex="-1" aria-labelledby="addCursoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <form action="../PHP/inserirCourse.php" method="post">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addCursoLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" >
                        <div class="md-3">
                            <label for="titulo" class="col-form-label" >Título</label>
                            <input type="text" class="form-control" name="name_course" id="name_course">
                            <label for="descripcionURL" class="col-form-label">Descripción o URL</label>

                            <input type="text" class="form-control" name="description_course" id="description_course">
                            <input type="hidden" name="type" id="edit-recurs-type">

                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="btn-add-user">Guardar</button>
                </div>
            </div>
            </form>

        </div>
    </div>

    <?php 
    include_once '../includes/footer.php'; 
    ?>
   
  <script src="../scripts/cursos.js"></script>
</body>

</html>