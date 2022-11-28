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
</head>

<body class="d-flex flex-column min-vh-100">
   
<?php 
  include_once '../includes/header.php'; 
?>

    <div class="container overflow-hidden text-center py-3" id="cuerpo">
        <div>
            <h2>Emblemas</h2>
        </div>
        <div>
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Emblemas ganados</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Medalla</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Curso 1</td>
                        <td>Completa el curso 1</td>
                        <td><img src="../images/emblemas/1.png" alt="emblema1" width="40" height="40"></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Curso 2</td>
                        <td>Completa el curso 2</td>
                        <td><img src="../images/emblemas/2.png" alt="emblema2" width="40" height="40"></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Curso 3</td>
                        <td>Completa el curso 3</td>
                        <td><img src="../images/emblemas/3.png" alt="emblema3" width="40" height="40"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="accordion" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Emblemas por ganar
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Emblemas por ganar</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Medalla</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Curso 4</td>
                                    <td>Completa el curso 4</td>
                                    <td><img src="../images/emblemas/4.png" alt="emblema4" width="40" height="40"></td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Curso 5</td>
                                    <td>Completa el curso 5</td>
                                    <td><img src="../images/emblemas/5.png" alt="emblema5" width="40" height="40"></td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Curso 6</td>
                                    <td>Completa el curso 6</td>
                                    <td><img src="../images/emblemas/6.png" alt="emblema6" width="40" height="40"></td>
                                </tr>
                            </tbody>
                        </table>
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