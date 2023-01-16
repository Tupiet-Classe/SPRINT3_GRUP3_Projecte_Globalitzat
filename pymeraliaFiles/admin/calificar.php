<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <link href="../css/fontawesome.min.css" rel="stylesheet">
    <link href="../css/brands.min.css" rel="stylesheet">
    <link href="../css/solid.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>
<body class="d-flex flex-column min-vh-100">
    <?php include_once '../includes/header.php'; ?>
    <br>
    <?php
    include "../clases/activityClass.php";

    $prova = new Activities();
    if (isset($_GET['id'])) {
      $idCurs = $_GET['id'];
}
      $prova->show_deliveries($_GET['id']);
  
    ?> 


          <!-- Inici Modal -->    
          <span id="courseId" style="display: none;"><?php echo $_GET['courseid']?></span>

          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="POST" id="apply" action="../../PHP/apply.php">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insereix la nota de l'alumne</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">  

                <!-- Mostrar nota-->                   
                <div class="input-group">
                    <label for="message-text" class="col-form-label">Nota: </label>
                    <input id = "nota" class="form-control" name="nota" >
                    <input type="hidden" id="IdTramesa" name="id-tramesa">
                    <input type="hidden" id="IdCurs" name="IdCurs" value= "<?php echo $_GET['id'] ?>">
                </div>
                  
              </div>
              <div class="modal-footer">
                <button  type="submit" class="btn btn-primary" id ="si">Guardar canvis</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tanca</button>
              </div>
              </form>    
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Final Modal -->




<br>
<script>
  function actualitzarId(idTramesa) {
    document.getElementById('IdTramesa').value = idTramesa;
    
  }

</script>
<!-- Com el footer ha quedat més dalt de l'habitual, li afegeixo varios <br> per arreglar-ho -->

<?php include_once '../includes/footer.php'; ?>

</body>

</html>

