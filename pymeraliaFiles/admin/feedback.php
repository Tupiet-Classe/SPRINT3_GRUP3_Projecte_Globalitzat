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
    <link href="../css/detallesCurso.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/main.css">
    <!--header, footer-->
    <title>Feedback</title>

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
            <h2 class="py-3">Feedback</h2>
        </div>

        <span id="courseId" style="display: none;"><?php echo $_GET['courseid']; ?></span>

        <?php
        include '../clases/Curs_class.php';

        $curs = new Curs($_GET['courseid']);
        $feedback = $curs->get_feedback();
        
        if ($feedback) {
            foreach ($feedback as $value) {
                echo "
                <div class='course-element p-3 m-2'>
                    <p>"; 
                for ($i = 0; $i < $value['rating']; $i++) {
                    echo "<i class='fa fa-star' style='color: gold'></i>";
                }
                echo "</p>
                    <p class='m-0'>$value[Feedback]</p>
                </div>";
            }
        } else {
            echo "
                <div class='course-element p-3 m-2'>
                    <p class='m-0'>¡Aún no hay valoraciones!</p>
                </div>";
        }
        ?>
    </div>
   
    <?php 
      include_once '../includes/footer.php';
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table-locale-all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/party-js@latest/bundle/party.min.js"></script>

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