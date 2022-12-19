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
        <div class="accordion" id="accordionExample">
  <?php
      include_once "../clases/Curs_class.php";


      $llistatCursos = Curs::subscription_course_user(1);

      foreach ($llistatCursos as $curs) {
         //echo  "<strong>  $curs[name] </strong>";
         echo " 
         <div class='accordion-item'>
          <h2 class='accordion-header' id='heading$curs[id]'>
            <button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#collapse$curs[id]' aria-expanded='true' aria-controls='collapse$curs[id]'>
            
              $curs[name] $curs[id]
            </button>
              
          </h2>
          <div id='collapse$curs[id]' class='accordion-collapse collapse show' aria-labelledby='heading$curs[id]' data-bs-parent='#accordionExample'>
            <div class='accordion-body'>";
            // MOSTRAR ACTIVITATS A PARTIR D'AQUÍ

            echo "<table class='table'>
              <thead>
                <tr>
                  <th scope='col'>Nom activitat</th>
                  <th scope='col'>Nota</th>
                </tr>
              </thead>
              <tbody>
         ";

            $curset = new Curs($curs['id']);
            $mitjana = $curset->get_average(1);

            $llistatActivitats = $curset->check_activities();
            foreach($llistatActivitats as $activitats){
              echo "
              <tr>
                <td>$activitats[Activitat]</td>
                <td>$activitats[Nota]</td>
              </tr>";
            }

            echo "
           <td class='table-warning'> <strong> Nota total </strong></td> 
           <td class='table-warning'> $mitjana</td> 
            ";

            echo "
                </tbody>
              </table>";


               // MOSTRAR ACTIVITATS FINS D'AQUÍ
          echo"  </div>
          </div>
        </div>
         ";
      }
      
      ?>
  
</div>
    </div>
    <br>

 
<?php 
  include_once '../includes/footer.php'; 
?>
</body>

</html>