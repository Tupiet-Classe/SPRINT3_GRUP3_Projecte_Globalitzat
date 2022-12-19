<?php
include_once "../clases/Curs_class.php";
include_once "../clases/Categoria_class.php";

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
                        <button class="nav-link" data-bs-toggle="modal"
                            data-bs-target="#addUser">
                            <i class="fa-solid fa-user-plus"></i>Añadir alumno
                        </button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="usuariosCurso.php?courseid=<?php echo $courseId ?>">
                            <i class="fa-solid fa-users"></i>Listado de alumnos
                        </a>
                    </li>
                    <li class="nav-item" role="button">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#addActivity">
                            <i class="fa-solid fa-circle-plus"></i>Crear Actividad
                        </a>
                    </li>
                    <li class="nav-item" role="button">
                        <a class="nav-link" onclick="showEditCourseModal()">
                            <i class="fa-solid fa-award"></i>Editar Curso
                        </a>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="modal" data-bs-target="#addCategory">
                            <i class="fa-solid fa-user-plus"></i>Añadir categoría
                        </button>
                    </li>
                </ul>
            </div>
        </aside>

        
        <div class="course container col-lg-8 col-xxl-9 p-5">
            <?php
                
                $curs = new Curs($courseId);
                $title = $curs->get_title();
                $courseId = $_GET['courseid'];
                
                echo "
                    <div class='text' id='course-element'>     
                        <h1 id='course-title'>$title</h1>
                    </div>
                ";

                $resultatCategories = $curs->get_all_categories();

                echo "<div class='accordion'>";

                foreach ($resultatCategories as $category){
                    $category_id = $category['id_category'];
                    $category_title = $category['name_category'];

                    echo "
                        <div class='accordion-item position-relative' id='category-$category_id'>
                            <div class='dropdown'>
                                <button class='badge-config position-absolute top-0 start-100 translate-middle badge rounded-pill' style='z-index: 10' data-bs-toggle='dropdown' aria-expanded='false'><i class='fa fa-ellipsis'></i></button>
                                <ul class='dropdown-menu'>
                                    <li>
                                        <button type='button' onclick='deleteCategory($category_id)'><i class='fas fa-trash-alt'></i>Eliminar</button>
                                    </li>
                                    <li>
                                        <button type='button' onclick='showEditCategoryModal($category_id)'><i class='fas fa-edit'></i>Editar</button>
                                    </li>
                                </ul>
                            </div>
                            <h2 class='accordion-header' id='heading-$category_id'>
                                <button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#collapse-$category_id' aria-expanded='true' aria-controls='collapse-$category_id'>
                                    $category_title
                                </button>
                            </h2>
                            <div id='collapse-$category_id' class='accordion-collapse collapse show' aria-labelledby='heading-$category_id'>
                                <div class='accordion-body'>";                                                      

                    $category = new Categoria($category_id);
                    $resources = $category->get_all_recursos();

                    foreach ($resources as $row) {
                        echo "
                        <div class='course-element text p-3 my-2' id='course-element-$row[type]-$row[id]'>
                            <div class='d-flex justify-content-between h5'>
                                <h4 id='resource-primary-$row[type]-$row[id]'>
                                    $row[name]
                                </h4>
                                <button type='button' class='fas fa-ellipsis-v ps-2 pe-2 flex-row-reverse' data-bs-toggle='dropdown' aria-expanded='false'></button>
                                <ul class='dropdown-menu'>
                                    <li>
                                        <form action='../PHP/borrarRecursURL.php' method='post'>
                                            <input class='d-none' type='hidden' name='id' value='$row[id]'>
                                            <input class='d-none' type='hidden' name='type' value='$row[type]'>
                                            <input type='hidden' name='id-course' id='delete-id-course' value='$courseId'>

                                            <button type='submit'><i class='fas fa-trash-alt'></i>Eliminar</button>
                                        </form>
                                    </li>
                                    <li><button type='button' onclick='showEditModal($row[id], `$row[type]`)'><i class='fas fa-edit'></i>Editar</button></li>
                                </ul> 
                            </div>";

                        // Afegim el contingut
                        if ($row['type']=='url') {
                            echo" <a id='resource-secondary-$row[type]-$row[id]' href=$row[location_or_description]>$row[location_or_description]</a>";
                        } elseif ($row['type']=='file') {
                            echo" <a id='resource-secondary-$row[type]-$row[id]' class='orange-button' href='$row[location_or_description]' download >$row[name]</a>";
                        }
                        else {
                            echo "<p id='resource-secondary-$row[type]-$row[id]' class='m-0'>$row[location_or_description]</p>";
                        }
                        
                        echo "</div>"; 
                    }

                    echo "
                        <div class='new-resource d-flex align-items-center justify-content-center' role='button' 
                            onclick='showAddElementToCategoryModal($category_id)'>

                            <i class='fa fa-add'></i>
                         </div>";

                    echo "</div>
                    </div>
                  </div>";

                };

                echo '</div>'
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
                            <input type="hidden" name="type" id="add-recurs-type">
                            <input type="hidden" name="id-course" id="add-id-course" value="<?php echo $_GET['courseid'] ?>">
                            <input type="hidden" name="id-category" id="add-id-category" value="">

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

    <!-- Add category -->
    <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <form action="../PHP/inserirCategoria.php" method="post">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addCategoryLabel">Añadir categoría</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="titulo" class="col-form-label">Nombre de la categoría</label>
                    <input type="text" class="form-control" name="titulo" id="titulo">

                    <input type="hidden" name="id-course" id="add-id-course" value="<?php echo $_GET['courseid'] ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="btn-add-user">Guardar</button>
                </div>
            </div>
            </form>

        </div>
    </div>

    <!-- Add element to category -->
    <div class="modal fade" id="addElementToCategory" tabindex="-1" aria-labelledby="addElementToCategoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addElementToCategoryLabel">Añadir elemento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row d-flex flex-row justify-content-around">
                    <button class="element-card p-3 col-11 col-sm-5" data-bs-toggle="modal" onclick='addDocument("text")'>
                        <i class="fa fa-file-alt"></i>
                        Añadir texto
                    </button>
                    <button class="element-card p-3 col-11 col-sm-5" onclick='addDocument("url")'>
                        <i class="fa fa-link"></i>
                        Añadir enlace
                    </button>
                    <button class="element-card p-3 col-11 col-sm-5" onclick='addDocument("file")'>
                        <i class="fa fa-file-pdf"></i>
                        Añadir archivo
                    </button>
                    <button class="element-card p-3 col-11 col-sm-5" onclick="addDocument('activity')">
                        <i class="fa fa-file-upload"></i>
                        Añadir actividad
                    </button>

                    <input type="hidden" name="id-course" id="add-id-course" value="<?php echo $_GET['courseid'] ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="btn-add-user">Guardar</button>
                </div>
            </div>
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

    <!-- Edit category modal -->
    <div class="modal fade" id="edit-category-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="edit-category-modal-primary" id="edit-category-modal-primary-label" class="form-label">Nom</label>
                    <input class="form-control" type="text" name="primary" id="edit-category-modal-primary"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" onclick="editCategory()">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit course modal -->
    <div class="modal fade" id="edit-course-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="edit-course-modal-primary" id="edit-course-modal-primary-label" class="form-label">Nom</label>
                    <input class="form-control" type="text" name="primary" id="edit-course-modal-primary"/>
                    <input type="hidden" id="edit-course-id-modal" name="courseID" value="<?php echo $_GET['courseid']?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" onclick="editCourse()">Actualizar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal de crear actividad -->
    <div class="modal fade" id="addActivity" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                <h2>Crear Actividad</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
              <form id="formCreateActivity" action="../PHP/crearActividad.php" method="post">
                <div class="modal-body">
                    <div class="md-3">
                      <label for="nombre-del-curso">Nombre de la actividad</label>
                      <input type="text" class="form-control" id="nombre-del-curso" name="nombre-del-curso">
                    </div>
                    <div class="form-group campo-formulario">
                      <label for="descripcion-del-curso">Descripción de la actividad</label>
                      <textarea class="form-control" id="descripcion-del-curso" name="descripcion-del-curso"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="btn-add-user">Crear actividad</button>
                </div>

                <input type="hidden" name="courseID" value="<?php echo $_GET['courseid']?>">

              </form>

            </div>
        </div>
    </div>


    <span id="courseId" style="display: none;">4</span>

    <script src="../scripts/detallesCurso.js"></script>

    <script src="../scripts/borrarURL.js" ></script>
</body>

</html>