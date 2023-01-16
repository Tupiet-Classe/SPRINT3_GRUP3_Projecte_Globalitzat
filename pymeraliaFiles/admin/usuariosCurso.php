<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="../css/estilo_lista_alumnos.css">
    <link href="../css/fontawesome.min.css" rel="stylesheet">
    <link href="../css/brands.min.css" rel="stylesheet">
    <link href="../css/solid.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href="../css/estiloCursos.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/main.css">
    <!--header, footer-->
    <title>Lista Alumnos</title>

    <style>
        .tu-whitespace {
            width: fit-content;
            height: 2rem;
        }
    </style>
</head>

<?php 
  include_once '../includes/header.php'; 
?>

<body class="d-flex flex-column min-vh-100">
    <div class="container overflow-hidden text-center py-3 position-relative mb-5" id="cuerpo">
        <div>
            <h2 class="py-3">Lista Alumnos</h2>
        </div>

        <div class="d-flex justify-content-end mb-3 me-3 me-sm-5">
            <button class="orange-button" data-bs-toggle="modal" data-bs-target="#addUser">
                    <i class="fa fa-user-plus"></i>
                    Añadir usuario
            </button>
        </div>

        <!-- //! AIXÒ NO DIFERÈNCIA ENTRE CURSOS, FALTA ARREGLAR -->
        
        <table class="table table-striped align-middle" 
            id="table"
            data-toggle="table"
            data-search="true"
            data-side-pagination="server"
            data-pagination="true"
            data-locale="es-ES"
            data-url="http://localhost:83/PHP/showUsersCourse.php?courseid=<?=$_GET['courseid']?>">
            <thead>
                <tr>
                    <th scope="col" data-field="nick_name">Nombre de usuario</th>
                    <th scope="col" data-field="name_user">Nombre</th>
                    <th scope="col" data-field="last_name">Apellido</th>
                    <th scope="col" data-formatter="operateFormatter">Opciones</th>
                </tr>
            </thead>

        </table>

        <div class="tu-whitespace"></div>

            
    <!--Ciberseguridad para Empresas-->

        <!-- Toasts -->
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header toast-success">
                    <strong class="me-auto">Pymeshield</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body" id="successToastMessage">
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
                <div class="toast-body" id="errorToastMessage">
                    Los datos introducidos no corresponden a ningún usuario
                </div>
            </div>
        </div>
    </div>
    <!--Política de Contraseñas-->

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
    
    <span id="courseId" style="display: none;"><?php echo $_GET['courseid']; ?></span>



    </div>
   
    <?php 
      include_once '../includes/footer.php';
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table-locale-all.min.js"></script>

    <script src="../scripts/usuariosCurso.js"></script>

    <script>

function operateFormatter(value, row, index, field) {
    console.log(value)
    console.log(row)
    console.log(index)
    console.log(field)
    return [
      '<button class="orange-button" onclick="expulsar(' + row.id_user + ')">Dar de baja</button>'
    ].join('')
  }

    </script>

</body>

</html>