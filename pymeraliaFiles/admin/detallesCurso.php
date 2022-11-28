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
    <link rel="stylesheet" href="../css/detallesCursos.css">

</head>

<?php 
    include_once '../includes/header.php'; 
?>

<body class="d-flex flex-column min-vh-100">
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header toast-success">
            <strong class="me-auto">Pymeshield</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            El usuario se ha añadido correctamente
          </div>
        </div>
    </div>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="errorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header toast-error">
            <strong class="me-auto">Pymeshield</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            Los datos introducidos no corresponden a ningún usuario
          </div>
        </div>
    </div>

    <main class="row m-0">
        <aside class="container col-lg-4 col-xxl-3 pt-5 px-5">
            <div class="admin-course-tools rounded-3 p-3">
                <h3>Acciones rápidas</h3>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <button class="nav-link btn" href="addUsuarioCurso.php" data-bs-toggle="modal"
                            data-bs-target="#addUser">
                            <i class="fa-solid fa-user-plus"></i>Añadir alumno
                        </button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="usuariosCurso.php?courseid=<?php echo $courseId ?>">
                            <i class="fa-solid fa-users"></i>Listado de alumnos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="crearActividad.php">
                            <i class="fa-solid fa-circle-plus"></i>Crear Actividad
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="editarCurso.php">
                            <i class="fa-solid fa-award"></i>Editar Curso
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="editarNotaUsuarios.php">
                            <i class="fa-solid fa-star"></i>Editar Nota
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                        <div><button type='button'  data-bs-toggle='dropdown' aria-expanded='false'><i class="fas fa-file-medical"></i>Añadir Recurso</button>

                            <ul class='dropdown-menu'>
                                <li><button type='button' onclick='addDocument("file")'> <i class="far fa-file-pdf"></i>Añadir Documento</button></li>
                                <li><button type='button' onclick='addDocument("text")'> <i class="fas fa-file-alt"></i>Añadir Texto</button></li>
                                <li><button type='button' onclick='addDocument("url")'> <i class="fas fa-link"></i>Añadir URL</button></li>

                            </ul> 
</div>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        
        <div class="course container col-lg-8 col-xxl-9 p-5">
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
                    echo "           
                    <div class='course-element text' id='course-element-$row[type]-$row[id]'>
                        <div class='d-flex justify-content-between h5'><h4 id='resource-primary-$row[type]-$row[id]'>$row[name]</h4><button type='button' class='fas fa-ellipsis-v ps-2 pe-2 flex-row-reverse'  data-bs-toggle='dropdown' aria-expanded='false'></button>
                            <ul class='dropdown-menu'>
                                <form action='../PHP/borrarRecursURL.php' method='post'>
                                    <INPUT class='d-none' TYPE='hidden' NAME='id' value='$row[id]'>
                                    <INPUT class='d-none' TYPE='hidden' NAME='type' value='$row[type]'>
                                    <input type='hidden' name='id-course' id='delete-id-course' value='$courseId'>

                                    <li><button type='submit' ><i class='fas fa-trash-alt'></i>Eliminar</button></li>
                                </form>
                                <li><button type='button' onclick='showEditModal($row[id], `$row[type]`)'><i class='fas fa-edit'></i>Editar</button></li>
                            </ul> 
                        </div>";

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
    
        </div>
    </main>



    <?php 
    include_once '../includes/footer.php'; 
    ?>

    <!-- Hidden divs -->

    <!-- Add user to course div -->
    <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addUserLabel">Añadir usuario al curso</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm" action="../PHP/asignarCurso.php" method="post">
                        <div class="md-3">
                            <label for="userToAdd" class="col-form-label">Nombre de usuario o correo electrónico</label>
                            <input type="text" class="form-control" name="usertoadd" id="userToAdd">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-add-user">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addDocument" tabindex="-1" aria-labelledby="addDocumentLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <form action="../PHP/inserirRecursos.php" method="post">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addDocumentLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="md-3">
                            <label for="titulo" class="col-form-label">Título</label>
                            <input type="text" class="form-control" name="titulo" id="titulo">
                            <label for="descripcionURL" class="col-form-label">Descripción o URL</label>

                            <input type="text" class="form-control" name="descripcionURL" id="descripcionURL">
                            <input type="hidden" name="type" id="edit-recurs-type">
                            <input type="hidden" name="id-course" id="add-id-course" value="<?php echo $_GET['courseid'] ?>">

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

    <!-- Edit  resource modal -->
    <div class="modal fade" id="edit-user-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../PHP/editarRecurso.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="edit-user-modal-primary" id="edit-user-modal-primary-label" class="form-label">Nom</label>
                        <input class="form-control" type="text" name="primary" id="edit-user-modal-primary"/>
                        <br>
                        <label for="edit-user-modal-secondary" id="edit-user-modal-secondary-label" class="form-label">Altres</label>
                        <textarea class="form-control" type="text" name="secondary" id="edit-user-modal-secondary"></textarea>
                        <input type="hidden" name="id" id="edit-user-modal-id">
                        <input type="hidden" name="type" id="edit-user-modal-type">
                        <input type="hidden" name="id-course" id="edit-id-course" value="<?php echo $_GET['courseid'] ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <span id="courseId" style="display: none;">4</span>

    <script src="../scripts/detallesCurso.js"></script>

    <script src="../scripts/borrarURL.js" ></script>
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