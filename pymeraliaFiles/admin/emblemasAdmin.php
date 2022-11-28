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

<?php 
  include_once '../includes/header.php'; 
?>

<body class="d-flex flex-column min-vh-100">
    <div class="container overflow-hidden text-center py-3" id="cuerpo">
        <div>
            <h1>Emblemas</h1>
        </div>
        <div>
            <div class=" d-flex justify-content-end">
                <button type="button" class="orange-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    + Añadir emblema
                </button>
            </div>
                <?php

                include_once '../clases/Emblema_class.php';
                $emblema = New Emblema(1);
                $emblemas = $emblema->showEmblema();

                //$embl->papeleraEmblema();
                
                if($emblemas != false){
                    echo
                    '<table class="table table-striped align-middle">',
                    '<thead>',
                        '<tr>',
                            '<th scope="col">Nombre</th>',
                            '<th scope="col">Descripción</th>',
                            '<th scope="col">Imagen</th>',
                            '<th scope="col">Curso</th>',
                            '<th scope="col">Opciones</th>',
                        '</tr>',
                    '</thead>',
                    '<tbody>';
                
                    foreach($emblemas as $key => $emblema){
                    echo 
                    '<tr>'.
                        '<td>' . $emblema['name_emblem'] . '</td>' .
                       
                            '<td>' . $emblema['description_emblem'] . '</td>' .
                            '<td>' . '<img src= "' . '../images/emblemas/' . $emblema['image'] . '" width="40" height="40">' .'</td>' .
                            '<td>' . $emblema['id_course'] . '</td>' .
                            '<td class="d-flex flex-row justify-content-center align-items-center" style="height:57px;">' . '<form action="../PHP/deleteEmblema.php" method="post">' .'<button type="button">' . '<img src="../images/botons/edit.png">' . '</button>' .  '</form>' .
                            '<form action="../PHP/deleteEmblema.php" method="post">' .'<button type="submit" class="ms-4">' . '<img src="../images/botons/delete.png">' . '</button>' . '</form>' . '</td>' . 
                        '</tr>';
                    }
                    echo
                        '</tbody>',
                    '</table>';
                }
                    else{
                        echo '<h6>No hay emblemas para tus cursos.</h6>';
                        
                    }
                    
                    
                    echo
                    '<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby=\"exampleModalLabel" . " aria-hidden=\"true\">'
                    . '<div class="modal-dialog modal-dialog-centered">'
                    . '<div class="modal-content">'
                    
                    . '<div class="modal-header">'
                    . '<h1 class="modal-title fs-5" id="exampleModalLabel">Añadir un emblema</h1>'
                    . '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">' . '</button>'
                    . '</div>'
        
                    . ' <div class="modal-body"> '

                    . ' <p class="h3 mb-3 text-start">Emblema</p> '                                   
                    . '  <div class="input-group">'
                    . ' <form action="../PHP/uploadEmblema.php" method="POST" enctype="multipart/form-data"> '
                    . ' <label class="h6 pt-3 d-flex text-start">Nombre del emblema</label> '
                    . ' <input type="text" class="form-control" name="name" placeholder="Nombre de la imagen..." aria-label="emblemName"
                        aria-describedby="basic-addon1"> '
                        . ' <label class="h6 pt-3 d-flex text-start">Descripción</label> '
                    . ' <input type="text" class="form-control" name="description" placeholder="Descripción..." aria-label="emblemName"
                        aria-describedby="basic-addon1"> '
                        . ' <label class="h6 pt-3 d-flex text-start">Curso</label> '
                    . ' <input type="text" class="form-control" name="course" placeholder="Curso..." aria-label="emblemName"
                        aria-describedby="basic-addon1"> '
                    . ' <label class="h6 pt-3 d-flex text-start">Imagen</label> '
                    . ' <input type="file" class="form-control" name="emblem" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload"> '
                    . ' </div> '
                    . ' </div> '
                   
                    . ' <div class="modal-footer">'
                    . ' <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> Cancelar  </button> '
                    . ' <button type="submit" name="submitBtn" class="btn btn-success"> + Añadir</button>' 
                    . ' </form>'
                    . ' </div> '
                    . ' </div> '
                    . ' </div> '
                    . ' </div> ';
                


                ?>
         
            
            <!-- Modal -->
            
        </div>
    </div>
    
    <?php 
      include_once '../includes/footer.php'; 
    ?>

</body>

</html>