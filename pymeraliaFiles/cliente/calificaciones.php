<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calificaciones</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/main copy.css">
    <link href="../css/fontawesome.min.css" rel="stylesheet">
    <link href="../css/brands.min.css" rel="stylesheet">
    <link href="../css/solid.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>


    <script src="../scripts/bootstrap.bundle.min.js"></script>
</head>

<?php 
  include_once '../includes/header.php'; 
?>

<body class="d-flex flex-column min-vh-100">
    <div class="container mt-3">
        <h2>Cursos</h2>
        <div class="accordion pb-3" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Ciberseguridad para empresas
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div>
                            <table class="table table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Actividades</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Nota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Seguridad en la empresa: buenas contraseñas</th>
                                        <td>Corregido</td>
                                        <td>8,5</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Copias de seguridad automáticas</th>
                                        <td>Corregido</td>
                                        <td>5,5</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Firewall: principios básicos</th>
                                        <td>Pendiente de corrección</td>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion pb-3" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Ciberseguridad para autónomos
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div>
                            <table class="table table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Actividades</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Nota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Ficha sobre nmap</th>
                                        <td>Corregido</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Telnet vs SSH: Diferencias y similitudes</th>
                                        <td>Corregido</td>
                                        <td>8,5</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Resumen del libro "Crafting Interpreters"</th>
                                        <td>En corrección</td>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion pb-3" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Políticas de contraseñas
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div>
                            <table class="table table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Actividades</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Nota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Invención de una política de privacidad</th>
                                        <td>Corregido</td>
                                        <td>7,5</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">¿Cómo asegurarme de que la contraseña es segura?</th>
                                        <td>Pendiente de corrección</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Encriptación síncrona: resumen</th>
                                        <td>Pendiente de corrección</td>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
<?php 
  include_once '../includes/footer.php'; 
?>

</body>

</html>