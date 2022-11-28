<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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

        <?php
            include_once '../clases/Curs_class.php';
            $curs = new Curs($_GET['courseid']);

            $users = $curs->get_users_from_course();

            if ($users != false) {
                echo  
                    '<table class="table table-striped align-middle">',
                        '<thead>',
                            '<tr>',
                                '<th scope="col">Nombre de usuario</th>',
                                '<th scope="col">Nombre</th>',
                                '<th scope="col">Apellido</th>',
                                '<th scope="col">Opciones</th>',
                            '</tr>',
                        '</thead>',
                        '<tbody>';

                foreach ($users as $key => $user) {
                    echo
                        '<tr>',
                            '<td class="username">' . $user['nick_name'] . '</td>',
                            '<td class="nombre">' . $user['name_user'] . '</td>',
                            '<td class="apellido-1">' . $user['last_name'] . '</td>',
                            '<td class="apellido-2">',
                                '<button class="orange-button" onclick="expulsar(' . $user['id_user']  . ')">Expulsar</button>',
                            '</td>',
                        '</tr>';
                }

                echo 
                    '</tbody>',
                '</table>';
            } else {
                echo '<h6>Aún no hay usuarios en este curso</h6>';
            }

        ?>

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

    </div>
   
    <?php 
      include_once '../includes/header.php'; 
    ?>

</body>

</html>