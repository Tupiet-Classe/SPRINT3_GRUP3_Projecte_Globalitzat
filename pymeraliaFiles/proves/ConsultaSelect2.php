<!DOCTYPE html>
<html lang="en">
<head>
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
</head>
<body>
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
            <div class='accordion-body'>
      
            </div>
          </div>
        </div>
         ";
      }
      ?>
  
</div>
</body>
</html>

