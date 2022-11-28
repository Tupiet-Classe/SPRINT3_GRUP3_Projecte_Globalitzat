<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="../css/estiloCursos.css" rel="stylesheet" />
    <link href="../css/fontawesome.min.css" rel="stylesheet">
    <link href="../css/brands.min.css" rel="stylesheet">
    <link href="../css/solid.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="../css/main.css"><!--header, footer-->
    <script src="../scripts/cursos.js"></script><!--script funcionalidad página cursos-->

    <title>Cursos Pymeralia</title>
  </head>
  
  <?php 
    include_once '../includes/header.php';
  ?>

  <body class="d-flex flex-column min-vh-100">
    <main>
        <h1 class="text-center">Listado de cursos</h3>

      <?php
      include_once '../clases/Curs_class.php';
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

  <?php 
    include_once '../includes/footer.php'; 
  ?>
    
</body>
</html>
