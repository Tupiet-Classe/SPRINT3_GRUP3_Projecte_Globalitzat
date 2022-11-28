<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVA Pymeralia</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="../scripts/editarNota.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/editar_notas.css">
    <link href="../css/fontawesome.min.css" rel="stylesheet">
    <link href="../css/brands.min.css" rel="stylesheet">
    <link href="../css/solid.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<?php 
    include_once '../includes/header.php'; 
?>

<body class="d-flex flex-column min-vh-100">
    <div class="container overflow-hidden text-center py-3" id="cuerpo">
        <div>
            <span>
                <h2>Editar notas</h2>
            </span>
            <div class="alert alert-success" role="alert" id="correcto">
                Notas guardadas correctamente!
            </div>
            <div class="p-3" id="botones">
                <button type="button" class="btn btn btn-primary" id="editar-notas" onclick="editarNota()">Editar
                    Notas</button>
                <button type="button" class="btn btn-secondary" id="guardar-notas" disabled
                    onclick="guardarNota()">Guardar Notas</button>
            </div>
            <div class="accordion" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <i class="fa-solid fa-person-digging"></i>Actividad 1
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <table class="table table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Avatar</th>
                                        <th scope="col">Nota Actual</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Francisco Zahinos</td>
                                        <td><img src="../images/emblemas/1.png" alt="emblema4" width="40" height="40">
                                        </td>
                                        <td><input class="form-control form-control-sm text-center" type="text"
                                                id="nota-1" value="8" disabled=""></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Pol Obalat</td>
                                        <td><img src="../images/emblemas/2.png" alt="emblema4" width="40" height="40">
                                        </td>
                                        <td><input class="form-control form-control-sm text-center" type="text"
                                                id="nota-2" value="8" disabled=""></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Tatiana Valentinyova</td>
                                        <td><img src="../images/emblemas/3.png" alt="emblema4" width="40" height="40">
                                        </td>
                                        <td><input class="form-control form-control-sm text-center" type="text"
                                                id="nota-3" value="8" disabled=""></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Samuel Lara</td>
                                        <td><img src="../images/emblemas/4.png" alt="emblema4" width="40" height="40">
                                        </td>
                                        <td><input class="form-control form-control-sm text-center" type="text"
                                                id="nota-4" value="8" disabled=""></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            <i class="fa-solid fa-person-digging"></i>Actividad 2
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <table class="table table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Avatar</th>
                                        <th scope="col">Nota Actual</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Francisco Zahinos</td>
                                        <td><img src="../images/emblemas/1.png" alt="emblema4" width="40" height="40">
                                        </td>
                                        <td><input class="form-control form-control-sm text-center" type="text"
                                                id="nota-5" value="8" disabled=""></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Pol Obalat</td>
                                        <td><img src="../images/emblemas/2.png" alt="emblema4" width="40" height="40">
                                        </td>
                                        <td><input class="form-control form-control-sm text-center" type="text"
                                                id="nota-6" value="8" disabled=""></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Tatiana Valentinyova</td>
                                        <td><img src="../images/emblemas/3.png" alt="emblema4" width="40" height="40">
                                        </td>
                                        <td><input class="form-control form-control-sm text-center" type="text"
                                                id="nota-7" value="8" disabled=""></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Samuel Lara</td>
                                        <td><img src="../images/emblemas/4.png" alt="emblema4" width="40" height="40">
                                        </td>
                                        <td><input class="form-control form-control-sm text-center" type="text"
                                                id="nota-8" value="8" disabled=""></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            <i class="fa-solid fa-person-digging"></i>Actividad 3
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <table class="table table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Avatar</th>
                                        <th scope="col">Nota Actual</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Francisco Zahinos</td>
                                        <td><img src="../images/emblemas/1.png" alt="emblema4" width="40" height="40">
                                        </td>
                                        <td><input class="form-control form-control-sm text-center" type="text"
                                                id="nota-9" value="8" disabled=""></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Pol Obalat</td>
                                        <td><img src="../images/emblemas/2.png" alt="emblema4" width="40" height="40">
                                        </td>
                                        <td><input class="form-control form-control-sm text-center" type="text"
                                                id="nota-10" value="8" disabled=""></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Tatiana Valentinyova</td>
                                        <td><img src="../images/emblemas/3.png" alt="emblema4" width="40" height="40">
                                        </td>
                                        <td><input class="form-control form-control-sm text-center" type="text"
                                                id="nota-11" value="8" disabled=""></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Samuel Lara</td>
                                        <td><img src="../images/emblemas/4.png" alt="emblema4" width="40" height="40">
                                        </td>
                                        <td><input class="form-control form-control-sm text-center" type="text"
                                                id="nota-12" value="8" disabled=""></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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