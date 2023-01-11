<?php
include("../clases/Curs_class.php");
include("../clases/Categoria_class.php");

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    <link href="../css/brands.min.css" rel="stylesheet">
    <link href="../css/solid.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="../css/detallesCurso.css">

</head>

<?php 
  include_once '../includes/header.php'; 
?>

<body class="d-flex flex-column min-vh-100">
    <main class="container">

        <?php
            $curs = new Curs($courseId);
            $title = $curs->get_title();
            $is_finished = $curs->is_course_finished(1);
            $average = round($curs->get_average(1), 2);
            $courseId = $_GET['courseid'];

            echo "
                    <div class='text mt-3' id='course-element'>     
                        <h1 id='course-title'>$title</h1>
                    </div>
                ";

                if ($is_finished) {
                    echo "
                        <div class='course-finished mb-4'>
                            <p>¡Has terminado el curso!</p>
                            <p>Nota media: $average</p>
                        </div>
                    ";
                }

            $resultatCategories = $curs->get_all_categories();

            echo "<div class='accordion'>";

                foreach ($resultatCategories as $category){
                    $category_id = $category['id_category'];
                    $category_title = $category['name_category'];

                    echo "
                        <div class='accordion-item position-relative' id='category-$category_id'>
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
                            </div>";

                        // Afegim el contingut
                        if ($row['type']=='url') {
                            echo" <a id='resource-secondary-$row[type]-$row[id]' href=$row[location_or_description]>$row[location_or_description]</a>";
                        } elseif ($row['type']=='file') {
                            echo" <a id='resource-secondary-$row[type]-$row[id]' class='orange-button' href='$row[location_or_description]' download >$row[name]</a>";
                        }
                        elseif ($row['type'] == 'activity') {
                            echo" <a id='resource-secondary-$row[type]-$row[id]' class='orange-button' href=actividad.php?activity_id=$row[id]>Abrir actividad</a>";
                        }
                        else {
                            echo "<p id='resource-secondary-$row[type]-$row[id]' class='m-0'>$row[location_or_description]</p>";
                        }
                        
                        echo "</div>"; 
                    }

                    echo "</div>
                    </div>
                  </div>";

                };

                echo '</div>'
            ?>

        <?php
            if ($is_finished) {
                include '../includes/feedback.php';
            }
        ?>

        

        

    </main>

</body>
</main>

<?php 
  include_once '../includes/footer.php'; 
?>

<script src="../scripts/detallesCursoCliente.js"></script>

</body>

</html>
